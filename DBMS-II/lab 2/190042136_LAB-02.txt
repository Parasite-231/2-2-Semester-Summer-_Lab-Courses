SQL> connect system
Enter password:
Connected.
SQL> create user muktadir identified by pass36;

User created.

SQL> grant create session, resource to muktadir;

Grant succeeded.

SQL> grant unlimited tablespace to muktadir;

Grant succeeded.

TASK-01---->

create table Department_Information(
D_ID number,
D_Name varchar2(15),
constraint pk_Department_Information primary key(D_ID)
);

create table Student_Profile(
S_ID number,
S_Name varchar2(15),
S_Dept number,
DOB varchar2(20),
Present_Address varchar2(15),
Permanent_Address varchar2(15),
Physical_Height varchar2(12),
Program varchar2(15),
Blood_Group varchar2(15),
Extracirricular_Status varchar2(12),
Anti_DisciplinaryStatus varchar2(15),
constraint pk_Student_Profile primary key(S_ID),
constraint fk_Student_Profile foreign key(S_Dept) references Department_Information(D_ID)
);

create table Course(
C_ID number,
C_title varchar2(15),
C_Credit varchar2(15),
constraint pk_Course primary key(C_ID)
);

create table Student_Course_Information(
S_ID number NOT NULL,
C_ID number NOT NULL,
FOREIGN KEY (S_ID) REFERENCES Student_Profile(S_ID), 
FOREIGN KEY (C_ID) REFERENCES Course(C_ID),
UNIQUE (S_ID, C_ID)
);

SQL> create table Department(
  2  D-ID number,
  3  D_Name varchar2(15),
  4  constraint pk_Department primary key(D_ID)
  5  );
D-ID number,
 *
ERROR at line 2:
ORA-00902: invalid datatype


SQL> create table Department(
  2  D_ID number,
  3  D_Name varchar2(15),
  4  constraint pk_Department primary key(D_ID)
  5  );
