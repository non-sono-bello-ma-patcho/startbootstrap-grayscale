-- auto-generated definition
create table wishlist
(
    username varchar(50) not null,
    product  varchar(50) not null,
    primary key (username, product),
    constraint wishlist_products_code_fk
        foreign key (product) references products (code)
            on update cascade,
    constraint wishlist_users_username_fk
        foreign key (username) references users (username)
            on update cascade
);