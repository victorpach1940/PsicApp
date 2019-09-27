
create database pruebas2;

use pruebas2;

create table usuarios(
				id int auto_increment,
				nombre varchar(50),
				apellidos varchar(50),
				usuario varchar(50),
				password text(50),
				telefono varchar(50),
				edad      int,
				sexo      varchar(10),
				primary key(id)
					);

