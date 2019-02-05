USE sampleDB_JKTVR18

--6.11 Сгруппируйте все отделы по их местонахождению. Определите количество отделов в каждом городе
SELECT location, COUNT(*) AS quantity_dep
FROM department
GROUP BY location

--6.12  Объясните разницу между предложениями DISTINCT и GROUP BY.
--DISTINCT Просто убирает повторяющиеся, а GROUP BY позволяет вести статистику и использовать разные источники

--6.13  Как предложение GROUP BY обрабатывает значения NULL? Подобна ли эта обработка обычной обработке этих значений?
--Выносит в отдельную строку. По разному, например, одна форма функции COUNT не принимает во внимание значения NULL, а другая принимает

--6.14  Объясните разницу между агрегатными функциями COUNT(*) и COUNT(column).
--COUNT(column) подсчитывает количество разных значений в колонке. А COUNT(*) подсчитывает количество строк. Тем самым, она не игнорирует значение NULL

--6.15  Выполните выборку наибольшего табельного номера сотрудника.
SELECT * 
FROM employee
WHERE emp_no = 
		(SELECT MAX(emp_no)
		 FROM employee);

--6.16
--a. Сколько сотрудников работает в каждом отделе
SELECT dept_no, COUNT(dept_no) AS how_much_emp
FROM employee
GROUP BY dept_no
--b. Сколько сотрудников работает над каждым проектом
SELECT project_no, COUNT(project_no) AS how_much_emp
FROM works_on
GROUP BY project_no
--c. Сколько задач выполнил каждый из сотрудников
SELECT emp_no, COUNT(*) AS how_much_ex
FROM works_on
GROUP BY emp_no

--6.17  Выполните выборку должностей, занимаемых больше, чем двумя сотрудниками
SELECT job
FROM works_on
GROUP BY job
HAVING COUNT(job) > 2
