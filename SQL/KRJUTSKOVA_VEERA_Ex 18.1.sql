USE MASTER 

CREATE DATABASE Test_project 
	ON (Name=test_dat, 
		FILENAME = 'D:\JKTVR18Krjutskova\SQL\Testproject\Test.mdf', 
		SIZE = 5, 
		MAXSIZE = 100, 
		FILEGROWTH = 5) 
	LOG ON( 
		NAME = Test_log, 
		FILENAME = 'D:\JKTVR18Krjutskova\SQL\Testproject\Test.ldf', 
		SIZE = 10, 
		MAXSIZE = 100, 
		FILEGROWTH = 10)




USE Test_project

CREATE TABLE Job( 
	ID_job INT PRIMARY KEY, 
	Name_job NVARCHAR(50), 
	SalaryPerHour MONEY 
	) 

CREATE TABLE Employees( 
	ID_emp INT PRIMARY KEY, 
	Name_emp NVARCHAR(50), 
	ID_job INT 
	)

CREATE TABLE Project( 
	ID_proj INT PRIMARY KEY, 
	Name_proj NVARCHAR(50)
	) 

CREATE TABLE Works( 
	ID_emp INT, 
	ID_proj INT,
	Hour_worked FLOAT, 
	Data date NOT NULL CONSTRAINT DF_Employees_HireDate DEFAULT SYSDATETIME(), 
	CONSTRAINT PK_EmpProj PRIMARY KEY (ID_emp, ID_proj), 
	CONSTRAINT FK_IDProj FOREIGN KEY(ID_proj) REFERENCES Project(ID_proj), 
	CONSTRAINT FK_IDEmp FOREIGN KEY(ID_emp) REFERENCES Employees(ID_emp) 
	) 

ALTER TABLE Employees ADD CONSTRAINT FK_job FOREIGN KEY (ID_job) REFERENCES Job(ID_job) 

-- Данные
INSERT INTO Job VALUES 
	(1, 'Database Designer','105.00'), 
	(2, 'System Analist','32.40'), 
	(3, 'General Support','18.36'), 
	(4, 'DSS support','45.95') 


INSERT INTO Project VALUES 
	(1, 'Evergreen'), 
	(2, 'Amber Wave'), 
	(3, 'Rolling Tide'), 
	(4, 'Starflight') 


INSERT INTO Employees VALUES 
	(103,'June E.Aug', 3), 
	(101,'John G. News', 2), 
	(105,'Alice K.Johnson', 1), 
	(107,'Maria D. Alonzo', 4), 
	(112,'Darine M. Smith', 2), 
	(106,'Wolliam Smithfield', 4) 


INSERT INTO works(ID_emp, ID_proj, Hour_worked) VALUES 
	(103, 1, 32.5),
	(105, 3, 20.4), 
	(101, 4, 43.1), 
	(105, 1, 10.6),
	(107, 2, 32.5), 
	(112, 2, 27.3), 
	(106, 1, 49.9)

SELECT * FROM Employees 
SELECT * FROM Project 
SELECT * FROM Works
SELECT * FROM Job



--3.1. Какая сумма была выплачена за каждый проект, сколько сотрудников работало в каждом проекте, сколько часов было затрачено
SELECT p.Name_proj, SUM(Hour_worked*j.SalaryPerHour) AS MoneySpend, COUNT(w.ID_emp) AS EmployeeWorked, Sum(w.Hour_worked) AS TimeSpend
FROM Employees E JOIN Job J ON E.ID_job = J.ID_job
	 JOIN Works W ON W.ID_emp = E.ID_emp
	 JOIN Project P ON P.ID_proj = W.ID_proj
GROUP BY P.Name_proj

--3.2. В каких проектах участвовал каждый из сотрудников, какую сумму получил в каждом проекте\
SELECT E.Name_emp, W.ID_proj, W.Hour_worked*j.SalaryPerHour AS SalarySumm 
FROM Employees E JOIN Job J ON E.ID_job = J.ID_job
	 JOIN Works W ON W.ID_emp = E.ID_emp
ORDER BY 1

--3.3. Какую итоговую сумму получил каждый сотрудникSELECT E.Name_emp, SUM(W.Hour_worked*j.SalaryPerHour) AS SalarySumm 
FROM Employees E JOIN Job J ON E.ID_job = J.ID_job
	 JOIN Works W ON W.ID_emp = E.ID_emp
GROUP BY E.Name_emp

--3.4. Кто из сотрудников получили максимальные и кто минимальные суммы
--минимальная

SELECT e.Name_emp, SUM(W.Hour_worked*j.SalaryPerHour) AS SalarySumm
FROM Employees E JOIN Job J ON E.ID_job = J.ID_job
	 JOIN Works W ON W.ID_emp = E.ID_emp
GROUP BY e.Name_emp
HAVING SUM(W.Hour_worked*j.SalaryPerHour) IN (

		SELECT TOP 1 SUM(W.Hour_worked*j.SalaryPerHour)
		FROM Employees E JOIN Job J ON E.ID_job = J.ID_job
			 JOIN Works W ON W.ID_emp = E.ID_emp
		GROUP BY E.ID_emp
		ORDER BY 1)

	OR SUM(W.Hour_worked*j.SalaryPerHour) IN (

		SELECT TOP 1 SUM(W.Hour_worked*j.SalaryPerHour)
		FROM Employees E JOIN Job J ON E.ID_job = J.ID_job
			 JOIN Works W ON W.ID_emp = E.ID_emp
		GROUP BY E.Name_emp
		ORDER BY 1 DESC)

--3.5. Какова общая сумма была выплачена за каждую категорию работ, и в каком объёме были выполнены эти работы.
SELECT j.Name_job, SUM(W.Hour_worked*j.SalaryPerHour) AS MoneySumm, SUM(W.Hour_worked) AS HourSumm
FROM Employees E JOIN Job J ON E.ID_job = J.ID_job
	 JOIN Works W ON W.ID_emp = E.ID_emp
GROUP BY j.Name_job