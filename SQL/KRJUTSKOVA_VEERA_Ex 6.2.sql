USE WholeSale_2016

-- 1 === ќпределите количество заказов оформленных в 1996 году 
--(ѕросто подсчет)
SELECT COUNT(OrderDate) AS Orders_in_1996
FROM Orders
WHERE YEAR(OrderDate) = 1996

--(¬ывод всех заказов в 1996)
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1996
ORDER BY OrderDate

--2 === ќпределите в какие страны были доставленны заказы и сколько заказов было доставленно в каждую из стран
SELECT ShipCountry, COUNT(ShipCountry) AS how_much
FROM Orders
GROUP BY ShipCountry

--3 === ¬ыберите 7 заказов, у которых была сама€ дорога€ доставка, укажите код заказа, код клиента, страну и стоимость доставки
SELECT TOP 7 Orders.OrderID, CustomerID, ShipCountry, UnitPrice
FROM Orders, OrderDetails
WHERE Orders.OrderID = OrderDetails.OrderID
ORDER BY UnitPrice DESC

--4 ===  акое максимальное количество заказов было оформлено одним из сотрудников (им€ этого сотрудника пока не важно)
SELECT TOP 1 EmployeeID, COUNT(*) AS how_much
FROM Orders
GROUP BY EmployeeID
ORDER BY how_much DESC

--5 === ѕодсчитайте количество заказов, у которых отсутствовала дата доставки
SELECT COUNT(*)
FROM Orders
WHERE ShippedDate IS NULL

--6 === —колько заказов оформил каждый из клиентов, отсортируйте в пор€дке возрастани€
SELECT CustomerID, COUNT(*) AS How_much
FROM Orders
GROUP BY CustomerID
ORDER BY How_much

--7 === ¬ыберите клиентов, которые оформили более 15 заказов, отсортируете данные в пор€дке убывани€ количества оформленных заказов
SELECT CustomerID, COUNT(*) AS How_much
FROM Orders
GROUP BY CustomerID
HAVING COUNT(*) > 15
ORDER BY How_much DESC

--8 === »з каких стран и из каких городов у нас 2 и более клиентов
SELECT ShipCountry, ShipCity, COUNT(*) AS Customers
FROM Orders
GROUP BY ShipCountry, ShipCity
HAVING COUNT(*) >= 2
ORDER BY Customers

--9 === —колько разновидностей товаров в каждой категории
SELECT CategoryID, COUNT(*) AS How_much
FROM Products
GROUP BY CategoryID

--10 === Ќа какую сумму товаров каждой категории у нас на складе (учитывайте стоимость и количество товара на складе)
SELECT CategoryID, SUM(UnitsInStock*UnitPrice) AS Price
FROM Products
GROUP BY CategoryID


