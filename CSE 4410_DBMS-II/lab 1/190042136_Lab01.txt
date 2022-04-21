create user mdmuktadir36 identified by pass36;
grant create session, resource to mdmuktadir36;
grant unlimited tablespace to mdmuktadir36;

task-01->


create tablespace myspace1 datafile 'myspace1_datafile.dbf' size 10m;

alter user mdmuktadir36 default tablespace myspace1; 
alter user mdmuktadir36 quota unlimited on myspace1;


create table t1(
id int ,
c1 varchar(25)
);

create table t2(
id int ,
c2 varchar(25)
);

create table t3(
id int ,
c3 varchar(25)
);

create tablespace myspace2 datafile 'myspace2_datafile.dbf' size 40m;
create table t4(
id int ,
c4 varchar(25)
)tablespace myspace2;

grant all privileges to mdmuktadir36;

TASK - 02-->

create table Citizen(
NID number,
name varchar2(20),
Date_of_Birth varchar2(20),
street varchar2(20),
city varchar2(20),
postal_code varchar2(20),
district varchar2(20),
Height varchar2(20),
photograph varchar2(20),
scanned_copy_of_signature varchar2(20),
salary number,
blood_group varchar2(20),
occupation_type number,
constraint pk_citizen primary key (NID),
constraint fk_citizen foreign key(occupation_type) references occupation(occupation_id)
);

create table occupation(
occupation_id number,
Name_of_occupation varchar2(20),
Status varchar2(20),
constraint pk_occupation primary key(occupation_id)
);

insert into occupation values(1,'Service','Officer');
insert into occupation values(2,'Engineer','Manager');
insert into occupation values(3,'Web-Developer','3rd-Category');
insert into occupation values(4,'Retired','None');
insert into occupation values(5,'Civil','Sub-Assistant');
insert into occupation values(6,'Teacher','Proffessor');


insert into Citizen values(122,'Muktadir','22 August 2001','RN','PM','455','Rangpur','6','i','muktadir',7700,'AB+',1);
insert into Citizen values(123,'Sanu','23 August 2004','RO','PO','405','Dhaka','7','i','sanu',800,'B+',2);
insert into Citizen values(722,'Timur','42 July 2001','N','M','885','Bogra','5','i','timur',700,'A+',3);
insert into Citizen values(562,'Sarwar','22 August 1999','R','P','705','Chittagong','6','i','sarwar',600,'O-',4);
insert into Citizen values(344,'Ifty','22 August 1899','R','P','543','Chittagong','6','i','ifty',60000,'O-',6);
insert into Citizen values(777,'Suivan','22 August 1998','R','P','234','Khulna','5.5','i','suivan',50000,'AB+',6);


SQL> select name, Date_of_Birth from Citizen where occupation_type = 6;

NAME                 DATE_OF_BIRTH
-------------------- --------------------
Suivan               22 August 1998
Ifty                 22 August 1899


SQL> select occupation_type from Citizen where rownum<= 5 order by salary desc;

OCCUPATION_TYPE
---------------
              6
              1
              2
              3
              4


SQL> select name,Date_of_Birth,salary as monthly_salary from Citizen where District = 'Dhaka' or District = 'Khulna';

NAME                 DATE_OF_BIRTH        MONTHLY_SALARY
-------------------- -------------------- --------------
Sanu                 23 August 2004                  800
Suivan               22 August 1998                50000


task - 03-->

Difference between Left and Right Join-->
The main difference between these joins is the inclusion of non-matched rows. The LEFT JOIN includes all records from the left side 
and matched rows from the right table, whereas RIGHT JOIN returns all rows from the right side and unmatched rows from the left table.
Example--

LEFT JOIN -->

SQL> select * from Citizen left outer join occupation on Citizen.occupation_type = occupation.occupation_id ;

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             6 Teacher
Proffessor


6 rows selected.


RIGHT JOIN -->

SQL> select * from Citizen right outer join occupation on Citizen.occupation_type = occupation.occupation_id ;

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------




       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
                                                 5 Civil
Sub-Assistant


7 rows selected.


Here, Natural Join creates the repeatation of datas. Example--

SQL> select * from Citizen natural join occupation;

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             5 Civil
Sub-Assistant


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       122 Muktadir             22 August 2001       RN
PM                   455                  Rangpur
6                    i                    muktadir                   7700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                1             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             5 Civil
Sub-Assistant


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       123 Sanu                 23 August 2004       RO
PO                   405                  Dhaka
7                    i                    sanu                        800

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
B+                                 2             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             5 Civil
Sub-Assistant


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       722 Timur                42 July 2001         N
M                    885                  Bogra
5                    i                    timur                       700

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
A+                                 3             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             5 Civil
Sub-Assistant


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       562 Sarwar               22 August 1999       R
P                    705                  Chittagong
6                    i                    sarwar                      600

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 4             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             5 Civil
Sub-Assistant


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       777 Suivan               22 August 1998       R
P                    234                  Khulna
5.5                  i                    suivan                    50000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
AB+                                6             6 Teacher
Proffessor


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             1 Service
Officer


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             2 Engineer
Manager


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             3 Web-Developer
3rd-Category


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             4 Retired
None


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             5 Civil
Sub-Assistant


       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
       344 Ifty                 22 August 1899       R
P                    543                  Chittagong
6                    i                    ifty                      60000

       NID NAME                 DATE_OF_BIRTH        STREET
---------- -------------------- -------------------- --------------------
CITY                 POSTAL_CODE          DISTRICT
-------------------- -------------------- --------------------
HEIGHT               PHOTOGRAPH           SCANNED_COPY_OF_SIGN     SALARY
-------------------- -------------------- -------------------- ----------
BLOOD_GROUP          OCCUPATION_TYPE OCCUPATION_ID NAME_OF_OCCUPATION
-------------------- --------------- ------------- --------------------
STATUS
--------------------
O-                                 6             6 Teacher
Proffessor


36 rows selected.











