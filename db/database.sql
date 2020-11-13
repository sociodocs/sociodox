DROP TABLE IF EXISTS users_organization;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS organization;
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
    email varchar(100),
    mobile_no bigint,
    amount_status varchar(50),
    amount int not null,
    comment text);

create table newsletter(
    email_id serial primary key,
    email varchar(50) not null
);


create table organization(
    org_id serial NOT NULL PRIMARY key,
    org_name varchar(20) NOT NULL,
    org_type varchar(50) NOT NULL,
    org_category varchar(50) NOT NULL,
    org_total_don int NOT NULL
);


CREATE TABLE comment(
  sr_no serial NOT NULL PRIMARY key,
  name varchar(20) NOT NULL,
  comments text NOT NULL,
  post_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table admin(
    admin_username varchar(50) primary key,
    admin_password varchar(50) not null);

insert into admin VALUES('aditya','123');
insert into admin VALUES('utkarsh','123');
insert into admin VALUES('devis','123');

create table profile(
    pid serial NOT NULL PRIMARY key,
    pname varchar(20) NOT NULL,
    sex varchar(10) NOT NULL,
    joined timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dp varchar(20) NOT NULL,
    username varchar(50) REFERENCES users(username) on delete cascade on update set null
);

create table users_organization(
    username varchar(50) REFERENCES users(username) on delete cascade on update set null,
    org_id int REFERENCES organization(org_id) on delete cascade on update set null
);

