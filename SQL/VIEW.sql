use sampleDB_JKTVR18 

create view v_count 
as 
select project_no, count(*) as count_pro 
from works_on 
group by project_no; 
go 

select * from v_count 
create view v_count_p3 
as select * from v_count 
where project_no = 'p3' 
select * from v_project_name 
drop view v_count 

select * from department 
create view v_dep 
as 
select dept_no, dept_name 
from department 
where dept_no in('d1','d2','d3') 
go 
insert v_dep (dept_no, dept_Name) values ('d5','Develop') 
select * from v_dep 


create view v_dep_check 
as 
select dept_no, dept_Name 
from department 
where dept_no in ('d1','d2','d3') 
with check option 
go 
insert v_dep_check (dept_no,dept_name) values 
('d7','HITO') 
use WholeSale_2016 
select * from Orders
