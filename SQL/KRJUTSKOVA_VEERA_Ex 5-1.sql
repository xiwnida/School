-- KRJUTSKOVA VEERA

USE sampleDB_JKTVR18

--5.1  ====  ��������� ������� ���� ����� �� ������� works_on.
SELECT *
FROM works_on

--5.2  ====  ��������� ������� ��������� ������� ���� ����������� � ���������� ����� (clerk).
SELECT emp_no, job
FROM works_on
WHERE job = 'clerk'

--5.3  ====  ��������� ������� ��������� ������� ���� �����������, ������� �������� ��� �������� p2 � ��� ��������� ����� ������, ��� 10 000
SELECT emp_no, project_no
FROM works_on
WHERE project_no = 'p2' AND emp_no < 10000

--5.4  ====  ��������� ������� ��������� ������� ���� �����������, ������� �� ���������� � ������ ��� �������� � 2007 �.
SELECT emp_no, enter_date
FROM works_on
WHERE enter_date NOT LIKE '2007%'

SELECT emp_no, enter_date
FROM works_on
WHERE enter_date NOT BETWEEN '2007/01/01' AND '2007/12/31'

--5.5  ====  ��������� ������� ��������� ������� ���� ����������� ������� p1 � �������� ����������� (�. �. �������� � analyst � �������� � manager).
SELECt emp_no, job
FROM works_on
WHERE job = 'analyst' OR job = 'manager'

--5.6  ====  ��������� ������� ���� ����������� ������� p2, ��� ��������� ��� �� ����������.
SELECT *
FROM works_on
WHERE project_no = 'p2' AND job IS NULL

--5.7  ====  ��������� ������� ��������� ������� � ������� �����������, ��� ����� �������� ��� ����� t
SELECT emp_fname, emp_1name
FROM employee
WHERE emp_fname LIKE '%tt%'

--5.8  ====  ��������� ������� ��������� ������� � ���� ���� �����������, � ������� ������ ����� ������� o ��� a (����� ����������) � ��������� ����� ������� es.
SELECT emp_no, emp_1name
FROM employee
WHERE emp_1name LIKE '_[ao]%es'

--5.9  ====  ��������� ������� ��������, ��� ������� ������ 100000 ��� ������ 300000 . 
SELECT *
FROM project
WHERE budget < 100000 OR budget > 300000

SELECT project_no, project_name, budget
FROM project
WHERE budget NOT BETWEEN 100000 AND 300000

--5.10  ====  ��������� ������� ������� � ���� �����������, � ������� �� � �������, �� � ����� �� ����������� �� ����� x �� ����� y
SELECT emp_fname
FROM employee
WHERE emp_fname LIKE '%[^xy]%' AND emp_1name LIKE '%[^xy]%' -- �� �������, ������ �� ��������, �� ���� ������

SELECT emp_fname, emp_1name
FROM employee
WHERE emp_fname NOT LIKE '%[xy]%' AND emp_1name NOT LIKE '%[xy]%'