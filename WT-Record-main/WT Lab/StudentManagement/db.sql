-- Create the database
CREATE DATABASE IF NOT EXISTS admission;

-- Use the database
USE admission;

-- Create the students table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    fathers_name VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    date_of_birth DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    course VARCHAR(20) NOT NULL,
    country VARCHAR(50) NOT NULL,
    feepayment BOOLEAN DEFAULT FALSE,
    due_date DATE DEFAULT (CURRENT_DATE + INTERVAL 2 DAY)
);

-- Create the transaction table
CREATE TABLE IF NOT EXISTS transaction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL
);

CREATE TABLE contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



SELECT *FROM STUDENTs;
SELECT *FROM TRANSACTION;

SELECT *FROM contact_submissions;

UPDATE students
SET due_date = '2023-12-04'
WHERE phone_number = 1234567891;
