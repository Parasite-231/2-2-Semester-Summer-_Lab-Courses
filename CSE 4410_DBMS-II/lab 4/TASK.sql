SET PAGESIZE 100;

DROP TABLE Dept CASCADE CONSTRAINTS;
DROP TABLE Program CASCADE CONSTRAINTS;
DROP TABLE Student CASCADE CONSTRAINTS;
DROP TABLE Course CASCADE CONSTRAINTS;
DROP TABLE Stud_Take_Course CASCADE CONSTRAINTS;
DROP TABLE Teacher CASCADE CONSTRAINTS;
DROP TABLE Semester CASCADE CONSTRAINTS;
DROP TABLE STUDENT_TAKE_COURSE;

CREATE TABLE DEPT
(
	DEPT_NAME VARCHAR2(30),
	EST_YEAR DATE,
	HOD VARCHAR2(30),
	BUDGET NUMBER,
	CONSTRAINT DEPT_PK_1 PRIMARY KEY (DEPT_NAME)
);

CREATE TABLE PROGRAM
(
	PRG_NAME VARCHAR2(30),
	DEPT_NAME VARCHAR2(30),
	TOT_CREDIT NUMBER,
	OFFERED_YEAR DATE,
	CONSTRAINT PROGRAM_PK_1 PRIMARY KEY (PRG_NAME),
	CONSTRAINT PROGRAM_FK_1 FOREIGN KEY (DEPT_NAME) REFERENCES DEPT
);

CREATE TABLE STUDENT
(
	STUD_ID INT,
	NAME VARCHAR2(40),
	DOB DATE,
	ADDRESS VARCHAR2(100),
	HEIGHT NUMBER,
	BLOOD_GRP VARCHAR2(10),
	PRG_NAME VARCHAR2(30),
	DEPT_NAME VARCHAR2(30),
	CONSTRAINT STUDENT_PK_1 PRIMARY KEY (STUD_ID),
	CONSTRAINT STUDENT_FK_1 FOREIGN KEY (PRG_NAME) REFERENCES PROGRAM,
	CONSTRAINT STUDENT_FK_2 FOREIGN KEY (DEPT_NAME) REFERENCES DEPT
);

CREATE TABLE TEACHER
(
	INS_ID INT,
	NAME VARCHAR2(40),
	PHONE NUMBER,
	ADDRESS VARCHAR2(100),
	BLOOD_GRP VARCHAR2(10),
	DEPT_NAME VARCHAR2(30),
	CONSTRAINT TEACHER_PK_1 PRIMARY KEY (INS_ID),
	CONSTRAINT TEACHER_FK_1 FOREIGN KEY (DEPT_NAME) REFERENCES DEPT
);

CREATE TABLE SEMESTER
(
	SEM_NAME VARCHAR2(30),
	PRG_NAME VARCHAR2(30),
	DEPT_NAME VARCHAR2(30),
	CONSTRAINT SEMESTER_PK_1 PRIMARY KEY (SEM_NAME)
);

CREATE TABLE COURSE
(
	COURSE_CODE VARCHAR2(12),
	TITLE VARCHAR2(30),
	CREDIT NUMBER,
	INS_ID INT,
	SEM_NAME VARCHAR2(20),
	CONSTRAINT COURSE_PK_1 PRIMARY KEY (COURSE_CODE),
	CONSTRAINT COURSE_FK_1 FOREIGN KEY (INS_ID) REFERENCES TEACHER,
	CONSTRAINT COURSE_FK_2 FOREIGN KEY (SEM_NAME) REFERENCES SEMESTER
);

CREATE TABLE STUDENT_TAKE_COURSE
(
	STUD_ID INT,
	COURSE_CODE VARCHAR2(12),
	SEMESTER VARCHAR2(30),
	CONSTRAINT STUDENT_TAKE_COURSE_PK_1 PRIMARY KEY (STUD_ID, COURSE_CODE, SEMESTER),
	CONSTRAINT STUDENT_TAKE_COURSE_FK_1 FOREIGN KEY (STUD_ID) REFERENCES STUDENT,
	CONSTRAINT STUDENT_TAKE_COURSE_FK_2 FOREIGN KEY (COURSE_CODE) REFERENCES COURSE,
	CONSTRAINT STUDENT_TAKE_COURSE_FK_3 FOREIGN KEY (SEMESTER) REFERENCES SEMESTER
);

