USE sampleDB_JKTVR18

-- 6.18a В каких отделах максимальное количество сотрудников
SELECT dept_no
FROM employee
GROUP BY dept_no
HAVING COUNT(dept_no) IN
				(SELECT TOP 1 COUNT(dept_no)
				FROM employee
				GROUP BY dept_no
				ORDER BY 1 DESC);

-- 6.18b В каких отделах минимальное количество сотрудников
SELECT dept_no
FROM employee
GROUP BY dept_no
HAVING COUNT(dept_no) IN
				(SELECT TOP 1 COUNT(dept_no)
				FROM employee
				GROUP BY dept_no
				ORDER BY 1);

-- 6.19 В каких городах находятся отделы с минимальным количеством сотрудниковSELECT DISTINCT location
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


-- 6.20 === Получите полную информацию о сотрудниках, чьи отделы расположены: a) в Сиэтле (Seattle) b) в Далласе (Dallas)
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


-- 6.21 Выполните выборку фамилий и имен сотрудников, которые приступили к работе над проектами: a) 4 января 2007г. b) в январе или феврале 2008г.
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

-- 6.22 Получите полную информацию о сотрудниках, которые или имели должность клерк (clerk), или работают в отделе d3.SELECT *FROM employeeWHERE dept_no = 'd3' OR	emp_no IN			(SELECT emp_no			FROM works_on			WHERE job = 'clerk');-- 6.23 Объясните, почему следующий запрос неправильный.--Из вложенного запроса придет несколько значений, а так как в операторе WHERE стоит =, будет ошибка-- 6.23аSELECT project_name
FROM project
WHERE project_no IN
			(SELECT project_no FROM works_on WHERE Job = 'Clerk')

--6.24b
--Получите название проекта, над которым работают люди с должностью клерк (clerk)