-- KRJUTSKOVA VEERA

USE sampleDB_JKTVR18

--5.1  ====  Выполните выборку всех строк из таблицы works_on.
SELECT *
FROM works_on

--5.2  ====  Выполните выборку табельных номеров всех сотрудников с должностью клерк (clerk).
SELECT emp_no, job
FROM works_on
WHERE job = 'clerk'

--5.3  ====  Выполните выборку табельных номеров всех сотрудников, которые работают над проектом p2 и чей табельный номер меньше, чем 10 000
SELECT emp_no, project_no
FROM works_on
WHERE project_no = 'p2' AND emp_no < 10000

--5.4  ====  Выполните выборку табельных номеров всех сотрудников, которые не приступили к работе над проектом в 2007 г.
SELECT emp_no, enter_date
FROM works_on
WHERE enter_date NOT LIKE '2007%'

SELECT emp_no, enter_date
FROM works_on
WHERE enter_date NOT BETWEEN '2007/01/01' AND '2007/12/31'

--5.5  ====  Выполните выборку табельных номеров всех сотрудников проекта p1 с ведущими должностями (т. е. аналитик — analyst и менеджер — manager).
SELECt emp_no, job
FROM works_on
WHERE job = 'analyst' OR job = 'manager'

--5.6  ====  Выполните выборку всех сотрудников проекта p2, чья должность еще не определена.
SELECT *
FROM works_on
WHERE project_no = 'p2' AND job IS NULL

--5.7  ====  Выполните выборку табельных номеров и фамилий сотрудников, чьи имена содержат две буквы t
SELECT emp_fname, emp_1name
FROM employee
WHERE emp_fname LIKE '%tt%'

--5.8  ====  Выполните выборку табельных номеров и имен всех сотрудников, у которых вторая буква фамилии o или a (буквы английские) и последние буквы фамилии es.
SELECT emp_no, emp_1name
FROM employee
WHERE emp_1name LIKE '_[ao]%es'

--5.9  ====  Выполните выборку проектов, чьи бюджеты меньше 100000 или больше 300000 . 
SELECT *
FROM project
WHERE budget < 100000 OR budget > 300000

SELECT project_no, project_name, budget
FROM project
WHERE budget NOT BETWEEN 100000 AND 300000

--5.10  ====  Выполните выборку фамилий и имен сотрудников, у которых ни в фамилии, ни в имени не встречается ни буква x ни буква y
SELECT emp_fname
FROM employee
WHERE emp_fname LIKE '%[^xy]%' AND emp_1name LIKE '%[^xy]%' -- не понимаю, почему не работает, по идее должно

SELECT emp_fname, emp_1name
FROM employee
WHERE emp_fname NOT LIKE '%[xy]%' AND emp_1name NOT LIKE '%[xy]%'