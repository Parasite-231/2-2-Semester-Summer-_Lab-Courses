set serveroutput on;

create or replace function updateBalance(acc_id in int)
return number
is
month_difference number := 0;
update_current_balance number := 0;
last_date varchar2;
account_opening_date varchar2;
current_balance number:= 0;
grace_point number := 0;
begin
--query
select OpenDt into account_opening_date from Accounts where AccNo = acc_id;
select Current_Balance into current_balance from Accounts where AccNo = acc_id;
select lastDtIntgiven into last_date from Accounts where AccNo = account_id;

select months_between(To_date(last_date,'DD-MM-YYYY'),To_date()) into month_difference as 'month_difference' from dual;
if month_difference >= 1 and month_difference < 3 then
	grace_point := 1;
elsif month_difference >= 3 and month_difference <= 6 then
	grace_point := 2 ;
endif;

if grace_point = 1 then
		update_current_balance := current_balance + current_balance * interest_rate/100;
elsif grace_point = 2 then
		update_current_balance := current_balance + current_balance * interest_rate/100;
endif;
return update_balance;
end;
/

begin
dbms_output.put_line('Status of Account after update:'||updateBalance(2836));
end;
/