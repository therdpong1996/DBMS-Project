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
  
    if ((WiFiMulti.run() == WL_CONNECTED)) {
      HTTPClient http;
      String url = "https://<domain.com>/insert.php?temp=" + String(t) + "&humi=" + String(h); //Change <domain.com> to your domain
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
        delay(5000);                      //Send request every 5 seconds
        Serial.println("Sleeping Mode ...");
        ESP.deepSleep(SECONDS_DS(20));     //Sleep mode every 20 seconds
    }else{
      Serial.println("WIFI Error");  
    }
}
