USE sampleDB_JKTVR18

--Вариант А
CREATE TABLE Employee_30(
  emp_no int IDENTITY (1, 1) NOT NULL,
  emp_fname nvarchar(50),
  emp_lname nvarchar(50),
  dept_no nvarchar(3),
  CONSTRAINT PK_Employee_30 PRIMARY KEY(emp_no)
  )

INSERT Employee_30 (emp_fname, emp_lname, dept_no) VALUES
	('lol', 'lol', 'd1')
GO
DECLARE @fname nvarchar(50),
		@lname nvarchar(50),
		@dept_no nvarchar(3)
SET @fname = 'John'
SET @lname = 'White'
SET @dept_no = 'd1'

WHILE (SELECT TOP 1 emp_no
		FROM Employee_30
		GROUP BY emp_no
		ORDER BY 1 DESC) < 30
	BEGIN
	PRINT 'lol'
		INSERT Employee_30 (emp_fname, emp_lname, dept_no) VALUES
		(@fname, @lname, @dept_no)
	END
GO

SELECT * FROM Employee_30

--Вариант В
--19.1

CREATE TABLE Employee_30(
  emp_no int NOT NULL,
  emp_fname nvarchar(50),
  emp_lname nvarchar(50),
  dept_no nvarchar(3),
  CONSTRAINT PK_Employee_30 PRIMARY KEY(emp_no)
  )

GO
DECLARE @fname nvarchar(50),
		@lname nvarchar(50),
		@dept_no nvarchar(3),
		@emp_no int

SET @fname = 'John'
SET @lname = 'White'
SET @dept_no = 'd1'
SET @emp_no = 1

WHILE @emp_no <= 30
	BEGIN
		INSERT Employee_30 (emp_no, emp_fname, emp_lname, dept_no) VALUES
		(@emp_no, @fname, @lname, @dept_no)
		PRINT 'Employee number ' + CAST(@emp_no AS CHAR(3))+ ' has been added.'
		SET @emp_no += 1
	END
GO

SELECT * FROM Employee_30




--19.2
GO
DECLARE @emp_no int,
		@counter int

SET @counter = 0
SET @emp_no = 0

WHILE @counter < 30
	BEGIN

		WHILE @emp_no < 100 OR @emp_no > 1000
			BEGIN
				SET @emp_no = CONVERT(INT, 1000*RAND())
			END

		INSERT Employee_30 (emp_no, emp_fname, emp_lname, dept_no) VALUES
		(@emp_no, 'John', 'Black', 'd1')
		SET @counter += 1
		SET @emp_no = 0
	END
GO

SELECT * FROM Employee_30




--19.3
GO
DECLARE @emp_no int,
		@counter int

SET @counter = 0
SET @emp_no = 0

WHILE @counter < 30
	BEGIN

		WHILE @emp_no < 200 OR @emp_no > 250
			BEGIN
				SET @emp_no = CONVERT(INT, 1000*RAND())
			END

		INSERT Employee_30 (emp_no, emp_fname, emp_lname, dept_no) VALUES
		(@emp_no, 'John', 'Black', 'd1')
		SET @counter += 1
		SET @emp_no = 0
	END
GO

SELECT * FROM Employee_30




--19.4
GO
DECLARE @emp_no int,
		@counter int

SET @counter = 0
SET @emp_no = 0

WHILE @counter < 30
	BEGIN

		WHILE @emp_no < 300 OR @emp_no > 360
			BEGIN
				SET @emp_no = CONVERT(INT, 1000*RAND())
			END

		INSERT Employee_30 (emp_no, emp_fname, emp_lname, dept_no) VALUES
		(@emp_no, 'John', 'Black', 'd1')
		IF @@ERROR <> 0
			PRINT 'Error!'
		ELSE
			BEGIN
				SET @counter += 1;
			END
		SET @emp_no = 0
	END
GO

SELECT * FROM Employee_30




--19.5
--Первые 10 строк
SELECT TOP 10 *
FROM Employee_30

--Последние 15 строк
SELECT TOP 15 *
FROM Employee_30
ORDER BY 1 DESC

--Четвертая страница из двадцати строк
SELECT *
FROM Employee_30
ORDER BY emp_no
OFFSET 60 ROWS
FETCH NEXT 20 ROWS ONLY;