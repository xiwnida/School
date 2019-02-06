USE sampleDB_JKTVR18;

SELECT * 
FROM department;

--25.01.2019--

SELECT dept_no, dept_name
FROM department

SELECT DISTINCT location
FROM department

SELECT TOP 1 *
FROM department

--====================
SELECT * FROM employee
SELECT * FROM works_on

SELECT *
FROM department
WHERE location = 'Dallas'

SELECT *
FROM employee
WHERE emp_no > 25000

SELECT *
FROM works_on
WHERE enter_date = '10/15/2007'

SELECT emp_no, project_no, enter_date --, YEAR(enter_date) AS year
FROM works_on
WHERE YEAR(enter_date) = 2007

SELECT emp_no, emp_fname, emp_1name
FROM employee
WHERE emp_no = 25348 AND emp_1name = 'Smith' OR emp_fname = 'Matthew' AND dept_no = 'd1';

SELECT emp_no, emp_fname, emp_1name
FROM employee
WHERE ((emp_no = 25348 AND emp_1name = 'Smith') OR emp_fname = 'Matthew') AND dept_no = 'd1';

SELECT emp_no, emp_fname, emp_1name
FROM employee
WHERE NOT dept_no = 'd2';

SELECT emp_no, emp_1name, emp_fname
FROM employee
WHERE emp_no IN (29346, 28559, 25348);

SELECT emp_no, emp_1name, emp_fname
FROM employee
WHERE emp_no NOT IN (10102, 9031);

SELECT project_name, budget
FROM project
WHERE budget BETWEEN 95000 AND 120000

-- IS NULL

SELECT *
FROM works_on
WHERE project_no = 'p2' AND job IS NULL

SELECT emp_no, ISNULL(job, 'Job unknow') AS task
FROM works_on;

--================

--LIKE
SELECT *
FROM employee
WHERE emp_1name LIKE 'j%';

SELECT *
FROM department
WHERE location LIKE '[C-F]%';

SELECT *
FROM works_on
WHERE enter_date LIKE '2007%'

SELECT *
FROM works_on
WHERE enter_date LIKE '%[0][1-3]'

SELECT *
FROM works_on
WHERE enter_date LIKE '%[^0][0-9]'

-- =================== 28/01/2019
------------------------


SELECT *
FROM project
WHERE project_name LIKE '%[_]%'

SELECT *
FROM project
WHERE project_name LIKE '%!_%' ESCAPE '!'


--==========GROUP BY=============

SELECT * FROM works_on

SELECT job FROM works_on
GROUP BY job

SELECT SUM(budget) AS sum_budget
FROM project

SELECT * 
FROM employee
WHERE emp_no = 
		(SELECT MIN(emp_no)
		 FROM employee);

SELECT *
FROM employee
WHERE emp_no = 
	(SELECT emp_no --, *
	 FROM works_on
	 WHERE enter_date = 
		(SELECT MAX(enter_date)
		 FROM works_on
		 WHERE job = 'Manager'));

SELECT project_no, COUNT(DISTINCT job) AS job_count
FROM works_on
GROUP BY project_no;

SELECT job, COUNT(*) AS count_job
FROM works_on
GROUP BY (job);

SELECT project_no, COUNT(*)
FROM works_on
GROUP BY (project_no)
HAVING COUNT(*) < 4



SELECT *
FROM employee

SELECT *
FROM employee
WHERE dept_no IN
			(SELECT dept_no
			FROM department
			WHERE location = 'Dallas');

SELECT * FROM employee
WHERE emp_no IN
			(SELECT emp_no FROM works_on
			WHERE project_no = 
						(SELECT project_no FROM project
						WHERE project_name = 'Gemini'))


SELECT emp_no, project_no, job
FROM works_on
WHERE enter_date > ANY
				(SELECT enter_date
				FROM works_on);

SELECT* FROM works_on
WHERE enter_date > ANY
			(SELECT enter_date FROM works_on
			WHERE YEAR(enter_date) > 2006);


--ALL
SELECT * FROM works_on
WHERE project_no != ALL
			(SELECT project_no FROM project);


SELECT emp_1name
FROM employee
WHERE 'p3' IN
		(SELECT project_no
		FROM works_on
		WHERE works_on.emp_no = employee.emp_no);