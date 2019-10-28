CREATE DATABASE TRANSFORMACIONAL;
USE TRANSFORMACIONAL;

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
INSERT INTO PSICOLOGOS VALUES ('15926349', 'Jaime', 'Mistran', 'Celaya', 'Adicciones', '2255889966', 'calle 8nte, no 318, centro');
INSERT INTO PSICOLOGOS VALUES ('15926310', 'Jaime', 'Mistran', 'Celaya', 'Adicciones', '2255889966', 'calle 8nte, no 318, centro');
INSERT INTO PSICOLOGOS VALUES ('15926311', 'Jaime', 'Mistran', 'Celaya', 'Adicciones', '2255889966', 'calle 8nte, no 318, centro');

CREATE TABLE PACIENTES(
correo varchar(40) not null,
password  varchar(40) not null,
nombre varchar(30) not null,
app varchar(30) not null,
apm varchar(30) not null,
tel varchar(10) not null,
edad int not null,
sexo char not null,
PRIMARY KEY (correo)
)ENGINE= InnoDB;
INSERT INTO PACIENTES VALUES ('mistranjorge@gmail.com','admin1', 'jorge', 'mistran', 'mistran', '2221675282', '22', 'M');
INSERT INTO PACIENTES VALUES ('alejandro_perez30@outlook.com','admin2', 'alejandro', 'perez', 'perez', '2221548778', '21', 'M');

CREATE TABLE SECCIONES(
idesec varchar(8) not null,
nomsec varchar(200) not null,
descripcion varchar(300) not null,
pacsec varchar(40) not null,
FOREIGN KEY (idesec) REFERENCES PSICOLOGOS(idepsi),
PRIMARY KEY (idesec),
FOREIGN KEY (pacsec) REFERENCES PACIENTES(correo)
)ENGINE= InnoDB;

INSERT INTO SECCIONES VALUES ('15926348','ADICCIONES','Todo que es dificil de dejar y esta haciendo un daño en nuestra persona', 'mistranjorge@gmail.com');
INSERT INTO SECCIONES VALUES ('15926349','SALUD MENTAL','Incluye nuestro bienestar emocional, psicológico y social. Afecta la forma en que pensamos, sentimos y actuamos', 'mistranjorge@gmail.com');
INSERT INTO SECCIONES VALUES ('15926310','SEXUALIDAD','Conjunto de condiciones que caracterizan el sexo de cada persona y que afectan su desarrollo', 'mistranjorge@gmail.com');
INSERT INTO SECCIONES VALUES ('15926311','VIOLENCIA DE PAREJA','Toda acción u omisión que daña física, emocional y sexualmente, con el fin de dominar y mantener el control sobre otra persona.', 'mistranjorge@gmail.com');

CREATE TABLE PREGUNTAS(
idepreg int not null,
pregunta varchar(300) not null,
descripcion varchar(300) not null,
pregsec varchar(8) not null,
PRIMARY KEY (idepreg),
FOREIGN KEY (pregsec) REFERENCES SECCIONES(idesec)
)ENGINE= InnoDB;

ALTER TABLE PREGUNTAS
MODIFY idepreg int(8) NOT NULL AUTO_INCREMENT;

CREATE TABLE COMENTARIOS(
idecoment int not null,
descripcion varchar(500) not null,
comsec varchar(8) not null,
paccom varchar(40) not null,
PRIMARY KEY (idecoment),
FOREIGN KEY (comsec) REFERENCES SECCIONES(idesec)
)ENGINE= InnoDB;

ALTER TABLE COMENTARIOS
MODIFY idecoment int(8) NOT NULL AUTO_INCREMENT;

CREATE TABLE VISITANTES(
idvis int not null,
sexovis varchar(1) not null,
edadvis int not null,
estado varchar(20) not null,
secvis varchar(50),
PRIMARY KEY (idvis)
)ENGINE= InnoDB;

ALTER TABLE VISITANTES
MODIFY idvis int(8) NOT NULL AUTO_INCREMENT;
