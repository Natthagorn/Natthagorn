1. ติดตั้ง XAMPP
2. RUN CODEIGNETER ในไฟล์ GITHUB
3. สร้าง DB ชื่อ satang_db2 ใช้ Mysql ใน localhost
4. RUN 
CREATE TABLE `satang_db2`.`qr_code`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_path` varchar(255) NULL,
  `times` int(11) NULL,
  `short_path` varchar(255) NULL,
  PRIMARY KEY (`id`)
);
5. เข้าลิ้งก์ http://localhost:8080/ae123
