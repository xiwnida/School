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
DROP TABLE meter
CREATE TABLE meter(
	meter_st FLOAT,
	meter_end FLOAT,
	meter_date DATE PRIMARY KEY DEFAULT EOMONTH (GETDATE()),
	--enter_date DATETIME DEFAULT GETDATE())
	enter_date DATETIME)
	
INSERT INTO meter (meter_st, meter_end, enter_date) VALUES
	(0,100, '01/02/2019')

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

CREATE TABLE apartment(
	ApartNum NVARCHAR(4) PRIMARY KEY,
	ApartSquare FLOAT,
	RoomQuan INT,
	FIO NVARCHAR(50),
	Phone NVARCHAR(12),
	TypeHeat NVARCHAR(15),
	ProsentSquare FLOAT
	)

INSERT INTO apartment VALUES
	('110', 20.5, 2, 'Veera Krjutskova', '55542221', N'Центральное', 1),
	('111', 18, 3, 'Igor Fomkin', '1234567', N'Газ', 0.07),
	('112', 15, 2, 'Vasja Pupkin', '7654321', N'Электро', 0.2),
	('210', 17.3, 1, 'Sasha White', '2134663', N'Газ', 0.09),
	('211', 16.5, 3,  'Grisha Black', '4256734', N'Центральное', 1),
	('212', 20, 2, 'Lena Elena', '1345265', N'Электро', 0.15)

CREATE TABLE tarifHeat( --Тариф за отопление
	Data DATE PRIMARY KEY DEFAULT EOMONTH (GETDATE()),
	Tarif FLOAT
	)

CREATE TABLE tarifSquare( -- Тариф за площадь
	Data DATE PRIMARY KEY DEFAULT EOMONTH (GETDATE()),
	Tarif FLOAT)

INSERT INTO tarifHeat (Tarif) VALUES
	(52.30)

INSERT INTO tarifSquare (Tarif) VALUES
	(1.30)

DROP TABLE schet
CREATE TABLE schet(
	Data DATE DEFAULT EOMONTH (GETDATE()),
	ApartNum NVARCHAR(4),
	SquareTarif FLOAT,
	SquarePay FLOAT,
	HeatTarif FLOAT,
	HeatPay FLOAT,
	PaySumm FLOAT,
	PRIMARY KEY (Data, ApartNum))

CREATE TABLE AllData(
	Data DATE DEFAULT EOMONTH (GETDATE()) PRIMARY KEY,
	HeatAllPay FLOAT, --Общая сумма за отопление
	HeatOnePay FLOAT) --Одна доля за отопление

DROP PROC get_schet
CREATE PROC get_schet
AS
	BEGIN
		DECLARE @meterData FLOAT
		DECLARE @HeatPayment FLOAT

		SET @meterData = (SELECT meter_end-meter_st FROM meter WHERE EOMONTH(meter_date) = EOMONTH(GETDATE())) --Данные счетчика
		SET @HeatPayment = @meterData * (SELECT Tarif FROM tarifHeat WHERE Data = EOMONTH(GETDATE())) --Всего за отопление

		INSERT INTO Alldata (HeatAllPay, HeatOnePay) VALUES
			(@HeatPayment, @HeatPayment/100)

		DECLARE @SquareTarif FLOAT
		DECLARE @HeatTarif FLOAT

		SET @SquareTarif = (SELECT Tarif FROM tarifSquare WHERE Data = EOMONTH(GETDATE()))
		SET @HeatTarif = (SELECT Tarif FROM tarifHeat WHERE Data = EOMONTH(GETDATE()))

		INSERT INTO schet (ApartNum, SquareTarif, SquarePay, HeatTarif, HeatPay, PaySumm)
		SELECT apartNum, @SquareTarif, ROUND((apartSquare * @SquareTarif),2), @HeatTarif, ROUND((apartSquare * ProsentSquare * @HeatPayment/100),2),
		ROUND((apartSquare * @SquareTarif),2) + ROUND((apartSquare * ProsentSquare * @HeatPayment/100),2)  FROM apartment
	END
GO

DELETE alldata
DELETE schet

EXEC get_meter 190, '03/02/2019'
EXEC get_schet

SELECT * FROM alldata

CREATE VIEW get_schet_view
AS
SELECT s.Data, s.ApartNum, a.FIO, a.Phone, s.SquareTarif AS Тариф_площади, s.SquarePay AS Оплата_площади, s.HeatTarif AS Тариф_отопления, s.HeatPay AS Оплата_отопления, s.PaySumm AS К_оплате_всего
FROM schet s JOIN apartment a ON s.ApartNum = a.ApartNum
WHERE s.Data = EOMONTH(GETDATE());

SELECT * FROM get_schet_view --Посмотреть представление счета