create database distribuidora;
use distribuidora;

select * from pedido;

create table cliente (
idCliente int primary key	auto_increment,
cnpj varchar(30), 
nome varchar (255) not null, 
telefone varchar (50), 
email varchar (255) not null
);

create table vendedor (
idVendedor int primary key	auto_increment,
cpf varchar(20), 
nome varchar (255) not null, 
telefone varchar (50), 
email varchar (255) not null
);

create table produto (
idProduto int primary key auto_increment ,
nome varchar (255) not null,
valor decimal (10,2) not null,
descricao varchar (512),
fk_idVendedor int,
FOREIGN KEY (fk_idVendedor) REFERENCES vendedor (idVendedor)
);

create table pedido (
idPedido int auto_increment primary key,
quantidade int not null,
forma_pagamento varchar (255) not null,
fk_idCliente int,
fk_idProduto int,
FOREIGN KEY (fk_idCliente) REFERENCES cliente (idCliente),
FOREIGN KEY (fk_idProduto) REFERENCES produto (idProduto)
);


INSERT INTO vendedor (cpf, nome, telefone, email) 
     VALUES ('123123123', ':nome', '8657568', ':email')



INSERT INTO pedido (quantidade, forma_pagamento, fk_idCliente,fk_idProduto) 
	VALUES (100, ':forma_pagamento', 1, 1);


insert into produto (idProduto,nome, valor, descricao)
values ( 1 ,'dog', 12, 'quente');


INSERT INTO cliente (cnpj, nome, telefone, email)
VALUES ("874562131894651", "Moura", "98465165", "moura@moura.com");

INSERT INTO cliente (cnpj, nome, telefone, email)
VALUES ("984651324651215", "Shell", "98465132", "shell@shell.com");

INSERT INTO cliente (cnpj, nome, telefone, email)
VALUES ("874562142524534", "Heliar", "894561236", "heliar@heliar.com");

INSERT INTO produto (nome, valor, descricao)
VALUES ("agua", "20", "agua sanitaria");

INSERT INTO vendedor (cpf, nome, telefone, email)
VALUES ("87423432656", "Marcos", "28951236", "marcos@marcos.com");