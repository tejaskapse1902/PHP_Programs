CREATE DATABASE company;
USE company;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    designation VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    salary DECIMAL(10,2) NOT NULL
);
