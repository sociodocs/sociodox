DROP TABLE IF EXISTS BlogComment;
DROP TABLE IF EXISTS finalchat;
DROP TABLE IF EXISTS users_organization;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS comment;
drop table if EXISTS donation;
DROP TABLE IF EXISTS organization;
drop table if EXISTS newsletter;
drop table if EXISTS contact;
drop table if EXISTS users;

create table users(
    username varchar(50) primary key,
    email varchar(100),
    mobile_no bigint,
    password varchar(255) not null);

create table contact(
    contact_id serial primary key,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) not null,
    mobile_no bigint not null,
    msg text);


create table newsletter(
    email_id serial primary key,
    email varchar(50) not null
);


create table organization(
    org_id serial NOT NULL PRIMARY key,
    org_name varchar(20) NOT NULL,
    org_type varchar(50) NOT NULL,
    org_category varchar(50) NOT NULL,
    email varchar(100) not null,
    mobile_no bigint not null,
    org_address varchar(100) NOT NULL,
    org_password varchar(255) not null,
    org_date timestamp NOT NULL,
    org_total_don int NOT NULL
);

create table donation(
    donation_id serial primary key,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100),
    mobile_no bigint,
    pan varchar(10),
    country varchar(20),
    amount_status varchar(50),
    amount int not null,
    comment text,
    org_id serial REFERENCES organization(org_id) on delete cascade on update set null
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
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100),
    mobile_no bigint,    
    dp varchar(50) NOT NULL,
    username varchar(50) REFERENCES users(username) on delete cascade on update set null
);

create table users_organization(
    username varchar(50) REFERENCES users(username) on delete cascade on update set null,
    org_id serial REFERENCES organization(org_id) on delete cascade on update set null
);

CREATE TABLE finalchat(
  uname varchar(20) NOT NULL,
  msg text NOT NULL,
  dt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table BlogComment(
    sr_no serial primary key,
    post text NOT NULL,
    post_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    title varchar(300),
    filename varchar(100),
    imgtext varchar(100),
    author varchar(100)
);