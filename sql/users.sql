-- auto-generated definition
create table users
(
    name        varchar(64)            not null,
    surname     varchar(64)            not null,
    username    varchar(64) default '' not null
        primary key,
    mail        varchar(64)            not null,
    password    varchar(128)           not null,
    description text                   null,
    location    varchar(32)            null,
    admin       bit                    null,
    img         blob                   null,
    constraint users_mail_uindex
        unique (mail)
);

