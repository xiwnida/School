USE WholeSale_2016

-- 1.  ���������� �������� ������, � ���� �� �����������  � �� ����� �����?
SELECT CompanyName, Country
FROM Products JOIN Suppliers ON Products.SupplierID = Suppliers.SupplierID
WHERE Discontinued = 0
GROUP BY CompanyName, Country

-- 2.	�� ����� ����� ���������� �������?
SELECT Country
FROM Products JOIN Categories ON Products.CategoryID = Categories.CategoryID
	 JOIN Suppliers ON Products.SupplierID = Suppliers.SupplierID
WHERE CategoryName = 'Produce'
GROUP BY Country

-- 3.	�� ����� �����, � �� ����� ����� �����, ������� ������� ���� �������?
SELECT Country, SUM(UnitPrice) AS PriceAtAll
FROM Orders JOIN OrderDetails ON Orders.OrderID = OrderDetails.OrderID
	 JOIN Customers ON Orders.CustomerID = Customers.CustomerID
GROUP BY Country

-- 4.	�� ����� ����� c������ ������� ��������?
SELECT YEAR(OrderDate), SUM(UnitPrice) AS PriceAtAll
FROM Orders JOIN OrderDetails ON Orders.OrderID = OrderDetails.OrderID
GROUP BY YEAR(OrderDate)

-- 5.	�������� ������, ������� ������� ������ � ��������� � ����������� �����.
SELECT *
FROM Products
WHERE UnitPrice =
				(SELECT TOP 1 UnitPrice
				FROM Products
				GROUP BY UnitPrice
				ORDER BY UnitPrice);

-- 6.	������  ���������� ����������� (��������, ������) �� ������ (Japan) � �������� (���, ��������, ����), ������� ��� ����������.
SELECT CompanyName, Country, ProductID, ProductName, UnitPrice
FROM Suppliers JOIN Products ON Suppliers.SupplierID = Products.SupplierID
WHERE Country = 'Japan'

-- 7.	�������� ������, ������� ������� ������ � ��������, ����������� ������ 12 ������� 2007 �.
SELECT Customers.*
FROM Customers JOIN Orders ON Customers.CustomerID = Orders.CustomerID
WHERE OrderDate = '2007/01/12'

-- 8.	�������� ������, ������� ������� ������ � ��������, ������� �� ��������� ������ 12 ������� 2007 �.