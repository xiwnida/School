USE master

-- 1. Создание базы данных
CREATE DATABASE Korter_JKTVR18
	ON (NAME = Korter_JKTVR18_dat,
		FILENAME = 'D:\JKTVR18Krjutskova\SQL\Korter_JKTVR18\Korter.mdf',
		SIZE = 5,
		MAXSIZE = 100,
		FILEGROWTH = 5)
	LOG ON
		(NAME = Korter_JKTVR18_log,
		FILENAME = 'D:\JKTVR18Krjutskova\SQL\Korter_JKTVR18\Korter.ldf',
		SIZE = 10,
		MAXSIZE = 100,
		FILEGROWTH = 10);

USE Korter_JKTVR18
DELETE meter
CREATE TABLE meter(
	meter_st FLOAT,
	meter_end FLOAT,
	meter_date DATE PRIMARY KEY,
	--enter_date DATETIME DEFAULT GETDATE())
	enter_date DATETIME)
	
INSERT INTO meter VALUES
	(100,200,'12/31/2018', '01/02/2019'),
	(200,350,'1/31/2019', '02/02/2019')

SELECT * FROM meter

SELECT EOMONTH (GETDATE(), -1), EOMONTH (GETDATE()), EOMONTH (GETDATE(), 1)

DROP PROC get_meter
GO
CREATE PROC get_meter
	@meter_end FLOAT,
	@enter_date DATETIME
AS
	BEGIN
	DECLARE @meter_last FLOAT
	SELECT TOP 1 @meter_last = meter_end FROM meter
	ORDER BY meter_date DESC
	INSERT meter VALUES
	(@meter_last,  @meter_end, EOMONTH (@enter_date,-1), @enter_date)
	IF @@ERROR <> 0
	BEGIN
		DECLARE @meter_date_last DATETIME
		SET @meter_date_last = (SELECT TOP 1 meter_date FROM meter GROUP BY meter_date ORDER BY 1 DESC)
		IF EOMONTH(@enter_date,-1) = @meter_date_last
			BEGIN
				UPDATE meter
				SET meter_end = @meter_end WHERE meter_date = @meter_date_last
				PRINT N'Данные за последний месяц изменены'
			END
		ELSE
			BEGIN
				PRINT N'Данные за этот месяц уже были введены'
			END
	END
	END
GO
EXEC get_meter 485, '03/02/2019'
EXEC get_meter 575, '04/02/2019'
EXEC get_meter 675, '05/02/2019'
EXEC get_meter 795, '06/02/2019'
SELECT * FROM meter

CREATE TABLE apartment(
	ApartNum NVARCHAR(4) PRIMARY KEY,
	ApartSquare FLOAT,
	RoomQuan INT,
	FIO NVARCHAR(50),
	Phone NVARCHAR(12),
	TypeHeat NVARCHAR(15),
	ProsentSquare INT
	)
DROP TABLE apartment
SELECT * FROM apartment

INSERT INTO apartment VALUES
	('110', 20.5, 2, 'Veera Krjutskova', '55542221', N'Центральное', 100),
	('111', 18, 3, 'Igor Fomkin', '1234567', N'Газ', 7),
	('112', 15, 2, 'Vasja Pupkin', '7654321', N'Электро', 20),
	('210', 17.3, 1, 'Sasha White', '2134663', N'Газ', 9),
	('211', 16.5, 3,  'Grisha Black', '4256734', N'Центральное', 100),
	('212', 20, 2, 'Lena Elena', '1345265', N'Электро', 15)

CREATE TABLE tarifHeat( --Тариф за отопление
	Data DATE PRIMARY KEY DEFAULT EOMONTH (GETDATE()),
	Tarif FLOAT
	)
DROP TABLE tarifHeat

CREATE TABLE tarifSquare( -- Тариф за площадь
	Data DATE PRIMARY KEY DEFAULT EOMONTH (GETDATE()),
	Tarif FLOAT)
DROP TABLE tarifSquare

INSERT INTO tarifHeat (Tarif) VALUES
	(52.30)

INSERT INTO tarifSquare (Tarif) VALUES
	(1.30)
SELECT * FROM tarifSquare

CREATE TABLE schet(
	Data DATE DEFAULT EOMONTH (GETDATE()),
	ApartNum NVARCHAR(4),
	SquarePay FLOAT,
	HeatPay FLOAT,
	PaySumm FLOAT)
DROP TABLE schet
	
CREATE PROC get_schet
AS
	BEGIN
		DECLARE @HeatAll FLOAT
		SET @HeatAll = (SELECT meter_end-meter_st FROM meter WHERE EOMONTH(enter_date) = EOMONTH(GETDATE())) --@HeatAll * (SELECT Tarif FROM tarifHeat WHERE Data = EOMONTH(GETDATE()))
		
		DECLARE @SquareAll FLOAT
		SET @SquareAll = (SELECT SUM(ApartSquare) FROM apartment) --Рассчет всей площади квартир
		DECLARE @AllSquarePayment FLOAT
		SET @AllSquarePayment = @SquareAll * (SELECT Tarif FROM tarifSquare WHERE EOMONTH(Data) = EOMONTH(GETDATE())) -- Рассчет общей суммы за квартиры
		
		INSERT INTO schet (ApartNum)
		SELECT apartNum,  FROM apartment
		SELECT * FROM schet