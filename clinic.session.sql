
-- @BLOCK
USE clinic;

-----------------------------------------------------
-- @BLOCK
CREATE TABLE  Doctor
(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  family_name VARCHAR(50) NOT NULL,
  description VARCHAR(80) ,
  img VARCHAR(225) ,
  password VARCHAR(225) NOT NULL,
  username VARCHAR(225) ,
  email VARCHAR(225) NOT NULL,
  status INT NOT NULL,
  specialty VARCHAR(80) ,
  PRIMARY KEY (id)
);
-- @BLOCK
DROP TABLE Doctor;
----------------------------------------------------------
-- @BLOCK
CREATE TABLE Patient
(
  id INT AUTO_INCREMENT ,
  name VARCHAR(50) NOT NULL,
  family_name VARCHAR(50) NOT NULL,
  description text NOT NULL,
  password VARCHAR(225) NOT NULL,
  email VARCHAR(225) NOT NULL,
  PRIMARY KEY (id)
);
-- @BLOCK
DROP TABLE Patient;
----------------------------------------------------------
-- @BLOCK
CREATE TABLE Admin
(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(225) NOT NULL,
  family_name VARCHAR(225) NOT NULL,
  username VARCHAR(225) NOT NULL,
  password VARCHAR(225) NOT NULL,
  email VARCHAR(225) NOT NULL,
  status  int NOT NULL DEFAULT '0' ,
  PRIMARY KEY (id)
);
-- @BLOCK
DROP TABLE Admin;
----------------------------------------------------------
-- @BLOCK
CREATE TABLE Doctor_Admin
(
  id INT NOT NULL AUTO_INCREMENT,
  id_Admin INT NOT NULL,
  id_Doctor INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_Admin) REFERENCES Admin(id),
  FOREIGN KEY (id_Doctor) REFERENCES Doctor(id)
);
-- @BLOCK
DROP TABLE Doctor_Admin;
----------------------------------------------------------
-- @BLOCK
CREATE TABLE dates
(
  id INT NOT NULL AUTO_INCREMENT,
  day INT NOT NULL,
  start_time INT NOT NULL,
  end_time INT NOT NULL,
  id_Doctor INT NOT NULL,
  FOREIGN KEY (id_Doctor) REFERENCES Doctor(id)
);
-- @BLOCK
DROP TABLE dates;
----------------------------------------------------------
-- @BLOCK
CREATE TABLE Doctor_Patient
(
  id INT NOT NULL AUTO_INCREMENT,
  id_Patient INT NOT NULL,
  id_Doctor INT NOT NULL,
  id_Date INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (id_Patient) REFERENCES Patient(id),
  FOREIGN KEY (id_Doctor) REFERENCES Doctor(id),
  FOREIGN KEY (id_Date) REFERENCES dates(id)
);
-- @BLOCK
DROP TABLE Doctor_Patient;
----------------------------------------------------------
-- @BLOCK
CREATE TABLE department
(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);
-- @BLOCK
DROP TABLE  department;
-------------------------------------------------------
-- @BLOCK
SELECT * FROM `doctor` WHERE `name` LIKE "d%" 
-- @BLOCK
SELECT *  FROM doctor 
INNER JOIN patient
 ON doctor.id = doctor_patient.id_Doctor
 AND patient.id= doctor_patient.id_Patient;

-- @BLOCK
SELECT * FROM `patient` INNER JOIN `doctor_patient` ON `patient`.`id` = `doctor_patient`.`id_Patient`

-- @BLOCK
SELECT * FROM doctor , doctor_patient ,
INNER JOIN patient ON
patient.id =doctor_patient.id_Patient AND
doctor.id = doctor_patient.id_Doctor;


-- @BLOCK
-- @BLOCK
