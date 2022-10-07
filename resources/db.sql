-- Database creation
DROP DATABASE IF EXISTS mvc_basics;
CREATE DATABASE IF NOT EXISTS mvc_basics;
USE mvc_basics;

-- Creation of the tables

CREATE TABLE subscriber(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
brand VARCHAR(25),
model VARCHAR(25),
plate VARCHAR(25),
year VARCHAR(4) NOT NULL,
color VARCHAR(25)
);

CREATE TABLE reserved(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
brand VARCHAR(25),
model VARCHAR(25),
plate VARCHAR(25),
year VARCHAR(4) NOT NULL,
color VARCHAR(25)
);

-- Insert of data

INSERT INTO subscriber (brand, model, plate, year, color)
VALUES
("Audi", "RS6", "RS6AND", 2022, "Black"),
("Honda", "S2000", "7072K", 2000, "Grey"),
("Peugeot", "106", "6596B", 2001, "White"),
("Seat", "Leon", "1701D", 2005, "Black"),
("BMW", "M3", "3456H", 2016, "Blue"),
("Honda", "Civic", "8796P", 2022, "Red");

INSERT INTO reserved (brand, model, plate, year, color)
VALUES
("Toyota", "YarisGR", "8573L", 2022, "Black"),
("Ford", "FocusRS", "9387J", 2017, "Orange"),
("BMW", "M2", "9026L", 2021, "Green");