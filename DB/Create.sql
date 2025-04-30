-- USER
INSERT INTO Luxville.USER (FIRST_NAME, LAST_NAME)
VALUES
-- system users
('System', 'Admin'),
('System', 'User'),
('System', 'Guest'),
('System', 'Manager'),
('System', 'Operator'),
-- external users
('John', 'Doe'),
('Jane', 'Smith'),
('Alice', 'Johnson'),
('Bob', 'Brown'),
('Charlie', 'Davis'),
('Eve', 'Wilson'),
('Frank', 'Garcia'),
('Grace', 'Martinez'),
('Hank', 'Lopez'),
('Ivy', 'Gonzalez');

-- PHONE NUMBERS
INSERT INTO Luxville.USER_PHONE (USER_ID, COUNTRY_CODE, PHONE_NUMBER)
VALUES 
(1, '+1', '5551000001'),
(1, '+1', '5551000002'),
(2, '+44', '5551000003'),
(2, '+44', '5551000004'),
(3, '+91', '5551000005'),
(3, '+91', '5551000006'),
(4, '+20', '5551000007'),
(4, '+20', '5551000008'),
(5, '+33', '5551000009'),
(5, '+33', '5551000010'),
(6, '+81', '5551000011'),
(6, '+81', '5551000012'),
(7, '+49', '5551000013'),
(7, '+49', '5551000014'),
(8, '+61', '5551000015'),
(8, '+61', '5551000016'),
(9, '+39', '5551000017'),
(9, '+39', '5551000018'),
(10, '+86', '5551000019'),
(10, '+86', '5551000020'),
(11, '+34', '5551000021'),
(11, '+34', '5551000022'),
(12, '+7', '5551000023'),
(12, '+7', '5551000024'),
(13, '+82', '5551000025'),
(13, '+82', '5551000026'),
(14, '+31', '5551000027'),
(14, '+31', '5551000028'),
(15, '+41', '5551000029'),
(15, '+41', '5551000030');

-- ROLES
INSERT INTO Luxville.ROLE (ROLE_NAME)
VALUES
('Admin'),
('Viewer'),
('Accountant'),
('Manager'),
('Operator');

-- PERMISSIONS
INSERT INTO Luxville.PERMISSION (
    ROLE_ID,
    CAN_IMPORT_EXPORT_TRANSACTIONS,
    CAN_VIEW_TRANSACTIONS,
    CAN_EDIT_TRANSACTIONS,
    CAN_CREATE_TRANSACTIONS,
    CAN_DELETE_TRANSACTIONS,
    CAN_EDIT_AUDITLOG,
    CAN_EXPORT_AUDITLOG,
    CAN_VIEW_AUDITLOG,
    CAN_CREATE_USER,
    CAN_EDIT_USER,
    CAN_DELETE_USER,
    CAN_MANAGE_ROLES
)
VALUES
-- Admin
(1, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE),
-- Viewer
(2, FALSE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, TRUE, FALSE, FALSE, FALSE, FALSE),
-- Accountant
(3, TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE),
-- Manager
(4, TRUE, TRUE, TRUE, TRUE, FALSE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, TRUE),
-- Operator
(5, TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE);

-- SYSTEM USERS

INSERT INTO Luxville.SYSTEMUSER (
    USER_ID,
    EMAIL,
    PASSWORD,
    ROLE_ID
)
VALUES
-- system users
(1, 'admin@gmail.com', 'admin123', 1),
(2, 'viewer@gmail.com', 'viewer123', 2),
(4, 'accountant@gmail.com', 'accountant123', 3),
(3, 'viewer2@gmail.com', 'viewer123', 2),
(5, 'manager@gmail.com', 'manager123', 4);

-- EXTERNAL USERS
INSERT INTO Luxville.EXTERNALUSER (
    USER_ID,
    RATING
)
VALUES
-- external users
(6, 4.5),
(7, 3.8),
(8, 4.2),
(9, 4.0),
(10, 3.5),
(11, 4.7),
(12, 4.1),
(13, 3.9),
(14, 4.6),
(15, 4.3);

-- OWNERS
INSERT INTO Luxville.OWNER (
    EXTERNALUSER_ID,
    USER_ID,
    PROPERTY_ID
)
VALUES
(3, 8, 'PROP123'),
(4, 9, 'PROP456'),
(5, 10, 'PROP789'),
(2, 7, 'PROP544'),
(6, 11, 'PROP867'),
(7, 12, 'PROP890');

-- SELLERS
INSERT INTO Luxville.SELLER (
    EXTERNALUSER_ID,
    USER_ID,
    SELLER_SSN,
    SELLER_AREA
)
VALUES
(2, 7, '987-65-4321', 'Los Angeles');

