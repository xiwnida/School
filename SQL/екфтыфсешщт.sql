USE sampleDB_JKTVR18

SELECT * FROM employee
SELECT * FROM works_on

BEGIN TRANSACTION /*начало*/
UPDATE employee
	SET emp_no = 39831
	WHERE emp_no = 10102
	IF (@@ERROR <> 0)
	ROLLBACK /*откат*/
UPDATE works_on
	SET emp_no = 39831
	WHERE emp_no = 10102
	IF (@@ERROR <> 0)
	ROLLBACK
	COMMIT /*завершение*/


BEGIN TRANSACTION; 
INSERT INTO department (dept_no, dept_name) 
VALUES ('d4', 'Sales'); 
SAVE TRANSACTION a; 
INSERT INTO department (dept_no, dept_name) 
VALUES ('d5', 'Research'); 
SAVE TRANSACTION b; 
INSERT INTO department (dept_no, dept_name) 
VALUES ('d6', 'Management'); 
ROLLBACK TRANSACTION b; 
INSERT INTO department (dept_no, dept_name) 
VALUES ('d7 ', 'Support'); 
ROLLBACK TRANSACTION a; 
COMMIT TRANSACTION;

DELETE FROM department WHERE dept_no > 'd3'

BEGIN TRANSACTION
	INSERT INTO department VALUES ('d8', 'sales', NULL)
SAVE TRANSACTION a
	INSERT INTO department VALUES ('d5', 'sales', NULL)
		SAVE TRANSACTION b
			INSERT INTO department VALUES ('d6', 'sales', NULL)
		--ROLlBACK TRANSACTION b
	INSERT INTO department VALUES ('d7', 'sales', NULL)
ROLLBACK TRANSACTION b
COMMIT TRANSACTION

SELECT * INTO
department_new
FROM department


SELECT * FROM department_new

--=============

SET IMPLICIT_TRANSACTIONS ON
DELETE FROM department_new
ROLLBACK
GO