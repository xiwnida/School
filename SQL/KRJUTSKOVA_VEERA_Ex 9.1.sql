USE sampleDB_JKTVR18

--���������� 9.1 �������� ������ ��� ����� ����������  �� ����� Julia  Long, ��������� ����� 11111. ��� ��� �� ��������� � �����-���� �����.
SELECT * FROM employee
INSERT INTO employee (emp_no, emp_fname, emp_1name)  VALUES(11111,'Emy','Hanes')

INSERT INTO employee (emp_no, emp_fname, emp_1name,dept_no)  VALUES(11111,'Emy','Hanes','d1')

--���������� 9.2 �������� ����� ������� emp_d1_d2 � ��������� � ��� �� ������� employee ���� �����������, ���������� � ������� d1, d2. �������� ��� ������, �� ������������ �������. (Create, Insert Into | Select Into)

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

--����������  9.3 �������� ����� ������� ��� �����������, ������� ���������� � ������ ��� ������ ��������� � 2007 �., � ��������� � ��� ���������������  ������ �� ������� employee.
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

--����������  9.4 �������� ��������� ���� ���������� (Manager) � ������� p1 �� ������� (Clerk).
SELECT * FROM works_on 
WHERE project_no='p1'

UPDATE  works_on 
SET job='Clerk'
WHERE project_no='p1' AND job='Manager'

--����������  9.5 ���������� ������ ��� ��������� �������� ��������  �������� p3 � p1 �� �������� NULL. 
SELECT * FROM project

UPDATE project
SET budget=0
WHERE project_no='p3' OR project_no='p1'

--����������  9.6 ��������  ���������  ����������  � ���������  �������  28559  �� ��������� (Manager) ��� ���� ��� ��������.
SELECT * FROM works_on 
WHERE emp_no='28559'

UPDATE  works_on 
SET job='Manager'
WHERE emp_no='28559'


--����������  9.7 �������� �� 10% ������ �������, �������� ��������  ����� ��������� ����� 10102.
SELECT * FROM project

UPDATE project
SET budget=budget*1.1
FROM project JOIN works_on ON works_on.project_no=project.project_no
WHERE emp_no='10102' 

--����������  9.8 ��������  ������������  ������, � ������� ��������  ��������� �� ������� James, �� �������� Sales.
SELECT * FROM department
SELECT * FROM employee WHERE emp_1name='James'

UPDATE department
SET dept_name='Sales'
FROM department JOIN employee
ON department.dept_no=employee.dept_no 
WHERE emp_1name='James'

--����������  9.9 �������� ���� ������ ������ ��� �������� ��� �����������, ������� �������� ��� �������� p1 � �������� � ������ Sales �� 12 ������� 2007 �.
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

--����������  9.10 ���������� ������ ���  �������� ���� �������, ������������� � ������ (Seattle).
SELECT * FROM department WHERE location='Seattle'

DELETE FROM department
 WHERE location='Seattle'

--����������  9.11 ���������� �������. ������ p3 ��������. ������� ��� ���������� �� ���� ������� �� ���� ������. 

SELECT * FROM project
SELECT * FROM works_on
s
DELETE FROM works_on
WHERE project_no='p3'

DELETE FROM project
WHERE project_no='p3'

--����������  9.12 ���������� ������. ������� ��� ���������� �� ������� works_on ��� ���� �����������,  ������� �������� � �������, ������������� � ������� (Dallas).
SELECT works_on.*, location
FROM works_on JOIN employee ON works_on.emp_no=employee.emp_no
JOIN department  ON employee.dept_no=department.dept_no
WHERE location='Dallas'

DELETE works_on
FROM works_on JOIN employee ON works_on.emp_no=employee.emp_no
JOIN department  ON employee.dept_no=department.dept_no
WHERE location='Dallas'















