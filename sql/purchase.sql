create table purchases
(
    username varchar(50) not null,
    item  varchar(50) not null,
    amount int         null,
    primary key (username, item),
    constraint purchase_products_code_fk
        foreign key (item) references products (code),
    constraint purchase_users_username_fk
        foreign key (username) references users (username)
) ENGINE myISAM;

