USE sampleDB_JKTVR18

--Упражнение 9.1 Вставьте данные для новой сотрудницы  по имени Julia  Long, табельный номер 11111. Она еще не назначена в какой-либо отдел.
SELECT * FROM employee
INSERT INTO employee (emp_no, emp_fname, emp_1name)  VALUES(11111,'Emy','Hanes')

INSERT INTO employee (emp_no, emp_fname, emp_1name,dept_no)  VALUES(11111,'Emy','Hanes','d1')

--Упражнение 9.2 Создайте новую таблицу emp_d1_d2 и загрузите в нее из таблицы employee всех сотрудников, работающих в отделах d1, d2. Создайте два разных, но равнозначных решения. (Create, Insert Into | Select Into)

CREATE TABLE emp_d1_d2
	(emp_no CHAR(20) NOT NULL,
	emp_fname CHAR(20) NOT NULL,
	emp_1name CHAR(20) NOT NULL,
	dept_no CHAR(20) NOT NULL);

INSERT INTO emp_d1_d2 (emp_no, emp_fname, emp_1name, dept_no)
SELECT * FROM employee
WHERE dept_no = 'd1' OR dept_no = 'd2'

select * from emp_d1_d2

SELECT emp_no, emp_fname, emp_1name, dept_no
INTO emp_d1_d2
FROM employee
WHERE dept_no='d2' or dept_no='d1'

--Упражнение  9.3 Создайте новую таблицу для сотрудников, которые приступили к работе над своими проектами в 2007 г., и загрузите в нее соответствующие  строки из таблицы employee.
CREATE TABLE emp_2007
	(emp_no CHAR(20) NOT NULL,
	emp_fname CHAR(20) NOT NULL,
	emp_1name CHAR(20) NOT NULL,
	dept_no CHAR(20) NOT NULL);

INSERT INTO emp_2007 (emp_no, emp_fname, emp_1name, dept_no)
SELECT * FROM employee
WHERE emp_no IN 
			(SELECT emp_no
			FROM works_on
			WHERE YEAR(enter_date) = '2007');

SELECT * FROM emp_2007

--Упражнение  9.4 Измените должности всех менеджеров (Manager) в проекте p1 на клерков (Clerk).
SELECT * FROM works_on 
WHERE project_no='p1'

UPDATE  works_on 
SET job='Clerk'
WHERE project_no='p1' AND job='Manager'

--Упражнение  9.5 Предложите запрос для изменения значения бюджетов  проектов p3 и p1 на значение NULL. 
SELECT * FROM project

UPDATE project
SET budget=0
WHERE project_no='p3' OR project_no='p1'

--Упражнение  9.6 Измените  должность  сотрудника  с табельным  номером  28559  на менеджера (Manager) для всех его проектов.
SELECT * FROM works_on 
WHERE emp_no='28559'

UPDATE  works_on 
SET job='Manager'
WHERE emp_no='28559'


--Упражнение  9.7 Повысьте на 10% бюджет проекта, менеджер которого  имеет табельный номер 10102.
SELECT * FROM project

UPDATE project
SET budget=budget*1.1
FROM project JOIN works_on ON works_on.project_no=project.project_no
WHERE emp_no='10102' 

--Упражнение  9.8 Измените  наименование  отдела, в котором работает  сотрудник по фамилии James, на название Sales.
SELECT * FROM department
SELECT * FROM employee WHERE emp_1name='James'

UPDATE department
SET dept_name='Sales'
FROM department JOIN employee
ON department.dept_no=employee.dept_no 
WHERE emp_1name='James'

--Упражнение  9.9 Измените дату начала работы над проектом для сотрудников, которые работают над проектом p1 и числятся в отделе Sales на 12 декабря 2007 г.
SELECT * FROM works_on 
WHERE project_no='p1'

SELECT * FROM department
WHERE dept_name='Sales'

SELECT * FROM employee

UPDATE works_on
SET enter_date='12.12.2007'
FROM works_on JOIN employee ON works_on.emp_no=employee.emp_no
JOIN department  ON employee.dept_no=department.dept_no
WHERE dept_name='Sales' AND project_no='p1'

--Упражнение  9.10 Предложите запрос для  удаления всех отделов, расположенные в Сиэтле (Seattle).
SELECT * FROM department WHERE location='Seattle'

DELETE FROM department
 WHERE location='Seattle'

--Упражнение  9.11 Предложите запросы. Проект p3 выполнен. Удалите всю информацию об этом проекте из базы данных. 

SELECT * FROM project
SELECT * FROM works_on
s
DELETE FROM works_on
WHERE project_no='p3'

DELETE FROM project
WHERE project_no='p3'

--Упражнение  9.12 Предложите запрос. Удалите всю информацию из таблицы works_on для всех сотрудников,  которые работают в отделах, расположенных в Далласе (Dallas).
SELECT works_on.*, location
FROM works_on JOIN employee ON works_on.emp_no=employee.emp_no
JOIN department  ON employee.dept_no=department.dept_no
WHERE location='Dallas'

DELETE works_on
FROM works_on JOIN employee ON works_on.emp_no=employee.emp_no
JOIN department  ON employee.dept_no=department.dept_no
WHERE location='Dallas'















