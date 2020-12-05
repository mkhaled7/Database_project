drop table myclientsession cascade constraints;
drop table myclient cascade constraints;

create table myclient (
  clientid varchar2(8) primary key,
  password varchar2(12),
  usertype number(1)
);

create table myclientsession (
  sessionid varchar2(32) primary key,
  clientid varchar2(8),
  sessiondate date,
  foreign key (clientid) references myclient
);

insert into myclient values ('john', 'a', '0');
insert into myclient values ('mary', 'b', '1'); 
insert into myclient values ('jesus', 'c', '2'); 

commit;

