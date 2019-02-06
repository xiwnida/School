USE WholeSale_2016

-- 1 === ���������� ���������� ������� ����������� � 1996 ���� 
--(������ �������)
SELECT COUNT(OrderDate) AS Orders_in_1996
FROM Orders
WHERE YEAR(OrderDate) = 1996

--(����� ���� ������� � 1996)
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1996
ORDER BY OrderDate

--2 === ���������� � ����� ������ ���� ����������� ������ � ������� ������� ���� ����������� � ������ �� �����
SELECT ShipCountry, COUNT(ShipCountry) AS how_much
FROM Orders
GROUP BY ShipCountry

--3 === �������� 7 �������, � ������� ���� ����� ������� ��������, ������� ��� ������, ��� �������, ������ � ��������� ��������
SELECT TOP 7 Orders.OrderID, CustomerID, ShipCountry, UnitPrice
FROM Orders, OrderDetails
WHERE Orders.OrderID = OrderDetails.OrderID
ORDER BY UnitPrice DESC

--4 === ����� ������������ ���������� ������� ���� ��������� ����� �� ����������� (��� ����� ���������� ���� �� �����)
SELECT TOP 1 EmployeeID, COUNT(*) AS how_much
FROM Orders
GROUP BY EmployeeID
ORDER BY how_much DESC

--5 === ����������� ���������� �������, � ������� ������������� ���� ��������
SELECT COUNT(*)
FROM Orders
WHERE ShippedDate IS NULL

--6 === ������� ������� ������� ������ �� ��������, ������������ � ������� �����������
SELECT CustomerID, COUNT(*) AS How_much
FROM Orders
GROUP BY CustomerID
ORDER BY How_much

--7 === �������� ��������, ������� �������� ����� 15 �������, ������������ ������ � ������� �������� ���������� ����������� �������
SELECT CustomerID, COUNT(*) AS How_much
FROM Orders
GROUP BY CustomerID
HAVING COUNT(*) > 15
ORDER BY How_much DESC

--8 === �� ����� ����� � �� ����� ������� � ��� 2 � ����� ��������
SELECT ShipCountry, ShipCity, COUNT(*) AS Customers
FROM Orders
GROUP BY ShipCountry, ShipCity
HAVING COUNT(*) >= 2
ORDER BY Customers

--9 === ������� �������������� ������� � ������ ���������
SELECT CategoryID, COUNT(*) AS How_much
FROM Products
GROUP BY CategoryID

--10 === �� ����� ����� ������� ������ ��������� � ��� �� ������ (���������� ��������� � ���������� ������ �� ������)
SELECT CategoryID, SUM(UnitsInStock*UnitPrice) AS Price
FROM Products
GROUP BY CategoryID


