CREATE DATABASE IF NOT EXISTS student_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE student_db;

CREATE TABLE IF NOT EXISTS student (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    date DATE NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO student (name, contact, date) VALUES
('Yash Patel', '9876543210', '2026-09-29'),
('Rahul Shah', '9876543211', '2026-09-29'),
('Amit Patel', '9876543212', '2026-09-29');