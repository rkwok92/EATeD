use eateddb;

drop view vw_courses;
drop view vw_company_to_role;
drop view vw_role_to_skill;

drop table company_to_role;
drop table role_to_skill;

drop table companies;
drop table roles;
drop table skills;

drop table courses;
drop table providers;


create table companies (
  company_id int unsigned not null auto_increment,
  company_name varchar(50) not null,
  primary key (company_id)
);

insert into companies (company_name) values ('Google');
insert into companies (company_name) values ('Facebook');
insert into companies (company_name) values ('Microsoft');


create table roles (
  role_id int unsigned not null auto_increment,
  role_name varchar(50) not null,
  primary key (role_id)
);

insert into roles (role_name) values ('Rails Developer');
insert into roles (role_name) values ('Web Developer');
insert into roles (role_name) values ('Database Administrator');

create table company_to_role (
  company_id int unsigned not null,
  role_id int unsigned not null,
  primary key (company_id, role_id),
  foreign key (company_id) references companies(company_id),
  foreign key (role_id) references roles(role_id)
);

insert into company_to_role (company_id, role_id) values (1, 1);
insert into company_to_role (company_id, role_id) values (1, 2);
insert into company_to_role (company_id, role_id) values (2, 1);
insert into company_to_role (company_id, role_id) values (3, 3);

create view vw_company_to_role as
select
 c.company_id,
 c.company_name,
 r.role_id,
 r.role_name
from companies c
inner join company_to_role t on c.company_id = t.company_id
inner join roles r on r.role_id = t.role_id;



create table skills (
  skill_id int unsigned not null auto_increment,
  skill_name varchar(50) not null,
  primary key (skill_id)
);

insert into skills (skill_name) values ('Ruby');
insert into skills (skill_name) values ('Rails');
insert into skills (skill_name) values ('SQL');



create table role_to_skill (
  role_id int unsigned not null,
  skill_id int unsigned not null,
  primary key (role_id, skill_id),
  foreign key (role_id) references roles(role_id),
  foreign key (skill_id) references skills(skill_id)
);

insert into role_to_skill (role_id, skill_id) values (1, 1);
insert into role_to_skill (role_id, skill_id) values (1, 2);
insert into role_to_skill (role_id, skill_id) values (3, 3);


create view vw_role_to_skill as
select
 r.role_id,
 r.role_name,
 s.skill_id,
 s.skill_name
from roles r
inner join role_to_skill t on r.role_id = t.role_id
inner join skills s on s.skill_id = t.skill_id;





create table providers (
  provider_id int unsigned not null auto_increment,
  provider_name varchar(50) not null,
  primary key (provider_id)
);

insert into providers (provider_name) values ('Coursera');
insert into providers (provider_name) values ('EdX');


create table courses (
  course_id int unsigned not null auto_increment,
  provider_id int unsigned not null,
  skill_id int unsigned not null,
  course_name varchar(50) not null,
  primary key (course_id),
  foreign key (provider_id) references providers(provider_id)
);

insert into courses (provider_id, skill_id, course_name) values (1, 1, 'Ruby on Rails');
insert into courses (provider_id, skill_id, course_name) values (1, 3, 'Intro to Databases');
insert into courses (provider_id, skill_id, course_name) values (2, 2, 'Rails using Ruby');
insert into courses (provider_id, skill_id, course_name) values (2, 3, 'Databases I');


create view vw_courses as
select
 p.provider_id,
 p.provider_name,
 c.course_id,
 c.course_name,
 s.skill_id,
 s.skill_name
from courses c
inner join providers p on c.provider_id = p.provider_id
inner join skills s on s.skill_id = c.skill_id;





