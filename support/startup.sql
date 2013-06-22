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
insert into companies (company_name) values ('Amazon');
insert into companies (company_name) values ('Microsoft');


create table roles (
  role_id int unsigned not null auto_increment,
  role_name varchar(50) not null,
  primary key (role_id)
);

insert into roles (role_name) values ('Web Developer');
insert into roles (role_name) values ('.NET Developer');
insert into roles (role_name) values ('Accountant');
insert into roles (role_name) values ('Administrative Assistant');
insert into roles (role_name) values ('Application Architect');
insert into roles (role_name) values ('Application Developer');
insert into roles (role_name) values ('Assistant Store Manager');
insert into roles (role_name) values ('Business Analyst');
insert into roles (role_name) values ('Business Consultant');
insert into roles (role_name) values ('Business Development');
insert into roles (role_name) values ('Business Intelligence');
insert into roles (role_name) values ('Business Process Analyst ');
insert into roles (role_name) values ('Business Systems Analyst');
insert into roles (role_name) values ('Case Manager');
insert into roles (role_name) values ('Certified Financial Planner');
insert into roles (role_name) values ('Certified Nursing Assistant');
insert into roles (role_name) values ('Certified Occupational Therapy Assistant (COTA)');
insert into roles (role_name) values ('Certified Respiratory Therapist');
insert into roles (role_name) values ('Chief Operating Officer');
insert into roles (role_name) values ('Chief Technology Officer');
insert into roles (role_name) values ('Computer Programmer');
insert into roles (role_name) values ('Controller');
insert into roles (role_name) values ('Customer Communications Specialist');
insert into roles (role_name) values ('Data Analyst');
insert into roles (role_name) values ('Data Architect');
insert into roles (role_name) values ('Database Administrator');
insert into roles (role_name) values ('Design Engineer');
insert into roles (role_name) values ('Driver');
insert into roles (role_name) values ('Drupal Developer');
insert into roles (role_name) values ('Electrical Engineer');
insert into roles (role_name) values ('ETL Developer');
insert into roles (role_name) values ('Finance Manager');
insert into roles (role_name) values ('Financial Advisor');
insert into roles (role_name) values ('Financial Analyst');
insert into roles (role_name) values ('Front End Developer');
insert into roles (role_name) values ('Graphic Designer');
insert into roles (role_name) values ('Hospitalist');
insert into roles (role_name) values ('Human Resources Consultant');
insert into roles (role_name) values ('Human Resources Manager');
insert into roles (role_name) values ('Investment Consultant');
insert into roles (role_name) values ('Java Developer');
insert into roles (role_name) values ('JavaScript Developer');
insert into roles (role_name) values ('LAMP Developer');
insert into roles (role_name) values ('Lead Programmer');
insert into roles (role_name) values ('Licensed Practical Nurse');
insert into roles (role_name) values ('Management Analyst');
insert into roles (role_name) values ('Manufacturing Engineer');
insert into roles (role_name) values ('Marketing Manager');
insert into roles (role_name) values ('Mechanical Engineer');
insert into roles (role_name) values ('Medical Assistant');
insert into roles (role_name) values ('Medical Director');
insert into roles (role_name) values ('Network Engineer');
insert into roles (role_name) values ('Nurse Clinician');
insert into roles (role_name) values ('Nurse Practitioner');
insert into roles (role_name) values ('Occupational Therapist');
insert into roles (role_name) values ('Operations Manager');
insert into roles (role_name) values ('Oracle DBA');
insert into roles (role_name) values ('Pharmaceutical Sales Representative');
insert into roles (role_name) values ('Pharmacist');
insert into roles (role_name) values ('Pharmacy Technician');
insert into roles (role_name) values ('Phlebotomist');
insert into roles (role_name) values ('PHP Developer');
insert into roles (role_name) values ('Physical Therapist');
insert into roles (role_name) values ('Physical Therapy Assistant');
insert into roles (role_name) values ('Police Officer');
insert into roles (role_name) values ('Process Engineer');
insert into roles (role_name) values ('Product Developer');
insert into roles (role_name) values ('Program Manager');
insert into roles (role_name) values ('Project Manager');
insert into roles (role_name) values ('Quality Assurance');
insert into roles (role_name) values ('Quality Engineer');
insert into roles (role_name) values ('Registered Nurse (RN)');
insert into roles (role_name) values ('Ruby on Rails Developer ');
insert into roles (role_name) values ('Sales Manager');
insert into roles (role_name) values ('Scientist');
insert into roles (role_name) values ('SEO Manager');
insert into roles (role_name) values ('Sharepoint Developer');
insert into roles (role_name) values ('Social Worker');
insert into roles (role_name) values ('Software Architect');
insert into roles (role_name) values ('Software Developer');
insert into roles (role_name) values ('Software Engineer');
insert into roles (role_name) values ('Solution Architect');
insert into roles (role_name) values ('Solutions Architect');
insert into roles (role_name) values ('Speech-Language Pathologist');
insert into roles (role_name) values ('SQL Developer');
insert into roles (role_name) values ('Staff Nurse');
insert into roles (role_name) values ('Systems Administrator');
insert into roles (role_name) values ('Systems Analyst');
insert into roles (role_name) values ('Systems Engineer');
insert into roles (role_name) values ('Technical Architect');
insert into roles (role_name) values ('Technical Support');
insert into roles (role_name) values ('Technical Writer');
insert into roles (role_name) values ('Test Engineer');
insert into roles (role_name) values ('Tester');
insert into roles (role_name) values ('Therapist');
insert into roles (role_name) values ('Warehouse Manager');
insert into roles (role_name) values ('Web Content Manager ');
insert into roles (role_name) values ('Web/UI/UX Designer');

