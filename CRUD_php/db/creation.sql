use crud_produtos;

# criando a primeira tabela
create table produto (
	id int primary key auto_increment not null,
	name varchar(50) not null,
	price float not null 
);