create user muktadir36 identified by nowayhome;
grant create session, resource to muktadir36;
grant unlimited tablespace to muktadir36;



SQL>
SQL> CREATE TABLE DEPT
  2  (
  3  DEPT_NAME VARCHAR2(30),
  4  EST_YEAR DATE,
  5  HOD VARCHAR2(30),
  6  BUDGET NUMBER,
  7  CONSTRAINT DEPT_PK_1 PRIMARY KEY (DEPT_NAME)
  8  );

Table created.

SQL>
SQL> CREATE TABLE PROGRAM
  2  (
  3  PRG_NAME VARCHAR2(30),
  4  DEPT_NAME VARCHAR2(30),
  5  TOT_CREDIT NUMBER,
  6  OFFERED_YEAR DATE,
  7  CONSTRAINT PROGRAM_PK_1 PRIMARY KEY (PRG_NAME),
  8  CONSTRAINT PROGRAM_FK_1 FOREIGN KEY (DEPT_NAME) REFERENCES DEPT
  9  );

Table created.

SQL>
SQL> CREATE TABLE STUDENT
  2  (
  3  STUD_ID INT,
  4  NAME VARCHAR2(40),
  5  DOB DATE,
  6  ADDRESS VARCHAR2(100),
  7  HEIGHT NUMBER,
  8  BLOOD_GRP VARCHAR2(10),
  9  PRG_NAME VARCHAR2(30),
 10  DEPT_NAME VARCHAR2(30),
 11  CONSTRAINT STUDENT_PK_1 PRIMARY KEY (STUD_ID),
 12  CONSTRAINT STUDENT_FK_1 FOREIGN KEY (PRG_NAME) REFERENCES PROGRAM,
 13  CONSTRAINT STUDENT_FK_2 FOREIGN KEY (DEPT_NAME) REFERENCES DEPT
 14  );

Table created.

SQL>
SQL> CREATE TABLE TEACHER
  2  (
  3  INS_ID INT,
  4  NAME VARCHAR2(40),
  5  PHONE NUMBER,
  6  ADDRESS VARCHAR2(100),
  7  BLOOD_GRP VARCHAR2(10),
  8  DEPT_NAME VARCHAR2(30),
  9  CONSTRAINT TEACHER_PK_1 PRIMARY KEY (INS_ID),
 10  CONSTRAINT TEACHER_FK_1 FOREIGN KEY (DEPT_NAME) REFERENCES DEPT
 11  );

Table created.

SQL>
SQL> CREATE TABLE SEMESTER
  2  (
  3  SEM_NAME VARCHAR2(30),
  4  PRG_NAME VARCHAR2(30),
  5  DEPT_NAME VARCHAR2(30),
  6  CONSTRAINT SEMESTER_PK_1 PRIMARY KEY (SEM_NAME)
  7  );

Table created.

SQL>
SQL> CREATE TABLE COURSE
  2  (
  3  COURSE_CODE VARCHAR2(12),
  4  TITLE VARCHAR2(30),
  5  CREDIT NUMBER,
  6  INS_ID INT,
  7  SEM_NAME VARCHAR2(20),
  8  CONSTRAINT COURSE_PK_1 PRIMARY KEY (COURSE_CODE),
  9  CONSTRAINT COURSE_FK_1 FOREIGN KEY (INS_ID) REFERENCES TEACHER,
 10  CONSTRAINT COURSE_FK_2 FOREIGN KEY (SEM_NAME) REFERENCES SEMESTER
 11  );

Table created.

SQL>
SQL> CREATE TABLE STUDENT_TAKE_COURSE
  2  (
  3  STUD_ID INT,
  4  COURSE_CODE VARCHAR2(12),
  5  SEMESTER VARCHAR2(30),
  6  CONSTRAINT STUDENT_TAKE_COURSE_PK_1 PRIMARY KEY (STUD_ID, COURSE_CODE, SEMESTER),
  7  CONSTRAINT STUDENT_TAKE_COURSE_FK_1 FOREIGN KEY (STUD_ID) REFERENCES STUDENT,
  8  CONSTRAINT STUDENT_TAKE_COURSE_FK_2 FOREIGN KEY (COURSE_CODE) REFERENCES COURSE,
  9  CONSTRAINT STUDENT_TAKE_COURSE_FK_3 FOREIGN KEY (SEMESTER) REFERENCES SEMESTER
 10  );

