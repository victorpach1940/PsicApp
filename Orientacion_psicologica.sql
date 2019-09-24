
CREATE TABLE PSICOLOGOS(
idepsi varchar(8) not null,
nompsi varchar(25) not null,
apepat varchar(25) not null,
apemat varchar(25) not null,
tippsi varchar(25) not null,
telpsi varchar(10) not null,
dirpsi varchar(50) not null,
PRIMARY KEY (idepsi)
)ENGINE= InnoDB;
INSERT INTO PSICOLOGOS VALUES ('15926348', 'Jaime', 'Mistran', 'Celaya', 'Adicciones', '2255889966', 'calle 8nte, no 318, centro');

CREATE TABLE PACIENTES(
correo varchar(40) not null,
password  varchar(40) not null,
nombre varchar(30) not null,
app varchar(30) not null,
apm varchar(30) not null,
tel varchar(10) not null,
alergias varchar(100),
enment varchar(100),
edad int not null,
sexo char not null,
PRIMARY KEY (correo)
)ENGINE= InnoDB;
INSERT INTO LOGIN VALUES ('mistranjorge@gmail.com','admin1', 'jorge', 'mistran', 'mistran', '2221675282', 'no', 'no', '22', 'M');
INSERT INTO LOGIN VALUES ('alejandro_perez30@outlook.com','admin2', 'alejandro', 'perez', 'perez', '2221548778', 'no', 'no', '21', 'M');

CREATE TABLE SECCIONES(
idesec varchar(8) not null,
nomsec varchar(50) not null,
descripcion varchar(50) not null,
pacsec varchar(40) not null,
FOREIGN KEY (idesec) REFERENCES PSICOLOGOS(idepsi),
PRIMARY KEY (idsec),
FOREIGN KEY (pacsec) REFERENCES PACIENTES(correo)
)ENGINE= InnoDB;

CREATE TABLE PREGUNTAS(
idepreg int not null,
pregunta varchar(50) not null,
descripcion varchar(50) not null,
pregsec varchar(8) not null,
PRIMARY KEY (presec),
FOREIGN KEY (pregsec) REFERENCES SECCIONES(idesec)
)ENGINE= InnoDB;

ALTER TABLE PREGUNTAS
MODIFY idepreg int(8) NOT NULL AUTO_INCREMENT;

CREATE TABLE COMENTARIOS(
idecoment int not null,
descripcion varchar(300) not null,
comsec varchar(8) not null,
paccom varchar(40) not null,
PRIMARY KEY (idecoment),
FOREIGN KEY (comsec) REFERENCES SECCIONES(idesec)
)ENGINE= InnoDB;

ALTER TABLE COMENTARIOS
MODIFY idecoment int(8) NOT NULL AUTO_INCREMENT;