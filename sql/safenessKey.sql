-- auto-generated definition
create table safenessKey
(
    username      varchar(50)  not null,
    secretcode    varchar(150) not null,
    dateOfRequest date         null,
    timeOfRequest time         null,
    primary key (username, secretcode),
    constraint safenessKey_users_username_fk
        foreign key (username) references users (username)
            on update cascade
);

