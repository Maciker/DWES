--  https://github.com/datacharmer/test_db

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP DATABASE IF EXISTS `examen`;

CREATE DATABASE `examen` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `examen`;



CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(40)  NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `log` (
  `usuario` varchar(40)  NOT NULL,
  `login` DATETIME NOT NULL
) ENGINE=InnoDB;



INSERT INTO `usuarios` (`usuario`, `contrasena`) VALUES
('dwes', 'bba2d1bec283dd3b90add09797a9235b08069064');

CREATE TABLE empleados (
    emp_no      INT             NOT NULL,
    fecha_nac  DATE            NOT NULL,
    nombre  VARCHAR(40)     NOT NULL,
    apellido   VARCHAR(100)     NOT NULL,
    genero      ENUM ('M','F')  NOT NULL,    
    fecha_contrato   DATE            NOT NULL,
    PRIMARY KEY (emp_no)
);

CREATE TABLE departamentos (
    dept_no     CHAR(4)         NOT NULL,
    nombre   VARCHAR(100)     NOT NULL,
    PRIMARY KEY (dept_no),
    UNIQUE  KEY (nombre)
);

CREATE TABLE dept_emp (
    emp_no      INT             NOT NULL,
    dept_no     CHAR(4)         NOT NULL,
    fecha_desde   DATE            NOT NULL,
    fecha_hasta     DATE            NOT NULL,
    FOREIGN KEY (emp_no)  REFERENCES empleados   (emp_no)  ON DELETE CASCADE,
    FOREIGN KEY (dept_no) REFERENCES departamentos (dept_no) ON DELETE CASCADE,
    PRIMARY KEY (emp_no,dept_no)
);

INSERT INTO `departamentos` VALUES 
('d001','Marketing'),
('d002','Finanzas'),
('d003','Recursos Humanos'),
('d004','Producción'),
('d005','Desarrollo'),
('d006','Calidad'),
('d007','Ventas'),
('d008','Investigación'),
('d009','Atención al cliente');


INSERT INTO `empleados` VALUES (10001,'1953-09-02','Georgi','Facello','M','1986-06-26'),
(10002,'1964-06-02','Bezalel','Simmel','F','1985-11-21'),
(10003,'1959-12-03','Parto','Bamford','M','1986-08-28'),
(10004,'1954-05-01','Chirstian','Koblick','M','1986-12-01'),
(10005,'1955-01-21','Kyoichi','Maliniak','M','1989-09-12'),
(10006,'1953-04-20','Anneke','Preusig','F','1989-06-02'),
(10007,'1957-05-23','Tzvetan','Zielinski','F','1989-02-10'),
(10008,'1958-02-19','Saniya','Kalloufi','M','1994-09-15'),
(10009,'1952-04-19','Sumant','Peac','F','1985-02-18'),
(10010,'1963-06-01','Duangkaew','Piveteau','F','1989-08-24'),
(10011,'1953-11-07','Mary','Sluis','F','1990-01-22'),
(10012,'1960-10-04','Patricio','Bridgland','M','1992-12-18'),
(10013,'1963-06-07','Eberhardt','Terkki','M','1985-10-20'),
(10014,'1956-02-12','Berni','Genin','M','1987-03-11'),
(10015,'1959-08-19','Guoxiang','Nooteboom','M','1987-07-02'),
(10016,'1961-05-02','Kazuhito','Cappelletti','M','1995-01-27'),
(10017,'1958-07-06','Cristinel','Bouloucos','F','1993-08-03'),
(10018,'1954-06-19','Kazuhide','Peha','F','1987-04-03'),
(10019,'1953-01-23','Lillian','Haddadi','M','1999-04-30'),
(10020,'1952-12-24','Mayuko','Warwick','M','1991-01-26'),
(10021,'1960-02-20','Ramzi','Erde','M','1988-02-10'),
(10022,'1952-07-08','Shahaf','Famili','M','1995-08-22'),
(10023,'1953-09-29','Bojan','Montemayor','F','1989-12-17'),
(10024,'1958-09-05','Suzette','Pettey','F','1997-05-19'),
(10025,'1958-10-31','Prasadram','Heyers','M','1987-08-17'),
(10026,'1953-04-03','Yongqiao','Berztiss','M','1995-03-20'),
(10027,'1962-07-10','Divier','Reistad','F','1989-07-07'),
(10028,'1963-11-26','Domenick','Tempesti','M','1991-10-22'),
(10029,'1956-12-13','Otmar','Herbst','M','1985-11-20'),
(10030,'1958-07-14','Elvis','Demeyer','M','1994-02-17'),
(10031,'1959-01-27','Karsten','Joslin','M','1991-09-01'),
(10032,'1960-08-09','Jeong','Reistad','F','1990-06-20'),
(10033,'1956-11-14','Arif','Merlo','M','1987-03-18'),
(10034,'1962-12-29','Bader','Swan','M','1988-09-21'),
(10035,'1953-02-08','Alain','Chappelet','M','1988-09-05'),
(10036,'1959-08-10','Adamantios','Portugali','M','1992-01-03'),
(10037,'1963-07-22','Pradeep','Makrucki','M','1990-12-05'),
(10038,'1960-07-20','Huan','Lortz','M','1989-09-20'),
(10039,'1959-10-01','Alejandro','Brender','M','1988-01-19');

