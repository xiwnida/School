USE WholeSale_2016
SELECT * FROM Orders

-- 1. Выберите товары и определите на какую сумму у нас каждого товара на складе (Товары (Product))
CREATE PROC ProductPriceSum
	@productOne AS VARCHAR(30),
	@productTwo AS VARCHAR(30),
	@productThree AS VARCHAR(30)
AS
	BEGIN
		SELECT ProductName, UnitPrice*UnitsInStock AS 'Price at all'
		FROM Products
		WHERE ProductName = @productOne OR ProductName = @productTwo OR ProductName = @productThree
	END
GO

EXEC ProductPriceSum
	@productOne = 'Chang',
	@productTwo = 'Ikura',
	@productThree = 'Konbu'


-- Вычислите количество заказов, оформленных в определённом году (год передаёте как входной параметр – четырёхзначное число), в процедуре
-- примените функции для обработки временных данных т.(Заказы (Orders)CREATE PROC OrdersPerYear
	@year AS INT
AS
	BEGIN
		SELECT COUNT(OrderID) AS 'Orders'
		FROM Orders
		WHERE YEAR(OrderDate) = @year
	END
GO

EXEC OrdersPerYear
	@year = '1996'



-- 3. Определите на какую сумму товаров каждой категории у нас на складе т.(Товары (Product))
SELECT * FROM Suppliers

CREATE PROC ProductPerCategorySum
AS
	BEGIN
		SELECT CategoryID, SUM(UnitsInStock*UnitPrice) AS 'Price'
		FROM Products
		GROUP BY CategoryID
	END
GO

EXEC ProductPerCategorySum



--4. Процедура выводит список поставщиков (компания, страна) и их поставляемые продукты (код, название, цена). Страну передаёте как входной
--параметр, для выборки поставщиков из определённой страны – текстовое значение т. (Suppliers(Поставщики), Товары (Product))
CREATE PROC SuppliersPerCountry
	@country AS VARCHAR(30)
AS
	BEGIN
		SELECT CompanyName, Country, ProductID, ProductName, UnitPrice 
		FROM Suppliers JOIN Products ON Suppliers.SupplierID=Products.SupplierID 
		WHERE Country=@country 
	END
GO

EXEC SuppliersPerCountry
	@country = 'USA'