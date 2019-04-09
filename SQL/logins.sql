use master 

create database database_veera
CREATE LOGIN Ted WITH PASSWORD='ted1234', default_database = database_veera 
CREATE LOGIN Sam WITH PASSWORD='sam1234' , default_database = database_veera 
GO 
use database_veera 

create schema sales 

CREATE SCHEMA Production 
CREATE TABLE AuditProduct (id int, name varchar(50), 
logdate datetime, 
creator varchar(50)) 

select * from AuditProduct 

CREATE USER Sam WITH DEFAULT_SCHEMA= Production 

CREATE USER Ted 


CREATE TABLE T1(data varchar(10)) 
CREATE TABLE Sales.T2(data varchar(10)) 
CREATE TABLE Production.T3(data varchar(10)) 
GO 
INSERT INTO dbo.T1 VALUES('HELLO') 
INSERT INTO Sales.T2 VALUES('HELLO') 
INSERT INTO Production.T3 VALUES('HELLO') 

GO 
GRANT SELECT ON SCHEMA::SALES TO Ted 
GRANT SELECT ON SCHEMA::Production TO Sam 
GRANT SELECT ON Production.T3 TO Ted 
GRANT SELECT ON SCHEMA::dbo TO public 
GO