
CREATE TABLE MEDICOS(
idemed varchar(8) not null,
nommed varchar(25) not null,
tipmed varchar(25) not null,
telmed varchar(10) not null,
direc varchar(50) not null,
PRIMARY KEY (idemed)
)ENGINE= InnoDB;
INSERT INTO MEDICOS VALUES ('15926348', 'Jaime', 'general', '2255889966', 'calle 8nte, no 318, centro');

CREATE TABLE LOGIN(
user varchar(40) not null,
pass  varchar(40) not null,
nombre varchar(30) not null,
app varchar(30) not null,
apm varchar(30) not null,
tel varchar(10) not null,
alergias varchar(100),
encronica varchar(100),
tipsangre varchar(3) not null,
edad int not null,
altura double not null,
peso double not null,
logmedi varchar(8) not null,
PRIMARY KEY (user),
FOREIGN KEY (logmedi) REFERENCES MEDICOS(idemed)
)ENGINE= InnoDB;
INSERT INTO LOGIN VALUES ('mistranjorge@gmail.com','admin1', 'jorge', 'mistran', 'mistran', '2221675282', 'no', 'no', 'O-', '22', '1.68', '65', '15926348');
INSERT INTO LOGIN VALUES ('alejandro_perez30@outlook.com','admin2', 'alejandro', 'perez', 'perez', '2221548778', 'no', 'no', 'O+', '22', '1.68', '65', '15926348');

CREATE TABLE PADECIMIENTOS(
nompad varchar(50) not null,
sintoma1 varchar(50) not null,
sintoma2 varchar(50) not null,
sintoma3 varchar(50),
padlog varchar(40) not null,
PRIMARY KEY (nompad),
FOREIGN KEY (padlog) REFERENCES LOGIN(user)
)ENGINE= InnoDB;

CREATE TABLE MEDICAMENTOS(
idemed int(8) not null,
nommed varchar(50) not null,
cosmed double not null,
invmed double not null,
cansub varchar(50) not null,
cadhor int not null,
medipad varchar(50) not null,
PRIMARY KEY (idemed),
FOREIGN KEY (medipad) REFERENCES PADECIMIENTOS(nompad)
)ENGINE= InnoDB;

ALTER TABLE MEDICAMENTOS
MODIFY idemed int(8) NOT NULL AUTO_INCREMENT;

CREATE TABLE HORARIOS(
idehor int(8) not null,
horar1 varchar(10) not null,
horar2 varchar(10) not null,
horar3 varchar(10),
horar4 varchar(10),
hormedi int(8) not null,
horusu varchar(40) not null,
PRIMARY KEY (idehor),
FOREIGN KEY (hormedi) REFERENCES MEDICAMENTOS(idemed),
FOREIGN KEY (horusu) REFERENCES LOGIN(user)
)ENGINE= InnoDB;

ALTER TABLE HORARIOS
MODIFY idehor int(8) NOT NULL AUTO_INCREMENT;