Table created.

insert into dept values('CSE',DATE '2001-12-17','Dr.Y',45000);
insert into dept values('EEE',DATE '2001-12-17','Dr.X',35000);
insert into dept values('MPE',DATE '2001-12-17','Dr.M',65000);
insert into dept values('CEE',DATE '2001-12-17','Dr.Z',85000);


insert into program values('SWE','CSE',4,DATE '2018-12-17');
insert into program values('IPE','MPE',4,DATE '2019-12-17');

insert into student values(45,'ABIR',DATE '1998-12-17','DHAKA',5,'B+','SWE','CSE');
insert into student values(36,'MUKTADIR',DATE '1999-12-17','DHAKA',5,'AB+','SWE','CSE');
insert into student values(23,'KUSHAL',DATE '2001-12-17','RANGPUR',6,'A+','IPE','MPE');


insert into teacher values(11,'Dr.V',01223,'DHAKA','O+','CSE');
insert into teacher values(12,'Dr.L',01224,'DHAKA','B+','CSE');
insert into teacher values(31,'Dr.N',01023,'DHAKA','O+','MPE');

insert into semester values('Winter','SWE','CSE');
insert into semester values('Winter','IPE','MPE');
insert into semester values('Summer','IPE','MPE');
insert into semester values('Summer','SWE','CSE');

insert into course values('4107','Algorithm',4,11,'Winter');
insert into course values('4127','TOC',4,12,'Winter');
insert into course values('4100','DS',4,11,'Winter');
insert into course values('4134','DBMS',4,12,'Summer');
insert into course values('3407','Fluid_Mecha',4,31,'Winter');

insert into student_take_course values(36,'4107','Winter');
insert into student_take_course values(36,'4127','Winter');
insert into student_take_course values(36,'4100','Winter');
insert into student_take_course values(45,'4134','Summer');



SQL> insert into dept values('CSE',DATE '2001-12-17','Dr.Y',45000);

1 row created.

SQL> insert into dept values('CSE',DATE '2001-12-17','Dr.Y',45000);
insert into dept values('CSE',DATE '2001-12-17','Dr.Y',45000)
*
ERROR at line 1:
ORA-00001: unique constraint (SYSTEM.DEPT_PK_1) violated


SQL> insert into dept values('EEE',DATE '2001-12-17','Dr.X',35000);

1 row created.

SQL> insert into dept values('MPE',DATE '2001-12-17','Dr.M',65000);

1 row created.

SQL> insert into dept values('CEE',DATE '2001-12-17','Dr.Z',85000);

1 row created.


SQL> insert into program values('SWE','CSE',4,DATE '2018-12-17');

1 row created.

SQL> insert into program values('IPE','MCE',4,DATE '2019-12-17');
insert into program values('IPE','MCE',4,DATE '2019-12-17')
*
ERROR at line 1:
ORA-02291: integrity constraint (SYSTEM.PROGRAM_FK_1) violated - parent key not
found


SQL> insert into program values('IPE','MPE',4,DATE '2019-12-17');

1 row created.


SQL> insert into student values(45,'ABIR',DATE '1998-12-17','DHAKA',5,'B+','SWE','CSE');

1 row created.

SQL> insert into student values(36,'MUKTADIR',DATE '1999-12-17','DHAKA',5,'AB+','SWE','CSE');

1 row created.

SQL> insert into student values(23,'KUSHAL',DATE '2001-12-17','RANGPUR',6,'A+','IPE','MPE');

1 row created.

SQL> insert into teacher values(11,'Dr.V',01223,'DHAKA',5,'O+','CSE');
insert into teacher values(11,'Dr.V',01223,'DHAKA',5,'O+','CSE')
            *
ERROR at line 1:
ORA-00913: too many values


SQL> insert into teacher values(12,'Dr.L',01224,'DHAKA',5,'B+','CSE');
insert into teacher values(12,'Dr.L',01224,'DHAKA',5,'B+','CSE')
            *
ERROR at line 1:
ORA-00913: too many values


SQL> insert into teacher values(31,'Dr.N',01023,'DHAKA',7,'O+','MPE');
insert into teacher values(31,'Dr.N',01023,'DHAKA',7,'O+','MPE')
            *
