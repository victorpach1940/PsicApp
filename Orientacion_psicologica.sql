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
INSERT INTO PACIENTES VALUES ('miguel.buny@gmail.com','123', 'Miguel', 'Suarez', 'Pluma', '2461735434', '22', 'M');

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

CREATE TABLE pregunta(
id int(8) not null,
pregunta varchar(300) not null,
idseccion varchar(8) not null,
PRIMARY KEY (id),
FOREIGN KEY (idseccion) REFERENCES SECCIONES(idesec)
)ENGINE= InnoDB;

ALTER TABLE pregunta
MODIFY id int(8) NOT NULL AUTO_INCREMENT;

INSERT INTO pregunta VALUES (NULL, '¿Con qué frecuencia consume alguna bebida alcohólica?\r\n', '15926348'),
(NULL, '¿Cuántas consumiciones de bebidas alcohólicas suele realizar en un día de consumo normal?', '15926348'),
(NULL, '¿Con qué frecuencia toma 6 o más bebidas alcohólicas en una sola ocasión de consumo?', '15926348'),
(NULL, '¿Con qué frecuencia en el curso del último año ha sido incapaz de parar de beber una vez había empezado?', '15926348'),
(NULL, '¿Con qué frecuencia en el curso del último año ha necesitado beber en ayunas para recuperarse después de haber bebido mucho el día anterior?', '15926348'),
(NULL, '¿Con qué frecuencia en el curso del último año no ha podido recordar lo que sucedió la noche anterior porque había estado bebiendo?', '15926348'),
(NULL, '¿Usted o alguna otra persona han resultado heridos porque usted había bebido?', '15926348'),
(NULL, '¿Algún familiar, amigo, médico o profesional sanitario han mostrado preocupación por su consumo de bebidas alcohólicas o le han indicado que deje de beber?', '15926348'),
(NULL, '¿Se aburren tus amigos en las fiestas donde no sirven bebidas alcohólicas?', '15926348'),
(NULL, '¿Discuten demasiado tus padres o tutores? ', '15926348'),
(NULL, '¿Consideras que eres arrogante?', '15926349'),
(NULL, '¿Discuten demasiado tus padres o tutores?', '15926349'),
(NULL, '¿Te asustas con facilidad?', '15926349'),
(NULL, '¿Tienes menos energía de la que crees que deberías tener? ', '15926349'),
(NULL, '¿Te sientes frustrado(a) con facilidad?', '15926349'),
(NULL, '¿Amenazas a otros con hacerles daño?', '15926349'),
(NULL, '¿Te sientes solo (a) la mayor parte del tiempo?', '15926349'),
(NULL, '¿Dices groserías o vulgaridades?', '15926349'),
(NULL, '¿Escuchas cuidadosamente cuando alguien te habla?', '15926349'),
(NULL, '¿Se niegan tus padres o tutores a hablarte cuando se enfadan contigo?', '15926349'),
(NULL, '¿Piensa mucho en sexo?', '15926310'),
(NULL, '¿Tiene escaso impulso sexual?', '15926310'),
(NULL, '¿Ha perdido la iniciativa en las relaciones sexuales?', '15926310'),
(NULL, '¿Busca excusas para evitar el sexo e incluso lo rechaza?', '15926310'),
(NULL, '¿Hay una gran diferencia entre mi deseo de frecuencia sexual y el de mi pareja (que es mayor)?', '15926310'),
(NULL, '¿Aunque su pareja se muestre muy cálida y afectiva, le cuesta entrar en situación sexual?', '15926310'),
(NULL, '¿vives acomplejado por el tamaño de tu pene, o senos en caso de mujer?', '15926310'),
(NULL, '¿Consideras que eres feliz con tu sexualidad?', '15926310'),
(NULL, '¿Crees que tu relación de pareja se está deteriorando por culpa del sexo?', '15926310'),
(NULL, '¿Has fantaseado con tener relaciones con una persona de tu mismo sexo?', '15926310'),
(NULL, '¿Qué papel tiene una mujer en una relación?, ¿Y un hombre?', '15926311'),
(NULL, '¿En alguna ocasión te humilla o te critica en público o en privado?', '15926311'),
(NULL, '¿Alguna vez has sido presionada a mantener relaciones sexuales o las has mantenido por miedo a tu pareja?', '15926311'),
(NULL, '¿Alguna vez te ha empujado o pegado?', '15926311'),
(NULL, '¿Sientes que intenta alejarte de tu entorno?', '15926311'),
(NULL, '¿Te sientes segura(o) en tu casa?', '15926311'),
(NULL, '¿Te compara con frecuencia con otras personas y te pone por debajo de ellas?', '15926311'),
(NULL, '¿Te impide o te intenta convencer para que no trabajes?', '15926311'),
(NULL, 'Cuando salís, ¿te obliga a arreglarte o a no hacerlo?', '15926311'),
(NULL, '¿Crees que puedes merecer una bofetada por parte de tu pareja?', '15926311');

CREATE TABLE respuesta(
id int(8) not null,
respuesta varchar(3000) not null,
idseccion varchar(8) not null,
idpregunta int(8) not null,
PRIMARY KEY (id),
FOREIGN KEY (idseccion) REFERENCES SECCIONES(idesec),
FOREIGN KEY (idpregunta) REFERENCES pregunta(id)
)ENGINE= InnoDB;

ALTER TABLE respuesta
MODIFY id int(8) NOT NULL AUTO_INCREMENT;

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
