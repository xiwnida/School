USE WholeSale_2016

-- 1.  Прекращены поставки товара, у кого из поставщиков  и из каких стран?
SELECT CompanyName, Country
FROM Products JOIN Suppliers ON Products.SupplierID = Suppliers.SupplierID
WHERE Discontinued = 0
GROUP BY CompanyName, Country

-- 2.	Из каких стран поставщики фруктов?
SELECT Country
FROM Products JOIN Categories ON Products.CategoryID = Categories.CategoryID
	 JOIN Suppliers ON Products.SupplierID = Suppliers.SupplierID
WHERE CategoryName = 'Produce'
GROUP BY Country

-- 3.	Из каких стран, и на какую общую сумму, сделали заказов наши клиенты?
SELECT Country, SUM(UnitPrice) AS PriceAtAll
FROM Orders JOIN OrderDetails ON Orders.OrderID = OrderDetails.OrderID
	 JOIN Customers ON Orders.CustomerID = Customers.CustomerID
GROUP BY Country

-- 4.	На какую сумму cделали заказов ежегодно?
SELECT YEAR(OrderDate), SUM(UnitPrice) AS PriceAtAll
FROM Orders JOIN OrderDetails ON Orders.OrderID = OrderDetails.OrderID
GROUP BY YEAR(OrderDate)

-- 5.	Создайте запрос, который выводит данные о продуктах с минимальной ценой.
SELECT *
FROM Products
WHERE UnitPrice =
				(SELECT TOP 1 UnitPrice
				FROM Products
				GROUP BY UnitPrice
				ORDER BY UnitPrice);

-- 6.	Запрос  возвращает поставщиков (компания, страна) из Японии (Japan) и продукты (код, название, цена), которые они поставляют.
SELECT CompanyName, Country, ProductID, ProductName, UnitPrice
FROM Suppliers JOIN Products ON Suppliers.SupplierID = Products.SupplierID
WHERE Country = 'Japan'

-- 7.	Создайте запрос, который выводит данные о клиентах, выполнивших заказы 12 февраля 2007 г.
SELECT Customers.*
FROM Customers JOIN Orders ON Customers.CustomerID = Orders.CustomerID
WHERE OrderDate = '2007/01/12'

-- 8.	Создайте запрос, который выводит данные о клиентах, которые не оформляли заказы 12 февраля 2007 г.