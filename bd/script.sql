create database if not exists projeto;
use projeto;

create or replace table cliente(
    id int primary key auto_increment,
    nome varchar(250) not null,
    email varchar (250) not null unique,
    cpf varchar(14) not null unique,
    contato varchar(14) not null unique,
    created_at timestamp not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table cliente add column foto text not null default "imagens\\avatar.png" after id;

create or replace table login(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login(email, senha) values ('admin@senac.com.br', md5('admin@123'));

create or replace table livros(
    id int primary key auto_increment,
    titulo varchar(250) not null unique,
    autor varchar (250) not null,
    editora varchar(250) not null,
    created_at timestamp not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table cliente change column foto foto longtext not null default "imagens\\avatar.png";

alter table livros add column foto longtext not null default "" after id;
alter table livros add column arquivo longtext not null default "" after id;