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