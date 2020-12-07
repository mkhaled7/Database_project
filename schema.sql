drop table myclientsession cascade constraints;
drop table myclient cascade constraints;
drop table section cascade constraints;
drop table student cascade constraints;
drop table course cascade constraints;
drop table enrollment cascade constraints;

create table myclient (
  clientid varchar2(8) primary key,
  password varchar2(12),
  adminflag number(1), 
  studentflag number(1)
);

create table myclientsession (
  sessionid varchar2(32) primary key,
  clientid varchar2(8),
  sessiondate date,
  foreign key (clientid) references myclient
);

create table student (
  studentid varchar2(8) primary key,
  name varchar2(60),
  age varchar2(3),
  address varchar2(255),
  studenttype varchar2(15),
  clientid varchar2(8) not null unique,
  foreign key (clientid) references myclient
);

create table course (
  coursenumber varchar2(3) primary key,
  credit number,
  coursetitle varchar2(20),
  course_description varchar2(200)
);

create table section (
  sectionid number(8) primary key,
  coursetitle varchar2(20),
  semester varchar2(20),
  credits number(2),
  coursenumber varchar2(3),
  foreign key (coursenumber) references course
);

create table enrollment (
  sectionid number(8),
  studentid varchar2(8),
  primary key (sectionid, studentid),
  foreign key (sectionid) references section,
  foreign key (studentid) references student
);

/*
multi line comment
*/

insert into myclient values ('1', 'a', '1', '0');
insert into myclient values ('2', 'b', '0', '1');
insert into myclient values ('3', 'c', '1', '1');

insert into student values ('001', 'john', '21', 'address1', 'undergraduate', '2');
insert into student values ('002', 'mary', '22', 'address2', 'graduate', '3');

commit;

