CREATE DATABASE --NOMBRE

--TABL USUARIO
CREATE TABLE Usuario(
	pkUsuario int NOT NULL auto_increment,
	nombre varchar(50) NOT NULL,
	apellido varchar(50) NOT NULL,
	fotoDePerfil varchar(100),
	correoElectronico varchar(100) NOT NULL,
	contrasena varchar(30) NOT NULL,
	nombreDeUsuario varchar(15) NOT NULL,
	fkCarrera int NOT NULL, 
	fkCampus int NOT NULL,
	usuarioCreacion int,
	fechaCreacion datetime NOT NULL,
	usuarioActualizacion int, 
	fechaActualizacion datetime,
	borrado bit NOT NULL,
	fecha borrado datetime
);
ALTER TABLE Usuario ADD CONSTRAINT pk_usuario
PRIMARY KEY (pkUsuario);

--TABLA CARRERA
CREATE TABLE Carrera(
	pkCarrera int NOT NULL auto_increment,
	nombre varchar(250) NOT NULL,
	usuarioCreacion int,
	fechaCreacion datetime NOT NULL,
	usuarioActualizacion int, 
	fechaActualizacion datetime,
	borrado bit NOT NULL,
	fecha borrado datetime
);
ALTER TABLE Carrera ADD CONSTRAINT pk_carrera
PRIMARY KEY (pkCarrera);

--TABLA CAMPUS
CREATE TABLE Campus(
	pkCampus int NOT NULL auto_increment,
	nombre varchar(250) NOT NULL,
	fkCiudad int NOT NULL,
	usuarioCreacion int,
	fechaCreacion datetime NOT NULL,
	usuarioActualizacion int, 
	fechaActualizacion datetime,
	borrado bit NOT NULL,
	fecha borrado datetime
);
ALTER TABLE Campus ADD CONSTRAINT pk_campus
PRIMARY KEY (pkCampus);

--TABLA CIUDAD
CREATE TABLE Ciudad(
	pkCiudad int NOT NULL auto_increment,
	nombre varchar(250) NOT NULL,
	entidadFederativa varchar(80) NOT NULL,
	usuarioCreacion int,
	fechaCreacion datetime NOT NULL,
	usuarioActualizacion int, 
	fechaActualizacion datetime,
	borrado bit NOT NULL,
	fecha borrado datetime
);
ALTER TABLE Ciudad ADD CONSTRAINT pk_ciudad
PRIMARY KEY (pkCiudad);


--LLAVES FORÁNERAS
ALTER TABLE Usuario ADD CONSTRAINT fk_carrera
FOREIGN KEY (fkCarrera) REFERENCES Carrera(pkCarrera);

ALTER TABLE Usuario ADD CONSTRAINT fk_campus
FOREIGN KEY (fkCampus) REFERENCES Campus(pkCampus);

ALTER TABLE Campus ADD CONSTRAINT fk_ciudad
FOREIGN KEY (fkCiudad) REFERENCES Ciudad(pkCiudad);

