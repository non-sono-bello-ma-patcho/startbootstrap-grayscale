-- auto-generated definition
create table products
(
  code        varchar(10) default '' not null
    primary key,
  name        varchar(32)            not null,
  description text                   null,
  price       varchar(32)            not null,
  img         blob                   not null,
  relevance   int                    null,
  level       int                    null,
  minAge      int                    null,
  distance    int                    null,
  duration    int                    null,
  guide       bit                    null,
  housing     bit                    null,
  maxUsers    int                    null,
  active      tinyint                default true null
);