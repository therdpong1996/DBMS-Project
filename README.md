# Temperature Humidity DBMS Project
Project Temperature and humidity base on ESP8266, DHT22, firebase, MySQL
โปรเจ็ควิชา Database ตรวจวัดอุณหภูมิและความชื้นโดยใช้ NodeMCU (ESP-8266) และส่งข้อมูลเข้า Firebase และ MySQL

## ESP8266
**อุปกรณ์**
1. บอร์ด ESP-8266
2. เซ็นเซอร์ DHT22
3. สายไฟ
4. มิเตอร์แบบสั่น

**Library**
1. ESP8266WiFi.h
2. DHT.h
3. ESP8266WiFiMulti.h
4. ESP8266HTTPClient.h

**การใช้งาน**
- บรรทัดที่ 9, 10 ของไฟล์ esp8266-source.ino แก้ไขเป็นชื่อและรหัสผ่านของ Wi-Fi
- บรรทัดที่ 19 ของไฟล์ esp8266-source.ino แก้ไขเป็น figger print ของเว็บไซต์ (ในกรณีใช้งาน https)
- บรรทัดที่ 50 ของไฟล์ esp8266-source.ino แก้ไขเป็น url ของเว็บไซต์ที่ใช้งาน
- บรรทัดที่ 52-58 ของไฟล์ esp8266-source.ino เป็นเงื่อนไขโจทย์พิเศษ (ความคิดสร้างสรรค์)

**รูปภาพวงจร**
![alt วงจร esp8266](https://i.imgur.com/fxFmb0g.jpg)

## WEB-SERVER
**ความต้องการระบบ**
1. PHP Version 5.6+
2. MySQL or MariaDB
3. Firebase

**การใช้งาน**
- บรรทัดที่ 5-8 ของไฟล์ mysqli.class.php แก้ไขเป็นข้อมูล Database ที่ต้องการใช้งาน
- บรรทัดที่ 8-11 ของไฟล์ insert.php แก้ไขเป็นข้อมูล Database ที่ต้องการใช้งาน
- บรรทัดที่ 13 ของไฟล์ insert.php แก้ไขเป็นจำนวนข้อมูลที่ต้องการเก็บ
- บรรทัดที่ 15 ของไฟล์ insert.php แก้ไขเป็นข้อมูล Url ของ Firebase ที่ต้องการใช้งาน

**รูปภาพตัวอย่าง**
![alt วงจร esp8266](https://i.imgur.com/B0e8Yy3.png)
