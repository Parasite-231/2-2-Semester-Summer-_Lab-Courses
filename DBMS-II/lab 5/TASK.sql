create user muktadir identified by pass123;
grant create session, resource to muktadir;
grant unlimited tablespace to muktadir;

drop table AccountProperties;
drop table Accounts;
drop table ProfitAmounts;

create table AccountProperties(
ID number primary key,
Name varchar2(20),
iRate number,
GP number
);

create table Accounts(
ID number primary key,
Name varchar2(20),
AccCode number,
Balance number,
LastDateInterest date,
FOREIGN KEY (AccCode) REFERENCES AccountProperties(ID)
);

create table ProfitAmounts(
AccNo number primary key,
PrincipalAmount number,
ProfitAmount number,
dt date
);

--Output

SQL> create table AccountProperties(
  2  ID number primary key,
  3  Name varchar2(20),
  4  iRate number,
  5  GP number
  6  );

Table created.



SQL>
SQL> create table Accounts(
  2  ID number primary key,
  3  Name varchar2(20),
  4  AccCode number,
  5  Balance number,
  6  LastDateInterest date,
  7  FOREIGN KEY (AccCode) REFERENCES AccountProperties(ID)
  8  );

Table created.

SQL>
SQL> create table ProfitAmounts(
  2  AccNo number primary key,
  3  PrincipalAmount number,
  4  ProfitAmount number,
  5  dt date
  6  );

Table created.


insert into AccountProperties values(1,'Savings1',0.08,3);
insert into AccountProperties values(2,'Savings2',0.09,4);
insert into AccountProperties values(3,'Savings3',0.04,5);
insert into AccountProperties values(4,'Salary1',0.05,1);
insert into AccountProperties values(5,'Salary2',0.06,2);
insert into AccountProperties values(6,'Current1',0.02,4);
insert into AccountProperties values(7,'Current2',0.03,5);


insert into Accounts values (1,'John',5,20000,DATE '2021-11-28');
insert into Accounts values (2,'Smith',1,40000,DATE '2021-08-02');
insert into Accounts values (3,'Black',6,35000,DATE '2021-06-23');
insert into Accounts values (4,'Margot',4,60000,DATE '2021-12-20');
insert into Accounts values (5,'Alex',3,80000,DATE '2021-11-15');

insert into ProfitAmounts values();

--changed data
delete from Accounts where id in (1,2,3,4,5);

Task-01->

set serveroutput on;
create or replace function calculateProfit(AccNo in number)
return number
is
Acc_id number;
profit number := 0;
irate number := 0;
Acc_code number ;
L_date date;
month_duration number;
Grace_Period number;
current_balance number;
begin
--query

select Id,AccCode,Balance,LastDateInterest into Acc_id,Acc_code,current_balance,L_date from accounts where ID = AccNo;

select months_between(sysdate,L_date) as "Months" into month_duration from dual;


if month_duration < 1 then
	Grace_Period := 1;
elsif month_duration >= 1 and month_duration < 4  then
	Grace_Period :=2;
elsif month_duration >= 4 and month_duration < 6 then
	Grace_Period := 3;
elsif month_duration >= 6 and month_duration < 12 then
	Grace_Period := 4;
elsif month_duration >= 12 then
	Grace_Period := 5;
end if;

select iRate into irate from AccountProperties where ID = Acc_code and GP = Grace_Period;
profit := current_balance * irate ;
return profit;
end;
/

begin
dbms_output.put_line('Calculated Profit: '||calculateProfit(2));
end;
/

--output
SQL> set serveroutput on;
SQL> create or replace function calculateProfit(AccNo in number)
  2  return number
  3  is
  4  Acc_id number;
  5  profit number := 0;
  6  irate number := 0;
  7  Acc_code number ;
  8  L_date date;
  9  month_duration number;
 10  Grace_Period number;
 11  current_balance number;
 12  begin
 13  --query
 14
 15  select Id,AccCode,Balance,LastDateInterest into Acc_id,Acc_code,current_balance,L_date from accounts where ID = AccNo;
 16
 17  select months_between(sysdate,L_date) as "Months" into month_duration from dual;
 18
 19
 20  if month_duration < 1 then
 21  Grace_Period := 1;
 22  elsif month_duration >= 1 and month_duration < 4  then
 23  Grace_Period :=2;
 24  elsif month_duration >= 4 and month_duration < 6 then
 25  Grace_Period := 3;
 26  elsif month_duration >= 6 and month_duration < 12 then
 27  Grace_Period := 4;
 28  elsif month_duration >= 12 then
 29  Grace_Period := 5;
 30  end if;
 31
 32  select iRate into irate from AccountProperties where ID = Acc_code and GP = Grace_Period;
 33  profit := current_balance * irate ;
 34  return profit;
 35  end;
 36  /

Function created.

SQL>
SQL> begin
  2  dbms_output.put_line('Calculated Profit: '||calculateProfit(2));
  3  end;
  4  /
Calculated Profit: 3200

PL/SQL procedure successfully completed.







