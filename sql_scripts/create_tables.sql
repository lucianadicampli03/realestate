CREATE TABLE Property (
    address VARCHAR(50) PRIMARY KEY,
    ownerName VARCHAR(30) NOT NULL,
    price INTEGER NOT NULL
);

CREATE TABLE House (
    address VARCHAR(50),
    bedrooms INTEGER NOT NULL,
    bathrooms INTEGER NOT NULL,
    size INTEGER NOT NULL,
    FOREIGN KEY (address) REFERENCES Property(address)
);

CREATE TABLE BusinessProperty (
    address VARCHAR(50),
    type CHAR(20) NOT NULL,
    size INTEGER NOT NULL,
    FOREIGN KEY (address) REFERENCES Property(address)
);

CREATE TABLE Firm (
    id INTEGER PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    address VARCHAR(50) NOT NULL
);

CREATE TABLE Agent (
    agentId INTEGER PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phone CHAR(12) NOT NULL,
    firmId INTEGER NOT NULL,
    dateStarted DATE NOT NULL,
    FOREIGN KEY (firmId) REFERENCES Firm(id)
);

CREATE TABLE Listings (
    mlsNumber INTEGER PRIMARY KEY,
    address VARCHAR(50),
    agentId INTEGER NOT NULL,
    dateListed DATE NOT NULL,
    FOREIGN KEY (address) REFERENCES Property(address),
    FOREIGN KEY (agentId) REFERENCES Agent(agentId)
);

CREATE TABLE Buyer (
    id INTEGER PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phone CHAR(12) NOT NULL,
    propertyType CHAR(20) NOT NULL,
    bedrooms INTEGER,
    bathrooms INTEGER,
    businessPropertyType CHAR(20),
    minimumPreferredPrice INTEGER,
    maximumPreferredPrice INTEGER
);

CREATE TABLE Works_With (
    buyerId INTEGER,
    agentId INTEGER,
    PRIMARY KEY (buyerId, agentId),
    FOREIGN KEY (buyerId) REFERENCES Buyer(id),
    FOREIGN KEY (agentId) REFERENCES Agent(agentId)
);
