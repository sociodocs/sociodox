drop table images;
drop table BlogComment;
create table BlogComment(sr_no serial primary key,post text NOT NULL,post_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,title varchar(300),filename varchar(100),imgtext varchar(100),author varchar(100));


select * from blogcomment;
