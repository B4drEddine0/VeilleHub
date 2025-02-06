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
    FOREIGN KEY (presentation_id) REFERENCES presentations(present_id),
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

-- Create subject_suggestions table
CREATE TABLE IF NOT EXISTS subject_suggestions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    student_id INT NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create subjects table
CREATE TABLE IF NOT EXISTS subjects_new (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create presentations table
CREATE TABLE IF NOT EXISTS presentations_new (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_id INT NOT NULL,
    student_id INT NOT NULL,
    presentation_date DATETIME NOT NULL,
    status ENUM('scheduled', 'completed', 'cancelled') DEFAULT 'scheduled',
    feedback TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (subject_id) REFERENCES subjects_new(id),
    FOREIGN KEY (student_id) REFERENCES users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
