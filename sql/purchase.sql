-- auto-generated definition
create table purchase
(
    username varchar(50) not null,
    product  varchar(50) not null,
    quantity int         null,
    primary key (username, product),
    constraint purchase_products_code_fk
        foreign key (product) references products (code),
    constraint purchase_users_username_fk
        foreign key (username) references users (username)
);

