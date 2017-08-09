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
```
- ต่อขา 1 ของ DHT22 เข้าที่ขา 3V ของ ESP-8266
- ต่อขา 4 ของ DHT22 เข้าที่ขา G ของ ESP-8266
- ต่อขา 2 ของ DHT22 เข้าที่ขา D5 ของ ESP-8266

- ต่อขา 1(แดง) ของ มอเตอร์สั่น เข้าที่ขา D7 ของ ESP-8266
- ต่อขา 2(น้ำเงิน) ของ มอเตอร์สั่น เข้าที่ขา G ของ ESP-8266

- ต่อขา D0 ของ ESP-8266 เข้าที่ขา RST ของ ESP-8266
```

```
- บรรทัดที่ 9, 10 ของไฟล์ esp8266-source.ino แก้ไขเป็นชื่อและรหัสผ่านของ Wi-Fi
- บรรทัดที่ 19 ของไฟล์ esp8266-source.ino แก้ไขเป็น figger print ของเว็บไซต์ (ในกรณีใช้งาน https)
- บรรทัดที่ 50 ของไฟล์ esp8266-source.ino แก้ไขเป็น url ของเว็บไซต์ที่ใช้งาน
- บรรทัดที่ 52-58 ของไฟล์ esp8266-source.ino เป็นเงื่อนไขโจทย์พิเศษ (ความคิดสร้างสรรค์)
```

**รูปภาพวงจร**
![alt วงจร esp8266](https://i.imgur.com/fxFmb0g.jpg)

## WEB-SERVER
**ความต้องการระบบ**
1. PHP Version 5.6+
2. MySQL or MariaDB
3. Firebase

**การใช้งาน**
```
- บรรทัดที่ 5-8 ของไฟล์ mysqli.class.php แก้ไขเป็นข้อมูล Database ที่ต้องการใช้งาน
- บรรทัดที่ 8-11 ของไฟล์ insert.php แก้ไขเป็นข้อมูล Database ที่ต้องการใช้งาน
- บรรทัดที่ 13 ของไฟล์ insert.php แก้ไขเป็นจำนวนข้อมูลที่ต้องการเก็บ
- บรรทัดที่ 15 ของไฟล์ insert.php แก้ไขเป็นข้อมูล Url ของ Firebase ที่ต้องการใช้งาน
```

**รูปภาพตัวอย่าง**
![alt วงจร esp8266](https://i.imgur.com/B0e8Yy3.png)

## จัดทำโดย
![alt วงจร esp8266](https://scontent.fbkk13-1.fna.fbcdn.net/v/t31.0-8/20451662_1396691873756129_4573183446176927717_o.jpg?oh=4d9cecb163688c90c7db2aa9da3b29fd&oe=5A370F4F)
- Jakkrit Lomkeaw 58543206003-6
- Jay Yodsang 58543206004-4
- Natdanai Jampasri 58543206012-7
- Therdpong Khangrang 58543206013-5
