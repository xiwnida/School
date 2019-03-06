USE sampleDB_JKTVR18

--8.1 �������� ��������� ���������� ������ project � works_on, ��������: � ������������ ����������; � ��������� ������������.
SELECT project.*, works_on.*
FROM project JOIN works_on
	 ON project.project_no = works_on.project_no

SELECT project.*, works_on.*
FROM project CROSS JOIN works_on

--8.2  ������� ������� ���������� ���������� ��� ���������� � ������� n ������?
--���������� ������ -1

--8.3  ��������� ������� ���������� ������ ���������� � ��������� ��� ���� �����������, ���������� ��� �������� Gemini.
SELECT works_on.emp_no, works_on.job
FROM works_on JOIN project
	 ON works_on.project_no = project.project_no
WHERE project_name = 'Gemini'

--8.4  ��������� ������� ���� � ������� ���� �����������, ���������� � ������ Research ��� Accounting.
SELECT emp_fname, emp_1name
FROM employee JOIN department ON employee.dept_no = department.dept_no
WHERE dept_name = 'Research' OR dept_name = 'Accounting'

--8.5  ��������� ������� ���� ��� ������ ������ ��� ���� ������� (clerk), ���������� � ������ d1.
SELECT enter_date
FROM works_on JOIN employee ON works_on.emp_no = employee.emp_no
WHERE dept_no = 'd1' AND job = 'clerk'

--8.6  ��������� ������� ���� �������� (� ������ ����������� � ��������), ��� �������� �������� ���� ��� ������ ����������� � ���������� ����� (clerk).
SELECT *
FROM project
WHERE project_no IN (
		SELECT project_no
		FROM works_on
		WHERE job = 'clerk'
		GROUP BY project_no
		HAVING COUNT(*) > 1);

--8.7  ��������� ������� ���� � ������� �����������, ������� ����� ��������� �������� (manager) � �������� ��� �������� Mercury.
SELECT emp_fname, emp_1name
FROM employee JOIN works_on ON employee.emp_no = works_on.emp_no
	 JOIN project ON works_on.project_no = project.project_no
WHERE job = 'manager' AND project_name = 'Mercury'

--8.8  ��������� ������� ���� � ������� ���� �����������, ������� ������ �������� ��� �������� ������������, �� ������� ����, ��� � ����� ������ �����������.
SELECT emp_fname, emp_1name
FROM works_on w1 JOIN works_on w2 ON w1.enter_date = w2.enter_date
	 JOIN employee ON employee.emp_no = w1.emp_no
WHERE w1.emp_no <> w2.emp_no

--8.9  ��������� ������� ��������� ������� �����������, ������� ����� � ��� �� ������, ��� ��������� �� �����. (����������� ����������� ������� employee_ enh ���� ������ sample.)
SELECT emp_no
FROM employee_ehh JOIN department ON employee_ehh.dept_no = department.dept_no
WHERE location = domicile

--8.10  ��������� ������� ���� ����������� (� ������ �����������), ���������� � ������ ���������� Marketing �  ����������� � ���������� ������� Apollo. 
-- �������� ��� ������������ �������, ���������:

-- � �������� ����������;
SELECT employee.*
FROM works_on JOIN employee ON works_on.emp_no = employee.emp_no
	 JOIN project ON works_on.project_no = project.project_no
	 JOIN department ON employee.dept_no = department.dept_no
WHERE dept_name = 'Marketing' AND project_name = 'Apollo'

-- � ��������� ���������.
SELECT *
FROM employee
WHERE emp_no IN (
		SELECT emp_no
		FROM works_on
		WHERE project_no = (
				SELECT project_no
				FROM project
				WHERE project_name = 'Apollo')
		AND dept_no = (
				SELECT dept_no
				FROM department
				WHERE dept_name = 'Marketing'));