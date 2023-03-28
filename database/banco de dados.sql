create database feedback;
use feedback;
show databases;

create table formulario (id_formulario int  auto_increment not null primary key,
 nome varchar(100), 
 sobrenome varchar(100), 
 email varchar(100), 
 xp varchar(1000), 
 ava_cli varchar(20)); 

select * from formulario; 
drop database feedback;
truncate formulario	;
