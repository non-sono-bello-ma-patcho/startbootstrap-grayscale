-- auto-generated definition
create table users
(
    name        varchar(64)            not null,
    surname     varchar(64)            not null,
    username    varchar(64) default '' not null primary key,
    email        varchar(64)            not null,
    password    varchar(128)           not null,
    img         blob                   null,
    description text                   null,
    location    varchar(32)            null,
    admin       bit                    null,
    constraint users_mail_uindex
        unique (mail)
);

