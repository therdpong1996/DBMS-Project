#include <ESP8266WiFi.h>
#include <DHT.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

ESP8266WiFiMulti WiFiMulti;

// Config connect WiFi
#define WIFI_SSID "" //SSID your WIFI
#define WIFI_PASSWORD "" //Password your WIFI

// Config DHT
#define DHTPIN D5
#define DHTTYPE DHT22

#define motor D7

#define SECONDS_DS(seconds) ((seconds)*1000000UL)
#define figger_p  "" //Figger Print your website if ues https

int success = 0;
int error = 0;
int total = 0;

String name;
DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(9600);
   pinMode(motor,OUTPUT);
  WiFi.mode(WIFI_STA);
  // connect to wifi.
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("connecting");
  
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
  Serial.println();
  Serial.print("connected: ");
  Serial.println(WiFi.localIP());
   
  dht.begin();
}

void loop() {
  // Read temp & Humidity for DHT22
  float h = dht.readHumidity();
  float t = dht.readTemperature();
    
    Serial.println("Total" + total);
    Serial.println("Success" + success);
    Serial.println("Error" + error);
  
    if (isnan(h) || isnan(t)) {
      Serial.println("Failed to read from DHT sensor!");
      error++;
      total++;
      return;
    }else{
      success++;
      total++;
    }
  
    if ((WiFiMulti.run() == WL_CONNECTED)) {
      HTTPClient http;
      String url = "https://<domain.com>/insert.php?actin=normal&temp=" + String(t) + "&humi=" + String(h); //Change <domain.com> to your domain
      //if use http remove "s" form https://
      Serial.println(url);
      
      //Condition Special
        if(t >= 30){
          digitalWrite(motor, HIGH);
          Serial.print("MOTOR ON\n");
        } else {
          digitalWrite(motor, LOW);
          Serial.print("MOTOR OFF\n");
        }
      
      //http.begin(url); //if use HTTP
      http.begin(url,figger_p); //if use HTTPS
      int httpCode = http.GET();
      //check send data temp and humi
      if (httpCode > 0) {
        Serial.printf("[HTTP] GET... code: %d", httpCode);
        if (httpCode == HTTP_CODE_OK) {
          String payload = http.getString();
          Serial.println(payload);
        }else{
          Serial.println("HTTP_ERROR");
        }
      } else {
        Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
      }
      http.end();
      
      if(total == 100){
          HTTPClient http_m;
          String url_m = "https://<domain.com>/insert.php?actin=mistake&success=" + String(success) + "&error=" + String(error); //Change <domain.com> to your domain
          Serial.println(url_m);
          //http_m.begin(url_m); //if use HTTP
          http_m.begin(url_m,figger_p); //if use HTTPS
          int http_mCode = http_m.GET();
          //check send data mistake
          if (http_mCode > 0) {
            Serial.printf("[HTTP_M] GET... code: %d", http_mCode);
            if (http_mCode == HTTP_CODE_OK) {
              String payload_m = http_m.getString();
              Serial.println(payload_m);
            }else{
              Serial.println("HTTP_M_ERROR");
            }
          } else {
            Serial.printf("[HTTP_M] GET... failed, error: %s\n", http.errorToString(http_mCode).c_str());
          }
          http_m.end();
      }
        
      delay(5000);                    //Send request every 5 seconds
      
      if(total > 100){
          Serial.println("Sleeping Mode ...");
          ESP.deepSleep(SECONDS_DS(20));     //Sleep mode 20 seconds
      }

    }else{
      Serial.println("WIFI Error");  
    }
}
