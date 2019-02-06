USE sampleDB_JKTVR18

-- 6.18a � ����� ������� ������������ ���������� �����������
SELECT dept_no
FROM employee
GROUP BY dept_no
HAVING COUNT(dept_no) IN
				(SELECT TOP 1 COUNT(dept_no)
				FROM employee
				GROUP BY dept_no
				ORDER BY 1 DESC);

-- 6.18b � ����� ������� ����������� ���������� �����������
SELECT dept_no
FROM employee
GROUP BY dept_no
HAVING COUNT(dept_no) IN
				(SELECT TOP 1 COUNT(dept_no)
				FROM employee
				GROUP BY dept_no
				ORDER BY 1);

-- 6.19 � ����� ������� ��������� ������ � ����������� ����������� �����������SELECT DISTINCT location
FROM department
WHERE dept_no IN
			(SELECT dept_no
			FROM employee
			GROUP BY dept_no
			HAVING COUNT(dept_no) IN
						(SELECT TOP 1 COUNT(dept_no)
						FROM employee
						GROUP BY dept_no
						ORDER BY 1));


-- 6.20 === �������� ������ ���������� � �����������, ��� ������ �����������: a) � ������ (Seattle) b) � ������� (Dallas)
SELECT *
FROM employee
WHERE dept_no IN
			(SELECT dept_no
			FROM department
			WHERE location = 'Seattle');

SELECT *
FROM employee
WHERE dept_no IN
			(SELECT dept_no
			FROM department
			WHERE location = 'Dallas');


-- 6.21 ��������� ������� ������� � ���� �����������, ������� ���������� � ������ ��� ���������: a) 4 ������ 2007�. b) � ������ ��� ������� 2008�.
SELECT emp_fname, emp_1name
FROM employee
WHERE emp_no IN
			(SELECT emp_no 
			FROM works_on
			WHERE enter_date = '2007/01/04');

SELECT emp_fname, emp_1name
FROM employee
WHERE emp_no IN
			(SELECT emp_no 
			FROM works_on
			WHERE YEAR(enter_date) = 2008 AND (MONTH(enter_date) = 1 OR MONTH(enter_date) = 2));

-- 6.22 �������� ������ ���������� � �����������, ������� ��� ����� ��������� ����� (clerk), ��� �������� � ������ d3.SELECT *FROM employeeWHERE dept_no = 'd3' OR	emp_no IN			(SELECT emp_no			FROM works_on			WHERE job = 'clerk');-- 6.23 ���������, ������ ��������� ������ ������������.--�� ���������� ������� ������ ��������� ��������, � ��� ��� � ��������� WHERE ����� =, ����� ������-- 6.23�SELECT project_name
FROM project
WHERE project_no IN
			(SELECT project_no FROM works_on WHERE Job = 'Clerk')

--6.24b
--�������� �������� �������, ��� ������� �������� ���� � ���������� ����� (clerk)