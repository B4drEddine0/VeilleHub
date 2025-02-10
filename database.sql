CREATE DATABASE veilleHub;
USE veilleHub;

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student','teacher') DEFAULT 'student',
    status ENUM('pending', 'active', 'inactive') DEFAULT 'pending',
);

CREATE TABLE subjects (
    sub_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    suggested_by INT,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    FOREIGN KEY (suggested_by) REFERENCES users(user_id)
);

CREATE TABLE presentations (
    present_id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT,
    presentation_date DATETIME NOT NULL,
    status ENUM('scheduled', 'completed', 'cancelled') DEFAULT 'scheduled',
    FOREIGN KEY (subject_id) REFERENCES subjects(sub_id)
);

CREATE TABLE presentation_participants (
    particip_id INT PRIMARY KEY AUTO_INCREMENT,
    presentation_id INT,
    user_id INT,
    FOREIGN KEY (presentation_id) REFERENCES presentations(present_id) on delete cascade,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE notifications (
    notif_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    status ENUM('pending', 'sent', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
