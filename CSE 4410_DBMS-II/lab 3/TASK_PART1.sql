SQL> create user muktadir identified by pass36;

User created.

SQL> grant create session, resource to muktadir;

Grant succeeded.

SQL> grant unlimited tablespace to muktadir;

Grant succeeded.

TASK-A--->

create table ACC_TYPE(
ID int,
Name varchar2(15),
IRate float,
GraceP number,
constraint pk_ACC_TYPE primary key(ID)
);

create table Customers(
ID number,
Name varchar2(15),
DOB date,
Address varchar2(15),
constraint pk_Customers primary key(ID)
);

create table Accounts(
AccNo number,
CID number,
Acc_type int,
OpenDt date,
Current_Balance number,
LastDtIntgiven date,
constraint pk_Accounts primary key(AccNo),
constraint fk_Accounts foreign key(Acc_type) references ACC_TYPE(ID)
);

create table Transactions(
Dt date,
AccNo number,
CID number,
Tp varchar2(15),
Amount number,
constraint Transactions primary key(Dt),
constraint fk_Transactions foreign key(AccNo) references Accounts(AccNo)
);

SQL> create table ACC_TYPE(
  2  ID int,
  3  Name varchar2(15),
  4  IRate float,
  5  GraceP number,
  6  constraint pk_ACC_TYPE primary key(ID)
  7  );

Table created.

SQL> create table Customers(
  2  ID number,
  3  Name varchar2(15),
  4  DOB date,
  5  Address varchar2(15),
  6  constraint pk_Customers primary key(ID)
  7  );

Table created.

SQL> create table Accounts(
  2  AccNo number,
  3  CID number,
  4  Acc_type int,
  5  OpenDt date,
  6  Current_Balance number,
  7  LastDtIntgiven date,
  8  constraint pk_Accounts primary key(AccNo),
  9  constraint fk_Accounts foreign key(Acc_type) references ACC_TYPE(ID)
 10  );

Table created.

SQL> create table Transactions(
  2  Dt date,
  3  AccNo number,
  4  CID number,
  5  Tp varchar2(15),
  6  Amount number,
  7  constraint Transactions primary key(Dt),
  8  constraint fk_Transactions foreign key(AccNo) references Accounts(AccNo)
  9  );

Table created.


set serveroutput on;
create or replace function Account(CustomerID number)
return number
is
customer_balance number := 0;
begin 
select sum(Current_Balance) into customer_balance from Accounts where Accounts.CID = CustomerID;
if customer_balance > 100000 then 
	dbms_output.put_line('VIP');
elsif customer_balance < 4000 and customer_balance < 100000 then
	dbms_output.put_line('IMPORTANT');
else 
	dbms_output.put_line('ORDINARY');
end if;
return customer_balance;

end;
/

begin
dbms_output.put_line(Account(190042136));
end;
/






ERRORS-->
SQL> set serveroutput on;
SQL> create or replace function Account(CustomerID number)
  2  return number
  3  is
  4  balance number := 0;
  5  begin
  6  select sum(Balance) into customer_balance from Accounts where Accounts.CID = CustomerID;
  7  if balance > 100000 then
  8  dbms_output.put_line('VIP');
  9  elsif balance < 4000 and customer_balance < 100000 then
 10  dbms_output.put_line('IMPORTANT');
 11  else
 12  dbms_output.put_line('ORDINARY');
 13  end if;
 14  return balance;
 15
 16  end;
 17  /

Warning: Function created with compilation errors.

SQL> set serveroutput on;
SQL> create or replace function Account(CustomerID number)
  2  return number
  3  is
  4  balance number := 0;
  5  begin
  6  select sum(Current_Balance) into balance from Accounts where Accounts.CID = CustomerID;
  7  if balance > 100000 then
  8  dbms_output.put_line('VIP');
  9  elsif balance < 4000 and customer_balance < 100000 then
 10  dbms_output.put_line('IMPORTANT');
 11  else
 12  dbms_output.put_line('ORDINARY');
 13  end if;
 14  return balance;
 15
 16  end;
 17  /

Warning: Function created with compilation errors.




set serveroutput on;
create or replace function Account(CustomerID number)
return number
is
balance number := 0;
begin 
select sum(Current_Balance) into balance from Accounts where Accounts.CID = CustomerID;
if balance > 100000 then 
	dbms_output.put_line('VIP');
elsif balance < 4000 and balance < 100000 then
	dbms_output.put_line('IMPORTANT');
else 
	dbms_output.put_line('ORDINARY');
end if;
return balance;

end;
/

begin
dbms_output.put_line(Account(190042136));
end;
/

CORRECTED-->
SQL> set serveroutput on;
SQL> create or replace function Account(CustomerID number)
  2  return number
  3  is
  4  balance number := 0;
  5  begin
  6  select sum(Current_Balance) into balance from Accounts where Accounts.CID = CustomerID;
  7  if balance > 100000 then
  8  dbms_output.put_line('VIP');
  9  elsif balance < 4000 and balance < 100000 then
 10  dbms_output.put_line('IMPORTANT');
 11  else
 12  dbms_output.put_line('ORDINARY');
 13  end if;
 14  return balance;
 15
 16  end;
 17  /

Function created.

SQL> begin
  2  dbms_output.put_line(Account(190042136));
  3  end;
  4  /
ORDINARY

PL/SQL procedure successfully completed.



