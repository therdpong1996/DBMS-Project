#include <ESP8266WiFi.h>
#include <DHT.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

ESP8266WiFiMulti WiFiMulti;

// Config connect WiFi
#define WIFI_SSID "iTherdpong7"
#define WIFI_PASSWORD "yof6xpqef78qs"

// Config DHT
#define DHTPIN D5
#define DHTTYPE DHT22

#define motor D7

#define SECONDS_DS(seconds) ((seconds)*1000000UL)
#define figger_p  "40 37 A3 7C CF 9B 14 CB 8C BC 73 50 D9 9D 95 C3 59 19 F7 59"

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
      String url = "https://jakkrit.rmutl-db1.us/insert.php?temp=" + String(t) + "&humi=" + String(h);
      Serial.println(url);
        if(t >= 30){
          digitalWrite(motor, HIGH);
          
          Serial.print("MOTOR ON\n");}
        else {
          digitalWrite(motor, LOW);
          Serial.print("MOTOR OFF\n");}
      http.begin(url,figger_p); //HTTP

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
        delay(5000);                      //Send request every 20 seconds
        Serial.println("Sleeping Mode ...");
        ESP.deepSleep(SECONDS_DS(20));     //Sleep mode every 10 seconds
    }else{
      Serial.println("WIFI Error");  
    }
}
