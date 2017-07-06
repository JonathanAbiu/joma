drop database if exists hgpublicidad;

create database hgpublicidad;

use hgpublicidad;

create table ciudad (
codigo char(5) primary key,
nombre varchar(255) not null,
apellidoPaterno varchar(255)not null,
apellidoMaterno varchar(255)not null,
rfc varchar(255)not null,
telefono varchar(100)not null,
email varchar(255),
direccion varchar(255))charset='utf8' engine='Innodb';
