create table wishlist
(
    username varchar(50) not null,
    item  varchar(50) not null,
    primary key (username, item),
    constraint wishlist_products_code_fk
        foreign key (item) references products (code)
            on update cascade,
    constraint wishlist_users_username_fk
        foreign key (username) references users (username)
            on update cascade
);