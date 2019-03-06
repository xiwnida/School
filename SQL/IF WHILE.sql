USE WholeSale_2016

SELECT ProductID, ProductName, UnitsInStock,
	CONVERT(CHAR(5), ProductID)+ProductName +' ' + CONVERT(CHAR(5), UnitsInStock)
FROM Products

SELECT ProductID, ProductName, UnitsInStock,
	CAST(ProductID AS CHAR(5))+ProductName +' ' + CAST(UnitsInStock AS CHAR(5))
FROM Products

--округление с помощью конверт
SELECT UnitPrice, CONVERT(DECIMAL(10,1), UnitPrice)
FROM Products

--с помощью каст
SELECT UnitPrice, CAST(UnitPrice AS DECIMAL(10,1))
FROM Products

SELECT * FROM Orders
SELECT CAST ('2017-02-08' AS datetime)
SELECT CONVERT(datetime, '01/31/2017', 101)
SELECT CONVERT(datetime, '31/01/2017', 103)
SELECT CONVERT(datetime, '31.1.2017', 104)
SELECT CONVERT(date, '31 january 2017', 106)
SELECT CONVERT(date, 'february 07 2017', 107)
SELECT CONVERT(datetime, '2011/01/17', 111)

USE sampleDB_JKTVR18

IF(SELECT COUNT(*)
	FROM works_on
	WHERE project_no = 'p1'
	GROUP BY project_no ) > 3
	PRINT 'p1 is 4 or more'
ELSE
	BEGIN
		PRINT 'lol'
		SELECT emp_fname, emp_1name
		FROM employee, works_on
		WHERE employee.emp_no = works_on.emp_no
		AND project_no = 'p1'
	END

