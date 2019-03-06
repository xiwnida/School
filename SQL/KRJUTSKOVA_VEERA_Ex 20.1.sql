USE WholeSale_2016
SELECT * FROM Orders

-- 1. �������� ������ � ���������� �� ����� ����� � ��� ������� ������ �� ������ (������ (Product))
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


-- ��������� ���������� �������, ����������� � ����������� ���� (��� �������� ��� ������� �������� � ������������� �����), � ���������
-- ��������� ������� ��� ��������� ��������� ������ �.(������ (Orders)CREATE PROC OrdersPerYear
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



-- 3. ���������� �� ����� ����� ������� ������ ��������� � ��� �� ������ �.(������ (Product))
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



--4. ��������� ������� ������ ����������� (��������, ������) � �� ������������ �������� (���, ��������, ����). ������ �������� ��� �������
--��������, ��� ������� ����������� �� ����������� ������ � ��������� �������� �. (Suppliers(����������), ������ (Product))
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