-- PROPERTIES
INSERT INTO Luxville.PROPERTY (
    PROPERTY_ID,
    OWNER_ID,
    OWNER_EXTERNALUSER_ID,
    OWNER_USER_ID,
    SELLER_ID,
    SELLER_EXTERNALUSER_ID,
    SELLER_USER_ID,
    FOR_RENT,
    FOR_SALE,
    PRICE,
    PAID_AMOUNT,
    MY_CUT,
    STATUS,
    AREA,
    LISTING_DATE,
    MEDIA_LINK,
    IS_INSTALLMENT_AVAILABLE,
    INSTALLMENT_DURATION_MONTHS,
    DOWN_PAYMENT,
    MONTHLY_PAYMENT,
    INTEREST_RATE,
    PAYMENT_START_DATE,
    LATITUDE,
    LONGITUDE,
    ADDRESS_LINK,
    SELLER_SSN
)
VALUES
('PROP123', 1, 3, 8, NULL, NULL, NULL, TRUE, FALSE, 10000.00, 0.00, 1000.00, 0, 'Downtown', NOW(), 'http://example.com/media1.jpg', FALSE, NULL, NULL, NULL, NULL, NULL, 40.7128, -74.0060, 'http://example.com/address1', NULL),
('PROP456', 2, 4, 9, NULL, NULL, NULL, FALSE, TRUE, 2000000.00, 0.00, 10000.00, 0, 'Midtown', NOW(), 'http://example.com/media2.jpg', TRUE, 12, 3000.00, 1500.00, 3.5, NOW(), 34.0522, -118.2437, 'http://example.com/address2', NULL),
('PROP789', 3, 5, 10, NULL, NULL, NULL, TRUE, FALSE, 25000.00, 0.00, 1500.00, 1,'Uptown', NOW(), 'http://example.com/media3.jpg', TRUE ,6 ,5000.00 ,2000.00 ,4.0 ,NOW() ,51.5074 ,-0.1278 ,'http://example.com/address3' ,NULL),
('PROP867', 5, 6, 11, NULL, NULL, NULL, FALSE, TRUE, 2500000.00, 0.00, 22000.00, 1, 'Uptown', NOW(), 'http://example.com/media2.jpg', TRUE, 12, 5000.00, 2000.00, 5.0, NOW(), 34.0522, -118.2437, 'http://example.com/address2', NULL),
('PROP890', 6, 7, 12, NULL, NULL, NULL, TRUE, FALSE, 7000.00, 0.00, 1000.00, 1,'Suburb', NOW(), 'http://example.com/media3.jpg', TRUE ,6 ,10000.00 ,1500.00 ,4.5 ,NOW() ,51.5074 ,-0.1278 ,'http://example.com/address3' ,NULL),
('PROP544', 4, 2, 7, 1, 2, 7, FALSE, TRUE, 5000000.00, 0.00, 20000.00, 1,'Suburb', NOW(), 'http://example.com/media4.jpg', TRUE ,6 ,2000.00 ,1000.00 ,3.5 ,NOW() ,51.5074 ,-0.1278 ,'http://example.com/address4' ,'987-65-4321');

-- HOUSES
INSERT INTO Luxville.HOUSE (
    PROPERTY_ID,
    OWNER_ID,
    OWNER_EXTERNALUSER_ID,
    OWNER_USER_ID,
    NUMBER_OF_BATHROOMS,
    NUMBER_OF_BEDROOMS,
    NUMBER_OF_FLOORS,
    HAS_GARAGE,
    HAS_GARDEN,
    YEAR_BUILT,
    HEATING_TYPE,
    COOLING_TYPE,
    IS_FURNISHED,
    BACKYARD_AREA,
    FLOORING_TYPE,
    ROOF_TYPE,
    NETWORK_INFRASTRUCTURE,
    HAS_LANDLINE
)
VALUES
('PROP123', 1, 3, 8, 2, 3, 2, TRUE, TRUE, 2010, 'Central', 'Split', TRUE, 500.00, 'Wood', 'Gable', 'Wi-Fi', TRUE),
('PROP456', 2, 4, 9, 3, 4, 1, FALSE, FALSE, 2015, 'Radiant', 'Ductless', FALSE, NULL, 'Tile', 'Flat', NULL, FALSE),
('PROP789', 3, 5, 10, 2, 3, 2, TRUE ,TRUE ,2018 ,'Baseboard' ,'Central' ,TRUE ,300.00 ,'Carpet' ,'Hip' ,'Wi-Fi' ,TRUE);
-- APARTMENTS
INSERT INTO Luxville.APARTMENT (
    PROPERTY_ID,
    OWNER_ID,
    OWNER_EXTERNALUSER_ID,
    OWNER_USER_ID,
    FLOOR_NUMBER,
    UNIT_NUMBER,
    NUMBER_OF_BATHROOMS,
    NUMBER_OF_BEDROOMS,
    BUILDING_NAME,
    HAS_ELEVATOR,
    MONTHLY_MAINTENANCE_FEE,
    IS_FURNISHED,
    HAS_BALCONY,
    VIEW_TYPE,
    NETWORK_INFRASTRUCTURE,
    HAS_LANDLINE
)
VALUES
('PROP867', 5, 6, 11, 5, 101, 2, 3, 'Skyline Towers', TRUE, 200.00, TRUE, TRUE, 'City View', 'Fiber Optic', TRUE),
('PROP890', 6, 7, 12, 3, 202, 1, 2, 'Green Valley Apartments', FALSE, NULL, FALSE, FALSE, NULL, NULL, FALSE);