ERROR at line 1:
ORA-00913: too many values


SQL>
SQL> insert into teacher values(11,'Dr.V',01223,'DHAKA','O+','CSE');

1 row created.

SQL> insert into teacher values(12,'Dr.L',01224,'DHAKA','B+','CSE');

1 row created.

SQL> insert into teacher values(31,'Dr.N',01023,'DHAKA','O+','MPE');

1 row created.

SQL> insert into semester values('Summer','IPE','MPE');

1 row created.

SQL> insert into semester values('Winter','SWE','CSE');

1 row created.

SQL> insert into course values('4107','Algorithm',4,11,'Winter');

1 row created.

SQL> insert into course values('4127','TOC',4,12,'Winter');

1 row created.

SQL> insert into course values('4100','DS',4,11,'Winter');

1 row created.

SQL> insert into course values('4134','DBMS',4,12,'Summer');

1 row created.

SQL> insert into course values('3407','Fluid_Mecha',4,31,'Winter');

1 row created.

SQL> insert into student_take_course values(36,'4107','Winter');

1 row created.

SQL> insert into student_take_course values(36,'4127','Winter');

1 row created.

SQL> insert into student_take_course values(36,'4100','Winter');

1 row created.

SQL> insert into student_take_course values(45,'4134','Summer');

1 row created.

TASK 01:

set serveroutput on;
create or replace function totalCourses(id in int, semester in varchar2)
return number 
is
no_of_courses number := 0;
begin

--query

 select count(course_code) into no_of_courses from student_take_course where stud_id = id and semester = semester;

 return no_of_courses;

end;
/

  
begin    
   dbms_output.put_line('Total no. of Courses: ' ||totalCourses(36,'Winter') );  
end;  
/  

--output
SQL> create or replace function totalCourses(id in int, semester in varchar2)
  2  return number
  3  is
  4  no_of_courses number := 0;
  5  begin
  6
  7  --query
  8
  9   select count(course_code) into no_of_courses from student_take_course where stud_id = id and semester = semester;
 10
 11   return no_of_courses;
 12
 13  end;
 14  /

Function created.

SQL>
SQL>
SQL> begin
  2     dbms_output.put_line('Total no. of Courses: ' ||totalCourses(36,'Winter') );
  3  end;
  4  /
Total no. of Courses: 3

PL/SQL procedure successfully completed.


Task -02:

set serveroutput on;
create or replace procedure studentList(id in int)
is
s_id number := 0;
s_name varchar2(2) ;
begin

--query

select student.stud_id into s_id number, student.name into s_name from student inner join teacher on student.dept_name = teacher.dept_name where teacher.ins_id = id;

end;
/

begin 
   studentList(11);
   dbms_output.put_line('List of Students under particular Instructor(Id-11)');    
END;    
/    

Output--
SQL> select student.stud_id, student.name from student inner join teacher on student.dept_name = teacher.dept_name where teacher.ins_id = 11;

   STUD_ID NAME
---------- ----------------------------------------
        45 ABIR
        36 MUKTADIR


Task -03

Examples:

CONCAT->Add two strings together
Example-SELECT CONCAT('DBMS', 'LAB');

INSTR->Search for "2" in string "DBMS-2", and return position
Example-SELECT INSTR("DBMS-2", "2") AS MatchPosition;

LOWER->Convert the text to Lower-case:
SELECT LOWER('SQL  is FUN! But HARD');

UPPER->Convert the text to Upper-case:
SELECT UPPER('SQL Tutorial is FUN!');

LENGTH->Return the length of the string:
SELECT LENGTH("SQL Tutorial") AS LengthOfString;

COUNT->The COUNT() function returns the number of rows:
SELECT COUNT(column_name) FROM table_name WHERE condition;

LPAD->Left-pad the string with "ABC", to a total length of 20:
SELECT LPAD("SQL Tutorial", 20, "ABC")

TRIM->Remove leading and trailing spaces from a string:
SELECT TRIM( '    DBMSLAB-2!    ') AS TrimmedString;

SUBSTR->The SUBSTR() function extracts a substring from a string (starting at any position)
SELECT SUBSTR("SQL DBMS-LAB", 5, 3) AS ExtractString;

INITCAP->Converts the first letter of each word in a string to uppercase
SELECT INITCAP('tech on the net');

