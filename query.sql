CREATE DATABASE IF NOT EXISTS accounts;
USE accounts;
CREATE TABLE gegevens (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    GebruikersNaam VARCHAR(50) NOT NULL,
    Wachtwoord CHAR(50) NOT NULL
)
////////////
DROP DATABASE IF EXISTS accounts;
CREATE DATABASE accounts;
USE accounts;
CREATE TABLE gegevens (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    GebruikersNaam VARCHAR(50) NOT NULL,
    Wachtwoord CHAR(50) NOT NULL
)