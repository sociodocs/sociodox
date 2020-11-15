SELECT * FROM users;
SELECT * FROM contact;
SELECT * FROM donation;
SELECT * FROM newsletter;

/*--------------------------- insert values---------------------*/
insert into users VALUES('aditya','akarale61@gmail.com','7721879802','123');
insert into users VALUES('utkarsh','ub@gmail.com','7721845802','123');

select * from users;

insert into contact VALUES('aditya','karale','akarale61@gmail.com','7721879802','hello');
insert into contact VALUES('utkarsh','belkhede','ub@gmail.com','7721845802','hi');

select * from contact;

insert into donation values('aditya','karale','akarale61@gmail.com','7721879802','one-time','1000','send me reciept');
insert into donation values('utkarsh','belkhede','ub@gmail.com','7721845802','one-time','1000','send me reciept');

select * from contact;

insert into newsletter values('akarale61@gmail.com');
insert into newsletter values('ub@gmail.com');

select * from newsletter;

insert into organization values('1001','save_tree','Government','Environment','5000');
insert into organization values('1002','blood_donate','non-government','Health','6000');
insert into organization values('2003','blood_donate','non-government','Health','6000');

select * from organization;

insert into comment values('2001','Aditya','Hi','1001');
insert into comment values('2002','Utkarsh','Hello','1002');
insert into comment values('2003','Utkarsh','Hello','2003');

select * from comment;

insert into profile values('3001','Aditya','male','path','aditya');
insert into profile values('3002','Utkarsh','male','path','utkarsh');

select * from profile;

insert into users_organization values('aditya','1001');
insert into users_organization values('utkarsh','1002');

select * from users_organization;
