create table book (
id int auto_increment primary key,
isbn varchar(13) not null,
title varchar(255) not null,
author varchar(255) not null,
stock smallint,
price float
);
create table customer (
id int auto_increment primary key,
firstname varchar(255) not null,
surname varchar(255) not null,
email varchar(255) not null,
type enum('basic', 'premium')
);


create table borrowed_books (
customer_id int,
book_id int,
start datetime not null,
end datetime not null,
foreign key (customer_id) references customer(id),
foreign key (book_id) references book (id)
);


create table sale (
id int auto_increment primary key,
customer_id int,
foreign key (customer_id) references customer (id),
date datetime not null
);

create table sale_book (
book_id int,
sale_id int,
foreign key (book_id) references book (id),
foreign key (sale_id) references sale (id),
amount smallint
);

insert into book value (null,"8438484","Quijote","Cervantes",4,15);
insert into book value (null,"8438482","Sin noticias de Gurp","Mendoza",9,10);
insert into book value (null,"8438480","Los juegos del hambre","Suzanne Collins",2,25);
insert into book value (null,"8438484","Percy jackson y el ladron del rayo","Rick Riordan",8,20);