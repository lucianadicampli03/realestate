-- Insert sample data into Property table
INSERT INTO Property (address, ownerName, price) VALUES
('123 Main St', 'John Doe', 150000),
('456 Elm St', 'Jane Smith', 200000),
('789 Oak St', 'Mike Brown', 250000),
('101 Pine St', 'Laura White', 300000),
('202 Maple St', 'James Black', 120000);

-- Insert sample data into House table
INSERT INTO House (bedrooms, bathrooms, size, address) VALUES
(3, 2, 1500, '123 Main St'),
(4, 3, 2000, '456 Elm St'),
(2, 1, 1000, '789 Oak St'),
(4, 2, 1800, '101 Pine St'),
(2, 2, 1300, '202 Maple St');

-- Insert sample data into BusinessProperty table
INSERT INTO BusinessProperty (type, size, address) VALUES
('Office', 1200, '123 Main St'),
('Retail', 1500, '456 Elm St'),
('Warehouse', 3000, '789 Oak St'),
('Restaurant', 2500, '101 Pine St'),
('Mall', 5000, '202 Maple St');

-- Insert sample data into Firm table
INSERT INTO Firm (id, name, address) VALUES
(1, 'Elite Realty', '456 Elm St'),
(2, 'Blue Sky Properties', '789 Oak St'),
(3, 'Green Homes', '123 Main St');

-- Insert sample data into Agent table
INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES
(1, 'Alice Johnson', '555-1234', 1, '2021-06-01'),
(2, 'Bob Smith', '555-5678', 2, '2020-03-15'),
(3, 'Charlie Brown', '555-9101', 3, '2019-08-23');

-- Insert sample data into Listings table
INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES
(1001, '123 Main St', 1, '2023-11-15'),
(1002, '456 Elm St', 2, '2023-11-20'),
(1003, '789 Oak St', 3, '2023-10-05'),
(1004, '101 Pine St', 1, '2023-12-01'),
(1005, '202 Maple St', 2, '2023-09-10');

-- Insert sample data into Buyer table
INSERT INTO Buyer (id, name, phone, propertyType, bedrooms, bathrooms, businessPropertyType, minimumPreferredPrice, maximumPreferredPrice) VALUES
(1, 'Sarah Miller', '555-3456', 'House', 3, 2, NULL, 100000, 200000),
(2, 'David Lopez', '555-7890', 'Business', NULL, NULL, 'Retail', 150000, 500000),
(3, 'Emily Davis', '555-1122', 'House', 4, 3, NULL, 200000, 300000),
(4, 'James Wilson', '555-3344', 'Business', NULL, NULL, 'Restaurant', 100000, 250000);

-- Insert sample data into Works_With table
INSERT INTO Works_With (buyerId, agentId) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1);