INSERT INTO `dept_emp` VALUES (10001,'d005','1986-06-26','2010-01-01'),
(10002,'d007','1996-08-03','2012-01-01'),
(10003,'d004','1995-12-03','2012-01-01'),
(10004,'d004','1986-12-01','2012-01-01'),
(10005,'d003','1989-09-12','2012-01-01'),
(10006,'d005','1990-08-05','2012-01-01'),
(10007,'d008','1989-02-10','2012-01-01'),
(10008,'d005','1998-03-11','2000-07-31'),
(10009,'d006','1985-02-18','2014-01-01'),
(10010,'d004','1996-11-24','2000-06-26'),
(10010,'d006','2000-06-26','2014-01-01'),
(10011,'d009','1990-01-22','1996-11-09'),
(10012,'d005','1992-12-18','2014-01-01'),
(10013,'d003','1985-10-20','2014-01-01'),
(10014,'d005','1993-12-29','2018-01-01'),
(10015,'d008','1992-09-19','1993-08-22'),
(10016,'d007','1998-02-11','2018-01-01'),
(10017,'d001','1993-08-03','2018-01-01'),
(10018,'d004','1992-07-29','2018-01-01'),
(10018,'d005','1987-04-03','1992-07-29'),
(10019,'d008','1999-04-30','2018-01-01'),
(10020,'d004','1997-12-30','2018-01-01'),
(10021,'d005','1988-02-10','2002-07-15'),
(10022,'d005','1999-09-03','2016-01-01'),
(10023,'d005','1999-09-27','2016-01-01'),
(10024,'d004','1998-06-14','2016-01-01'),
(10025,'d005','1987-08-17','1997-10-15'),
(10026,'d004','1995-03-20','2016-01-01'),
(10027,'d005','1995-04-02','2016-01-01'),
(10028,'d005','1991-10-22','1998-04-06'),
(10029,'d004','1991-09-18','1999-07-08'),
(10029,'d006','1999-07-08','2016-01-01'),
(10030,'d004','1994-02-17','2016-01-01'),
(10031,'d005','1991-09-01','2016-01-01'),
(10032,'d004','1990-06-20','2015-01-01'),
(10033,'d006','1987-03-18','1993-03-24'),
(10034,'d007','1995-04-12','1999-10-31'),
(10035,'d004','1988-09-05','2015-01-01'),
(10036,'d003','1992-04-28','2015-01-01'),
(10037,'d005','1990-12-05','2015-01-01'),
(10038,'d009','1989-09-20','2015-01-01'),
(10039,'d003','1988-01-19','2015-01-01');

CREATE USER `dwes`@`localhost` IDENTIFIED BY 'abc123.';
GRANT ALL ON `examen`.* TO `dwes`;