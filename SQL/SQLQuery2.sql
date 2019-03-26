USE WholeSale_2016

SELECT * FROM Orders
SELECT * FROM OrderDetails
SELECT * FROM Shippers


CREATE VIEW v_cust_total
AS
SELECT CustomerID, CompanyName, YEAR(OrderDate) Year_order, SUM(UnitPrice * Quantity) Summa
FROM Orders JOIN OrderDetails ON Orders.OrderID = OrderDetails.OrderID 
			JOIN Shippers ON ShipVia = ShipperID
GROUP BY CustomerID, CompanyName, YEAR(OrderDate)
GO