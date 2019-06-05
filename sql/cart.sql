-- auto-generated definition
create table cart
(
  username varchar(32) null,
  item     varchar(32) null,
  amount   int         null,
  constraint cart_products_code_fk
    foreign key (item) references products (code)
      on update cascade,
  constraint cart_users_username_fk
    foreign key (username) references users (username)
      on update cascade
) ENGINE myISAM;

