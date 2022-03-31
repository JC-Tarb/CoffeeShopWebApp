-- create and select the database
DROP DATABASE IF EXISTS my_coffee_shop1;
CREATE DATABASE my_coffee_shop1;
USE my_coffee_shop1;  -- MySQL command

-- create the tables
CREATE TABLE employees (
  empID        	INT(10)        	NOT NULL   AUTO_INCREMENT,
  empFNAME   	VARCHAR(20)   	NOT NULL,
  empLNAME      VARCHAR(20)   	NOT NULL,
  empType       VARCHAR(20)  	NOT NULL,
  emailAddress	VARCHAR(30)  	NOT NULL,
  password		VARCHAR(30)  	NOT NULL,
  PRIMARY KEY (empID)
);

CREATE TABLE products (
  prodID        	INT(10)        	NOT NULL   AUTO_INCREMENT,
  prodCode      	VARCHAR(10)    	NOT NULL,
  prodName      	VARCHAR(50)   	NOT NULL,
  prodType     		VARCHAR(50)  	NOT NULL,
  prodSize			VARCHAR(10)	 	NOT NULL,
  prodUnitPrice     DECIMAL(10,2)  	NOT NULL,
  prodQOH			INT(100)		NOT NULL,
  PRIMARY KEY (prodID)
);


INSERT INTO employees VALUES
(1, 'Mike', 'Mora', 'FullTime', 'mora@xyz.com', 'xyzWorking@2012'),
(2, 'Caleb', 'Barry', 'FullTime','barry@xyz.com', '2015xyzJobs@7'),
(3, 'Macy', 'Moodey', 'FullTime','moodey@xyz.com', '2937Dell@work'),
(4, 'Ty', 'Huang', 'PartTime','huang@xyz.com', '004'),
(5, 'Stephanie', 'Shields', 'PartTime', 'shields@xyz.com', '005');

INSERT INTO products VALUES
(1, 'cof', 'Coffee', 'hot beverage', 'small', '2.00', 50),
(2, 'cof', 'Coffee', 'hot beverage', 'medium', '3.00', 50),
(3, 'cof', 'Coffee', 'hot beverage', 'large', '4.00', 50),
(4, 'cof', 'Coffee', 'cold beverage', 'medium', '3.00', 50),
(5, 'lat', 'Latte', 'hot beverage', 'medium', '5.00', 40),
(6, 'cap', 'Cappucino', 'hot beverage', 'medium', '4.00', 40),
(7, 'bag', 'Bagel', 'baked good', 'one piece', '2.00', 20),
(8, 'muf', 'Muffin', 'baked good', 'one piece', '3.00', 15),
(9, 'sco', 'Scone', 'baked good', 'one piece', '3.00', 15),
(10, 'egsd', 'Eggsandwich', 'sandwich', 'one piece', '5.00', 20);


-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON my_coffee_shop1.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';


