CREATE DATABASE cadastro_user;
USE cadastro_user;

CREATE TABLE usuarios(
  idUser int not null auto_increment primary key,
  nome varchar(100),
  sobrenome varchar(100),
  email varchar(100)
);