-- CLIENTS
INSERT INTO Luxville.CLIENT (
    EXTERNALUSER_ID,
    USER_ID,
    NEED_PROPERTY_FEATURES,
    PROVIDE_PROPERTY_FEATURES
)
VALUES
(6,11, '3 bedrooms, 2 bathrooms', NULL),
(7,12, '2 bedrooms, 1 bathroom', NULL),
(8,13, '4 bedrooms, 3 bathrooms', NULL),
(9,14, '1 bedroom, 1 bathroom', NULL),
(10,15, '3 bedrooms, 2 bathrooms', NULL);

-- APPOINTMENTS
INSERT INTO Luxville.APPOINTMENT (
    CLIENT_ID,
    CLIENT_EXTERNALUSER_ID,
    CLIENT_USER_ID,
    SYSTEMUSER_ID,
    USER_ID,
    PROPERTY_ID,
    OWNER_ID,
    OWNER_EXTERNALUSER_ID,
    OWNER_USER_ID,
    SCHEDULED_TIME,
    STATUS
)
VALUES
(1, 6, 11, 1, 1, 'PROP123', 1, 3, 8, NOW(), 0),
(2, 7, 12, 2, 2, 'PROP456', 2, 4, 9, NOW(), 0);

-- BUYERS
INSERT INTO Luxville.BUYER (
    EXTERNALUSER_ID,
    USER_ID,
    BUYER_SSN,
    BUYER_AREA
)
VALUES
(1, 6, '123-45-6789', 'New York');


-- DEALS
INSERT INTO Luxville.DEAL (
    SYSTEMUSER_ID,
    USER_ID,
    BUYER_ID,
    BUYER_EXTERNALUSER_ID,
    BUYER_USER_ID,
    SELLER_ID,
    SELLER_EXTERNALUSER_ID,
    SELLER_USER_ID,
    DEAL_DATE
)
VALUES
(1, 1, 1, 1, 6, 1, 2, 7, NOW());

-- SELLING DEALS
INSERT INTO Luxville.SELLING_DEAL (
    SYSTEMUSER_ID,
    USER_ID,
    BUYER_ID,
    BUYER_EXTERNALUSER_ID,
    BUYER_USER_ID,
    SELLER_ID,
    SELLER_EXTERNALUSER_ID,
    SELLER_USER_ID,
    DEAL_ID,
    PAYMENT_TYPE,
    NEGOTIABLE,
    OWNERSHIP_TYPE,
    PROPERTY_TITLE_DEED,
    LEGAL_CLEARANCE,
    FINAL_PRICE,
    ASKING_PRICE,
    PAID_AMOUNT,
    COMMISSION_RATE
)
VALUES
(1, 1, 1, 1, 6, 1, 2, 7, 1, 'Cash', TRUE, 'Freehold', 'Title Deed Document', TRUE, 4700000.00, 5000000.00, 3500000.00, 0.001);

-- TRANSACTIONS
INSERT INTO Luxville.TRANSACTION (
    TRANSACTION_ID
)
VALUES
(1);

-- REVENUES
INSERT INTO Luxville.REVENUE (
    DEAL_ID,
    SYSTEMUSER_ID,
    USER_ID,
    BUYER_ID,
    BUYER_EXTERNALUSER_ID,
    BUYER_USER_ID,
    SELLER_ID,
    SELLER_EXTERNALUSER_ID,
    SELLER_USER_ID,
    TRANSACTION_ID,
    DESCRIPTION,
    AMOUNT,
    RECORDED_AT
)
VALUES
(1, 1, 1, 1, 1, 6, 1, 2, 7, 1, 'Commission from sale', 4700.00, NOW());
-- EXPENSES
INSERT INTO Luxville.EXPENSE (
    TRANSACTION_ID,
    SYSTEMUSER_ID,
    USER_ID,
    DESCRIPTION,
    AMOUNT
)
VALUES
(1, 1, 1, 'Office supplies', 200.00),
(1, 1, 1, 'Marketing expenses', 500.00),
(1, 1, 1, 'Travel expenses', 300.00);

-- AUDITLOGS
INSERT INTO Luxville.AUDITLOG (
    USER_ID,
    SYSTEMUSER_ID,
    ACTION,
    LOGGED_AT
)
VALUES
(1, 1, 'User created', NOW()),
(2, 2, 'User updated', NOW()),
(3, 4, 'User deleted', NOW()),
(4, 3, 'Role assigned', NOW()),
(5, 5, 'Permission granted', NOW());