create table company_to_role (
  company_id int unsigned not null,
  role_id int unsigned not null,
  primary key (company_id, role_id),
  foreign key (company_id) references companies(company_id),
  foreign key (role_id) references roles(role_id)
);

insert into company_to_role (company_id, role_id) values (1, 1);
insert into company_to_role (company_id, role_id) values (2, 1);
insert into company_to_role (company_id, role_id) values (3, 1);

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

insert into skills (skill_name) values ('HTML/CSS');
insert into skills (skill_name) values ('Java');
insert into skills (skill_name) values ('JavaScript');
insert into skills (skill_name) values ('AJAX');
insert into skills (skill_name) values ('HTML');
insert into skills (skill_name) values ('C/C++');
insert into skills (skill_name) values ('Ruby');
insert into skills (skill_name) values ('HTML5');
insert into skills (skill_name) values ('CSS3');
insert into skills (skill_name) values ('Python');
insert into skills (skill_name) values ('Ruby');
insert into skills (skill_name) values ('Linux');
insert into skills (skill_name) values ('XUL');
insert into skills (skill_name) values ('XAML');



create table role_to_skill (
  role_id int unsigned not null,
  skill_id int unsigned not null,
  primary key (role_id, skill_id),
  foreign key (role_id) references roles(role_id),
  foreign key (skill_id) references skills(skill_id)
);

insert into role_to_skill (role_id, skill_id) values (1, 1);
insert into role_to_skill (role_id, skill_id) values (1, 2);
insert into role_to_skill (role_id, skill_id) values (1, 3);
insert into role_to_skill (role_id, skill_id) values (1, 4);
insert into role_to_skill (role_id, skill_id) values (1, 5);
insert into role_to_skill (role_id, skill_id) values (1, 6);
insert into role_to_skill (role_id, skill_id) values (1, 7);
insert into role_to_skill (role_id, skill_id) values (1, 8);
insert into role_to_skill (role_id, skill_id) values (1, 9);
insert into role_to_skill (role_id, skill_id) values (1, 10);
insert into role_to_skill (role_id, skill_id) values (1, 11);
insert into role_to_skill (role_id, skill_id) values (1, 12);
insert into role_to_skill (role_id, skill_id) values (1, 13);
insert into role_to_skill (role_id, skill_id) values (1, 14);


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

insert into providers (provider_name) values ('Codeschool');
insert into providers (provider_name) values ('Codeacademy');
insert into providers (provider_name) values ('Team Treehouse');


create table courses (
  course_id int unsigned not null auto_increment,
  provider_id int unsigned not null,
  skill_id int unsigned not null,
  course_name varchar(50) not null,
  level varchar(50) not null,
  url varchar(100) not null,
  primary key (course_id),
  foreign key (provider_id) references providers(provider_id)
);

insert into courses (provider_id, skill_id, course_name, level, url) values (3, 1, 'HTML', 'Beginner', 'http://teamtreehouse.com/library/websites/html');
insert into courses (provider_id, skill_id, course_name, level, url) values (3, 1, 'CSS', 'Beginner', 'http://teamtreehouse.com/library/websites/css-foundations-2');
insert into courses (provider_id, skill_id, course_name, level, url) values (2, 1, 'Web Fundamentals', 'Beginner', 'http://www.codecademy.com/tracks/web');
insert into courses (provider_id, skill_id, course_name, level, url) values (1, 1, 'Functional HTML5 and CSS3', 'Beginner', 'http://www.codeschool.com/courses/functional-html5-css3');
insert into courses (provider_id, skill_id, course_name, level, url) values (1, 1, 'CSS Cross Country', 'Beginner', 'http://www.codeschool.com/courses/css-cross-country');
insert into courses (provider_id, skill_id, course_name, level, url) values (1, 1, 'Journey into Mobile - Responsive Design', 'Intermediate', 'http://www.codeschool.com/courses/journey-into-mobile');
insert into courses (provider_id, skill_id, course_name, level, url) values (3, 1, 'Build a Responsive WebsIte', 'Intermediate', 'http://teamtreehouse.com/library/websites/build-a-responsive-website');
insert into courses (provider_id, skill_id, course_name, level, url) values (1, 1, 'Assembling SaSS', 'Intermediate', 'http://www.codeschool.com/courses/assembling-sass');
insert into courses (provider_id, skill_id, course_name, level, url) values (1, 1, 'Assembling SaSS 2', 'Intermediate', 'http://www.codeschool.com/courses/assembling-sass-part-2');

create view vw_courses as
select
 s.skill_id,
 s.skill_name,
 p.provider_id,
 p.provider_name,
 c.course_id,
 c.course_name,
 c.level,
 c.url
from courses c
inner join providers p on c.provider_id = p.provider_id
inner join skills s on s.skill_id = c.skill_id;

