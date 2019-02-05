USE sampleDB_JKTVR18

--6.11 ������������ ��� ������ �� �� ���������������. ���������� ���������� ������� � ������ ������
SELECT location, COUNT(*) AS quantity_dep
FROM department
GROUP BY location

--6.12  ��������� ������� ����� ������������� DISTINCT � GROUP BY.
--DISTINCT ������ ������� �������������, � GROUP BY ��������� ����� ���������� � ������������ ������ ���������

--6.13  ��� ����������� GROUP BY ������������ �������� NULL? ������� �� ��� ��������� ������� ��������� ���� ��������?
--������� � ��������� ������. �� �������, ��������, ���� ����� ������� COUNT �� ��������� �� �������� �������� NULL, � ������ ���������

--6.14  ��������� ������� ����� ����������� ��������� COUNT(*) � COUNT(column).
--COUNT(column) ������������ ���������� ������ �������� � �������. � COUNT(*) ������������ ���������� �����. ��� �����, ��� �� ���������� �������� NULL

--6.15  ��������� ������� ����������� ���������� ������ ����������.
SELECT * 
FROM employee
WHERE emp_no = 
		(SELECT MAX(emp_no)
		 FROM employee);

--6.16
--a. ������� ����������� �������� � ������ ������
SELECT dept_no, COUNT(dept_no) AS how_much_emp
FROM employee
GROUP BY dept_no
--b. ������� ����������� �������� ��� ������ ��������
SELECT project_no, COUNT(project_no) AS how_much_emp
FROM works_on
GROUP BY project_no
--c. ������� ����� �������� ������ �� �����������
SELECT emp_no, COUNT(*) AS how_much_ex
FROM works_on
GROUP BY emp_no

--6.17  ��������� ������� ����������, ���������� ������, ��� ����� ������������
SELECT job
FROM works_on
GROUP BY job
HAVING COUNT(job) > 2
