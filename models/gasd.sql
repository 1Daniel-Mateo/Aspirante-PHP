create database gasd;

use gasd;

CREATE TABLE aspirante (
  id int primary key AUTO_INCREMENT,
  nombre varchar(200) NOT NULL,
  tipo_doc enum('CC','CE','RT','TI') NOT NULL,
  documento int(11) NOT NULL,
  correo varchar(150) NOT NULL,
  cargo varchar(200) NOT NULL
);