create database gasd;

use gasd;

CREATE TABLE aspirante (
  id int AUTO_INCREMENT primary key,
  nombre varchar(255) NOT NULL,
  tipo_doc enum('cc','ce') NOT NULL,
  documento int(11) NOT NULL,
  correo varchar(255) NOT NULL,
  cargo varchar(255) NOT NULL
);