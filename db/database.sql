DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS comment;
drop table if EXISTS newsletter;
drop table if EXISTS donation;
drop table if EXISTS contact;
drop table if EXISTS users;

create table users(
    username varchar(50) primary key,
    email varchar(100),
    mobile_no bigint,
    password varchar(100) not null);

create table contact(
    contact_id serial primary key,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) not null,
    mobile_no bigint not null,
    msg text);

create table donation(
    donation_id serial primary key,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) not null,
    mobile_no bigint,
    amount_status varchar(50),
    amount int not null,
    comment text);

create table newsletter(
    email_id serial primary key,
    email varchar(50) not null);


CREATE TABLE comment(
  sr_no serial NOT NULL PRIMARY key,
  name varchar(20) NOT NULL,
  comments text NOT NULL,
  post_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table admin(
    admin_username varchar(50) primary key,
    admin_password varchar(50) not null);

insert into admin values('aditya','123');

