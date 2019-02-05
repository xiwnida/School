-- KRJUTSKOVA VEERA 5-2

USE WholeSale_2016

--1   ====   �������� ��������, � ������� ������ ������
SELECT *
FROM Customers
WHERE Country = 'Canada'

--2   ====   �������� ��������, � ������� �������� ��� 1010 ��� 8010
SELECT *
FROM Customers
WHERE PostalCode = '1010' OR PostalCode = '8010'

--3   ===   �������� ��������, � ������� ����������� ����
SELECT *
FROM Customers
WHERE Fax IS NULL

--4   ===   �������� ��������, � ������� ������ ������
SELECT *
FROM Customers
WHERE Region IS NOT NULL

--5   ===   �������� ��������, � ������� �� ������ ������ � ����������� ����
SELECT *
FROM Customers
WHERE Region IS NULL AND Fax IS NULL

--6   ===   �������� ��������, � ������� � �������� ������������ ��� ������: 555
SELECT *
FROM Customers
WHERE Phone LIKE '%555%'

--7   ===   �������� ��������, � ������� ��������� �������� (owner) � ������ ������ ��� �������
SELECT *
FROM Customers
WHERE ContactTitle = 'Owner' AND (Country = 'Mexico' OR Country = 'USA')

--8   ===   �������� ������� � ������ Sven
SELECT *
FROM Customers
WHERE ContactName LIKE 'Sven%'

--9   ===   �� ����� ����� ���� �������?
SELECT DISTINCT Country
FROM Customers

--10   ===   �������� ��������, � ������� ���������� ���������� �� ����� B, C, D ��� E
SELECT *
FROM Customers
WHERE CustomerID LIKE '[bcde]%'

--11   ===   �������� ��������, � ������� ���������� �� ������������� �� ����� A ��� O
SELECT *
FROM Customers
WHERE CustomerID LIKE '%[^ao]'

--12   ===   �������� ��������, � ������� � ��������� ����������� ���� ���� sales
SELECT *
FROM Customers
WHERE ContactTitle LIKE '%sales%'

--13   ===   �������� ��������, � ������� � ��������� ����������� ���� manager, �� �� sales
SELECT *
FROM Customers
WHERE ContactTitle LIKE '%manager%' and ContactTitle NOT LIKE '%sales%'

--14   ===   �������� ��������, � ������� � �������� ������ 3 ����� (��������: Rio de Janeiro)
SELECT *
FROM Customers
WHERE City LIKE '% % %'

--15   ===   �������� ������, ����������� � 96 ����
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1996

--16   ===   �������� ������, ����������� � ������� 97 ����
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1997 AND MONTH(OrderDate) = 08

--17   ===   �������� ������, ����������� � ���� 97 ���� ��� ����� GREAL
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1997 AND MONTH(OrderDate) = 07 AND CustomerID = 'GREAL'

--18   ===   �������� ������, ��������� ������� ������ 50 � �� ������ �������� ������ 5 
SELECT *
FROM Products
WHERE UnitPrice > 50 AND UnitsInStock < 5

--19   ===   �������� ������ � ���������� �� ����� ����� � ��� ������� ������ �� ������
SELECT ProductID, ProductName, UnitPrice*UnitsInStock AS Cost_at_all
FROM Products

--20   ===   �������� ������ 4 ������ ����������� � ���� ������
SELECT TOP 4 *
FROM Orders
