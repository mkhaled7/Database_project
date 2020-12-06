drop table myclientsession cascade constraints;
drop table myclient cascade constraints;
drop table section cascade constraints;

create table myclient (
  clientid varchar2(8) primary key,
  name varchar2(60),
  age varchar2(3),
  address varchar2(255),
  password varchar2(12),
  adminflag number(1), 
  studentflag number(1), 
  studenttype number(1)
);

create table myclientsession (
  sessionid varchar2(32) primary key,
  clientid varchar2(8),
  sessiondate date,
  foreign key (clientid) references myclient
);

create table section (
  sid number(8) primary key,
  clientid varchar2(8),
  cnumber number(4),
  ctitle varchar2(20),
  semester varchar2(20),
  credits number(2),
  grade varchar2(1),
  foreign key (clientid) references myclient
);

/*
dhgsjdhsajhdsjakf
*/

insert into myclient values ('1', 'john', '21', 'address1', 'a', '1', '0', '0');
insert into myclient values ('2', 'mary', '22', 'address2', 'b', '0', '1', '1');
insert into myclient values ('3', 'jesus', '23', 'address3', 'c', '1', '1', '2');

commit;

