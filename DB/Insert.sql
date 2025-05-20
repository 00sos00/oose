-- USER
INSERT INTO Luxville.USER (FIRST_NAME, LAST_NAME, COUNTRY_CODE, PHONE_NUMBER)
VALUES
-- system users
('System', 'Admin', '+1', '5551000001'),
('System', 'User', '+44', '5551000003'),
('System', 'Guest', '+91', '5551000005'),
('System', 'Manager', '+20', '5551000007'),
('System', 'Operator', '+33', '5551000009'),
-- external users
('John', 'Doe', '+81', '5551000011'),
('Jane', 'Smith', '+49', '5551000013'),
('Alice', 'Johnson', '+61', '5551000015'),
('Bob', 'Brown', '+39', '5551000017'),
('Charlie', 'Davis', '+86', '5551000019'),
('Eve', 'Wilson', '+34', '5551000021'),
('Frank', 'Garcia', '+7', '5551000023'),
('Grace', 'Martinez', '+82', '5551000025'),
('Hank', 'Lopez', '+31', '5551000027'),
('Ivy', 'Gonzalez', '+41', '5551000029');

-- ROLES
INSERT INTO Luxville.ROLE (
    ROLE_NAME,
    CAN_IMPORT_EXPORT_TRANSACTIONS,
    CAN_VIEW_TRANSACTIONS,
    CAN_EDIT_TRANSACTIONS,
    CAN_DELETE_USER,
    CAN_CREATE_TRANSACTIONS,
    CAN_EDIT_AUDIT_LOG,
    CAN_EXPORT_AUDIT_LOG,
    CAN_MANAGE_ROLES,
    CAN_DELETE_TRANSACTIONS,
    CAN_CREATE_USER,
    CAN_EDIT_USERS,
    CAN_VIEW_AUDIT_LOG
)
VALUES
-- Admin
('Admin', TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE),
-- Viewer
('Viewer', FALSE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, TRUE),
-- Accountant
('Accountant', TRUE, TRUE, TRUE, FALSE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE),
-- Manager
('Manager', TRUE, TRUE, TRUE, FALSE, TRUE, TRUE, FALSE, TRUE, FALSE, FALSE, FALSE, FALSE),
-- Operator
('Operator', TRUE, TRUE, TRUE, FALSE, TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE);

-- SYSTEM_USER
INSERT INTO Luxville.SYSTEM_USER (USER_ID, EMAIL, PASSWORD, ROLE_ID)
VALUES
(1, 'admin@gmail.com', 'admin123', 1),
(2, 'viewer@gmail.com', 'viewer123', 2),
(3, 'viewer2@gmail.com', 'viewer123', 2),
(4, 'accountant@gmail.com', 'accountant123', 4),
(5, 'manager@gmail.com', 'manager123', 5);


-- EXTERNAL_USER
INSERT INTO Luxville.EXTERNAL_USER (USER_ID, RATING)
VALUES
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
INSERT INTO Luxville.OWNER (USER_ID)
VALUES
(8),
(9),
(10),
(7),
(11),
(12);

-- SELLERS
INSERT INTO Luxville.SELLER (USER_ID, SELLER_SSN, SELLER_AREA)
VALUES
(7, '987-65-4321', 'Los Angeles');

-- PROPERTIES
INSERT INTO Luxville.PROPERTY (
    PROPERTY_ID,
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
    OWNER_ID,
    SELLER_ID
)
VALUES
('PROP123', TRUE, FALSE, 10000.00, 0.00, 1000.00, 0, 'Downtown', NOW(), 'http://example.com/media1.jpg', FALSE, NULL, NULL, NULL, NULL, NULL, 40.7128, -74.0060, 'http://example.com/address1', 8, NULL),
('PROP456', FALSE, TRUE, 2000000.00, 0.00, 10000.00, 0, 'Midtown', NOW(), 'http://example.com/media2.jpg', TRUE, 12, 3000.00, 1500.00, 3.5, NOW(), 34.0522, -118.2437, 'http://example.com/address2', 9, NULL),
('PROP789', TRUE, FALSE, 25000.00, 0.00, 1500.00, 1, 'Uptown', NOW(), 'http://example.com/media3.jpg', TRUE, 6, 5000.00, 2000.00, 4.0, NOW(), 51.5074, -0.1278, 'http://example.com/address3', 10, NULL),
('PROP867', FALSE, TRUE, 2500000.00, 0.00, 22000.00, 1, 'Uptown', NOW(), 'http://example.com/media2.jpg', TRUE, 12, 5000.00, 2000.00, 5.0, NOW(), 34.0522, -118.2437, 'http://example.com/address2', 11, NULL),
('PROP890', TRUE, FALSE, 7000.00, 0.00, 1000.00, 1, 'Suburb', NOW(), 'http://example.com/media3.jpg', TRUE, 6, 10000.00, 1500.00, 4.5, NOW(), 51.5074, -0.1278, 'http://example.com/address3', 12, NULL),
('PROP544', FALSE, TRUE, 5000000.00, 0.00, 20000.00, 1, 'Suburb', NOW(), 'http://example.com/media4.jpg', TRUE, 6, 2000.00, 1000.00, 3.5, NOW(), 51.5074, -0.1278, 'http://example.com/address4', 7, 7);

