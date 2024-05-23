CREATE DATABASE attendance_system;

USE attendance_system;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    date DATE NOT NULL,
    status BOOLEAN NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(id)
);