create table Department(
             *
ERROR at line 1:
ORA-00955: name is already used by an existing object


SQL> drop table Department;
drop table Department
           *
ERROR at line 1:
ORA-02449: unique/primary keys in table referenced by foreign keys


SQL> create table Department_Information(
  2  D_ID number,
  3  D_Name varchar2(15),
  4  constraint pk_Department_Information primary key(D_ID)
  5  );

Table created.

SQL> create table Student_Profile(
  2  S_ID number,
  3  S_Name varchar2(15),
  4  S_Dept number,
  5  DOB varchar2(20),
  6  Present_Address varchar2(15),
  7  Permanent Address varchar2(15),
  8  Physical_Height varchar2(12),
  9  Program varchar2(15),
 10  Blood_Group varchar2(15),
 11  Extracirricular_Activities_Status varchar2(12),
 12  Anti_Disciplinary_Status varchar2(15),
 13  constraint pk_Student_Profile primary key(S_ID),
 14  constraint fk_Student_Profile foreign key(S_Dept) references Department_Information(D-ID)
 15  );
Permanent Address varchar2(15),
                  *
ERROR at line 7:
ORA-00907: missing right parenthesis


SQL> create table Student_Profile(
  2  S_ID number,
  3  S_Name varchar2(15),
  4  S_Dept number,
  5  DOB varchar2(20),
  6  Present_Address varchar2(15),
  7  Permanent_Address varchar2(15),
  8  Physical_Height varchar2(12),
  9  Program varchar2(15),
 10  Blood_Group varchar2(15),
 11  Extracirricular_Activities_Status varchar2(12),
 12  Anti_Disciplinary_Status varchar2(15),
 13  constraint pk_Student_Profile primary key(S_ID),
 14  constraint fk_Student_Profile foreign key(S_Dept) references Department_Information(D-ID)
 15  );
Extracirricular_Activities_Status varchar2(12),
*
ERROR at line 11:
ORA-00972: identifier is too long


SQL> create table Student_Profile(
  2  S_ID number,
  3  S_Name varchar2(15),
  4  S_Dept number,
  5  DOB varchar2(20),
  6  Present_Address varchar2(15),
  7  Permanent_Address varchar2(15),
  8  Physical_Height varchar2(12),
  9  Program varchar2(15),
 10  Blood_Group varchar2(15),
 11  Extracirricular_Status varchar2(12),
 12  Anti_DisciplinaryStatus varchar2(15),
 13  constraint pk_Student_Profile primary key(S_ID),
 14  constraint fk_Student_Profile foreign key(S_Dept) references Department_Information(D-ID)
 15  );
constraint fk_Student_Profile foreign key(S_Dept) references Department_Information(D-ID)
                                                                                     *
ERROR at line 14:
ORA-00904: : invalid identifier


SQL> create table Student_Profile(
  2  S_ID number,
  3  S_Name varchar2(15),
  4  S_Dept number,
  5  DOB varchar2(20),
  6  Present_Address varchar2(15),
  7  Permanent_Address varchar2(15),
  8  Physical_Height varchar2(12),
  9  Program varchar2(15),
 10  Blood_Group varchar2(15),
 11  Extracirricular_Status varchar2(12),
 12  Anti_DisciplinaryStatus varchar2(15),
 13  constraint pk_Student_Profile primary key(S_ID),
 14  constraint fk_Student_Profile foreign key(S_Dept) references Department_Information(D_ID)
 15  );

Table created.

SQL> create table Course(
  2  C_ID number,
  3  C_title varchar2(15),
  4  C_Credit varchar2(15),
  5  constraint pk_Course primary key(C_ID)
  6  );

Table created.

SQL> create table Student_Course_Information(
  2  S_ID number NOT NULL,
  3  C_ID number NOT NULL,
  4  FOREIGN KEY (S_ID) REFERENCES Student_Profile(S_ID),
  5  FOREIGN KEY (C_ID) REFERENCES Course(C_ID),
  6  UNIQUE (S_ID, C_ID)
  7  );

Table created.

insert into Department_Information values(1,'CSE');
insert into Department_Information values(2,'EEE');
insert into Department_Information values(3,'CEE');
insert into Department_Information values(4,'MPE');

insert into Student_Profile values(331,'AKIB',1,'23 FEB,1999','DHAKA','COMILLA','3.6','SWE','AB+','GOOD','WORST');
insert into Student_Profile values(201,'YEAKIN',1,'21 FEB,1999','DHAKA','BARISAL','4.6','SWE','B+','EXCELLENT','GOOD');
insert into Student_Profile values(101,'ABIR',2,'12 MARCH,1999','RANGPUR','COMILLA','6.6','ETC','AB+','BAD','WORST');
insert into Student_Profile values(111,'NIHAN',4,'2 FEB,2000','KHULNA','COXS BAZAR','5.6','IPE','O+','GOOD','WORST');
insert into Student_Profile values(121,'SAKIB',4,'2 FEB,2000','KHULNA','COXS BAZAR','5.6','SWE3rd_Semester','O+','GOOD','WORST');
insert into Student_Profile values(131,'NOOR',4,'2 FEB,2000','KHULNA','COXS BAZAR','5.6','SWE3rd_Semester','O+','GOOD','WORST');
insert into Student_Profile values(141,'MAHEEN',4,'2 FEB,2000','KHULNA','COXS BAZAR','5.6','SWE3rd_Semester','O+','GOOD','WORST');

insert into Course values(11,'DISCRETE MATHS','3.00');
insert into Course values(32,'FLUID MECHANICS','2.00');
insert into Course values(12,'DATA STRUCTURES','4.00');
insert into Course values(41,'SURVEY','3.00');
insert into Course values(13,'ALGORITHMS','3.00');
insert into Course values(21,'COMMUNICATION','3.00');
insert into Course values(22,'NETWORKING','3.00');

insert into Student_Course_Information values(331,11);
insert into Student_Course_Information values(331,12);
insert into Student_Course_Information values(101,21);
insert into Student_Course_Information values(111,32);



SQL> insert into Department_Information values(1,'CSE');

1 row created.

SQL> insert into Department_Information values(2,'EEE');

1 row created.

SQL> insert into Department_Information values(3,'CEE');

1 row created.

SQL> insert into Department_Information values(4,'MPE');

1 row created.

SQL> insert into Student_Profile values(331,'AKIB','CSE','23 FEB,1999','DHAKA','COMILLA','3.6','SWE','AB+','GOOD','WORST');
insert into Student_Profile values(331,'AKIB','CSE','23 FEB,1999','DHAKA','COMILLA','3.6','SWE','AB+','GOOD','WORST')
                                              *
ERROR at line 1:
ORA-01722: invalid number


SQL> insert into Student_Profile values(201,'YEAKIN','CSE','21 FEB,1999','DHAKA','BARISAL','4.6','SWE','B+','EXCELLENT','GOOD');
insert into Student_Profile values(201,'YEAKIN','CSE','21 FEB,1999','DHAKA','BARISAL','4.6','SWE','B+','EXCELLENT','GOOD')
                                                *
ERROR at line 1:
ORA-01722: invalid number


SQL> insert into Student_Profile values(101,'ABIR','EEE','12 MARCH,1999','RANGPUR','COMILLA','6.6','ETC','AB+','BAD','WORST');
insert into Student_Profile values(101,'ABIR','EEE','12 MARCH,1999','RANGPUR','COMILLA','6.6','ETC','AB+','BAD','WORST')
                                              *
ERROR at line 1:
ORA-01722: invalid number


SQL> insert into Student_Profile values(111,'NIHAN','MPE','2 FEB,2000','KHULNA','COXS BAZAR','5.6','IPE','O+','GOOD','WORST');insert into Student_Profile values(331,'AKIB',1,'23 FEB,1999','DHAKA','COMILLA','3.6','SWE','AB+','GOOD','WORST');
insert into Student_Profile values(111,'NIHAN','MPE','2 FEB,2000','KHULNA','COXS BAZAR','5.6','IPE','O+','GOOD','WORST');insert into Student_Profile values(331,'AKIB',1,'23 FEB,1999','DHAKA','COMILLA','3.6','SWE','AB+','GOOD','WORST')
                                                                                                                        *
ERROR at line 1:
ORA-00911: invalid character


SQL> insert into Student_Profile values(201,'YEAKIN',1,'21 FEB,1999','DHAKA','BARISAL','4.6','SWE','B+','EXCELLENT','GOOD');

1 row created.

SQL> insert into Student_Profile values(101,'ABIR',2,'12 MARCH,1999','RANGPUR','COMILLA','6.6','ETC','AB+','BAD','WORST');

1 row created.

SQL> insert into Student_Profile values(111,'NIHAN',4,'2 FEB,2000','KHULNA','COXS BAZAR','5.6','IPE','O+','GOOD','WORST');

1 row created.

SQL> insert into Course values(11,'DISCRETE MATHS');
insert into Course values(11,'DISCRETE MATHS')
            *
ERROR at line 1:
ORA-00947: not enough values


SQL> insert into Course values(32,'FLUID MECHANICS');
insert into Course values(32,'FLUID MECHANICS')
            *
ERROR at line 1:
ORA-00947: not enough values


SQL> insert into Course values(12,'DATA STRUCTURES');
insert into Course values(12,'DATA STRUCTURES')
            *
ERROR at line 1:
ORA-00947: not enough values


SQL> insert into Course values(41,'SURVEY');
insert into Course values(41,'SURVEY')
            *
ERROR at line 1:
ORA-00947: not enough values


SQL> insert into Course values(13,'ALGORITHMS');
insert into Course values(13,'ALGORITHMS')
            *
ERROR at line 1:
ORA-00947: not enough values


SQL> insert into Course values(21,'TELECOMMUNICATION');
insert into Course values(21,'TELECOMMUNICATION')
            *
ERROR at line 1:
ORA-00947: not enough values


SQL> insert into Course values(22,'NETWORKING');
insert into Course values(22,'NETWORKING')
            *
ERROR at line 1:
ORA-00947: not enough values


SQL> insert into Course values(11,'DISCRETE MATHS','3.00');

1 row created.

SQL> insert into Course values(32,'FLUID MECHANICS','2.00');

1 row created.

SQL> insert into Course values(12,'DATA STRUCTURES','4.00');

1 row created.

SQL> insert into Course values(41,'SURVEY','3.00');

1 row created.

SQL> insert into Course values(13,'ALGORITHMS','3.00');

1 row created.

SQL> insert into Course values(21,'TELECOMMUNICATION','3.00');
insert into Course values(21,'TELECOMMUNICATION','3.00')
                             *
ERROR at line 1:
ORA-12899: value too large for column "SYSTEM"."COURSE"."C_TITLE" (actual: 17,
maximum: 15)


SQL> insert into Course values(22,'NETWORKING','3.00');

1 row created.

SQL> insert into Course values(21,'COMMUNICATION','3.00');

1 row created.

SQL>
SQL> insert into Student_Course_Information values(331,11);
insert into Student_Course_Information values(331,11)
*
ERROR at line 1:
ORA-02291: integrity constraint (SYSTEM.SYS_C004302) violated - parent key not
found


SQL> insert into Student_Course_Information values(331,12);
insert into Student_Course_Information values(331,12)
*
ERROR at line 1:
ORA-02291: integrity constraint (SYSTEM.SYS_C004302) violated - parent key not
found


SQL> insert into Student_Course_Information values(101,21);

1 row created.

SQL> insert into Student_Course_Information values(111,32);

1 row created.



TASK-01 (Answer of the following questions)-->

Question No.3-->
 
SQL> select S_ID,S_Name,Program,Extracirricular_Status from Student_Profile where rownum <= 3 and Extracirricular_Status='GOOD' ;

      S_ID S_NAME          PROGRAM         EXTRACIRRICU
---------- --------------- --------------- ------------
       111 NIHAN           IPE             GOOD
       121 SAKIB           SWE3rd_Semester GOOD
       131 NOOR            SWE3rd_Semester GOOD

SQL> select S_ID,S_Name,Program,Anti_DisciplinaryStatus from Student_Profile where rownum <= 3 and Anti_DisciplinaryStatus ='WORST' ;

      S_ID S_NAME          PROGRAM         ANTI_DISCIPLINA
---------- --------------- --------------- ---------------
       101 ABIR            ETC             WORST
       111 NIHAN           IPE             WORST
       121 SAKIB           SWE3rd_Semester WORST