-- HOUSES
INSERT INTO Luxville.HOUSE (
    PROPERTY_ID,
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
('PROP123', 2, 3, 2, TRUE, TRUE, 2010, 'Central', 'Split', TRUE, 500.00, 'Wood', 'Gable', 'Wi-Fi', TRUE),
('PROP456', 3, 4, 1, FALSE, FALSE, 2015, 'Radiant', 'Ductless', FALSE, NULL, 'Tile', 'Flat', NULL, FALSE),
('PROP789', 2, 3, 2, TRUE, TRUE, 2018, 'Baseboard', 'Central', TRUE, 300.00, 'Carpet', 'Hip', 'Wi-Fi', TRUE);

-- APARTMENTS
INSERT INTO Luxville.APARTMENT (
    PROPERTY_ID,
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
('PROP867', 5, 101, 2, 3, 'Skyline Towers', TRUE, 200.00, TRUE, TRUE, 'City View', 'Fiber Optic', TRUE),
('PROP890', 3, 202, 1, 2, 'Green Valley Apartments', FALSE, NULL, FALSE, FALSE, NULL, NULL, FALSE);

-- CLIENTS
INSERT INTO Luxville.CLIENT (
    USER_ID,
    NEED_PROPERTY_FEATURES,
    PROVIDE_PROPERTY_FEATURES
)
VALUES
(11, '3 bedrooms, 2 bathrooms', NULL),
(12, '2 bedrooms, 1 bathroom', NULL),
(13, '4 bedrooms, 3 bathrooms', NULL),
(14, '1 bedroom, 1 bathroom', NULL),
(15, '3 bedrooms, 2 bathrooms', NULL);

-- BUYERS
INSERT INTO Luxville.BUYER (
    USER_ID,
    BUYER_SSN,
    BUYER_AREA
)
VALUES
(6, '123-45-6789', 'New York');

-- DEALS
INSERT INTO Luxville.DEAL (
    DEAL_DATE,
    BUYER_ID,
    SELLER_ID,
    AGENT_ID
)
VALUES
(NOW(), 6, 7, 1);

-- TRANSACTIONS
INSERT INTO Luxville.TRANSACTION ()
VALUES ();

-- SELLING DEALS
INSERT INTO Luxville.SELLING_DEAL (
    PAYMENT_TYPE,
    NEGOTIABLE,
    OWNERSHIP_TYPE,
    PROPERTY_TITLE_DEED,
    LEGAL_CLEARANCE,
    FINAL_PRICE,
    ASKING_PRICE,
    PAID_AMOUNT,
    COMMISSION_RATE,
    DEAL_ID
)
VALUES
('Cash', TRUE, 'Freehold', 'Title Deed Document', TRUE, 4700000.00, 5000000.00, 3500000.00, 0.001, 1);

-- REVENUES
INSERT INTO Luxville.REVENUE (
    DESCRIPTION,
    AMOUNT,
    RECORDED_AT,
    DEAL_ID,
    TRANSACTION_ID
)
VALUES
('Commission from sale', 4700.00, NOW(), 1, 1);

-- EXPENSES
INSERT INTO Luxville.EXPENSE (
    DESCRIPTION,
    AMOUNT,
    USER_ID,
    TRANSACTION_ID
)
VALUES
('Office supplies', 200.00, 1, 1),
('Marketing expenses', 500.00, 1, 1),
('Travel expenses', 300.00, 1, 1);

-- APPOINTMENTS
INSERT INTO Luxville.APPOINTMENT (
    PROPERTY_ID,
    SCHEDULED_TIME,
    STATUS,
    INITIATED_AT,
    CLIENT_ID,
    AGENT_ID
)
VALUES
('PROP123', NOW(), 0, NULL, 11, 1),
('PROP456', NOW(), 0, NULL, 12, 2);

-- AUDITLOGS
INSERT INTO Luxville.AUDITLOG (
    ACTION,
    USER_ID
)
VALUES
('User created', 1),
('User updated', 2),
('User deleted', 4),
('Role assigned', 3),
('Permission granted', 5);

-- REPORTS
INSERT INTO REPORT (
    REPORT_TITLE, REPORT_DESCRIPTION, REPORT_TYPE, REPORT_FORMAT, FILE_PATH, STATUS, GENERATED_AT, REVIEWED_AT, USER_ID
)
VALUES 
("Test Report", "This report is a test for database", "Transactions", ".pdf", "C:\\Sample\\Reports\\", 0, NOW(), NULL, 4);
