-- KRJUTSKOVA VEERA 5-2

USE WholeSale_2016

--1   ====   Выберите клиентов, у которых страна Канада
SELECT *
FROM Customers
WHERE Country = 'Canada'

--2   ====   Выберите клиентов, у которых почтовый код 1010 или 8010
SELECT *
FROM Customers
WHERE PostalCode = '1010' OR PostalCode = '8010'

--3   ===   Выберите клиентов, у которых отсутствует факс
SELECT *
FROM Customers
WHERE Fax IS NULL

--4   ===   Выберите клиентов, у которых указан регион
SELECT *
FROM Customers
WHERE Region IS NOT NULL

--5   ===   Выберите клиентов, у которых не указан регион и отсутствует факс
SELECT *
FROM Customers
WHERE Region IS NULL AND Fax IS NULL

--6   ===   Выберите клиентов, у которых в телефоне присутствуют три пятёрки: 555
SELECT *
FROM Customers
WHERE Phone LIKE '%555%'

--7   ===   Выберите клиентов, у которых должность владелец (owner) и страна Мехико или Америка
SELECT *
FROM Customers
WHERE ContactTitle = 'Owner' AND (Country = 'Mexico' OR Country = 'USA')

--8   ===   Выберите клиента с именем Sven
SELECT *
FROM Customers
WHERE ContactName LIKE 'Sven%'

--9   ===   Из каких стран наши клиенты?
SELECT DISTINCT Country
FROM Customers

--10   ===   Выберите клиентов, у которых кодклиента начинается на буквы B, C, D или E
SELECT *
FROM Customers
WHERE CustomerID LIKE '[bcde]%'

--11   ===   Выберите клиентов, у которых кодклиента не заканчивается на букву A или O
SELECT *
FROM Customers
WHERE CustomerID LIKE '%[^ao]'

--12   ===   Выберите клиентов, у которых в должности контактного лица есть sales
SELECT *
FROM Customers
WHERE ContactTitle LIKE '%sales%'

--13   ===   Выберите клиентов, у которых в должности контактного лица manager, но не sales
SELECT *
FROM Customers
WHERE ContactTitle LIKE '%manager%' and ContactTitle NOT LIKE '%sales%'

--14   ===   Выберите клиентов, у которых в названии города 3 слова (например: Rio de Janeiro)
SELECT *
FROM Customers
WHERE City LIKE '% % %'

--15   ===   Выберите заказы, оформленные в 96 году
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1996

--16   ===   Выберите заказы, оформленные в августе 97 года
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1997 AND MONTH(OrderDate) = 08

--17   ===   Выберите заказы, оформленные в июле 97 года для фирмы GREAL
SELECT *
FROM Orders
WHERE YEAR(OrderDate) = 1997 AND MONTH(OrderDate) = 07 AND CustomerID = 'GREAL'

--18   ===   Выберите товары, стоимость которых больше 50 и на складе осталось меньше 5 
SELECT *
FROM Products
WHERE UnitPrice > 50 AND UnitsInStock < 5

--19   ===   Выберите товары и определите на какую сумму у нас каждого товара на складе
SELECT ProductID, ProductName, UnitPrice*UnitsInStock AS Cost_at_all
FROM Products

--20   ===   Выберите первые 4 заказа оформленные в базе данных
SELECT TOP 4 *
FROM Orders
