-- Database Schema for Phishing Awareness Simulation
-- Suitable for importing into phpMyAdmin/MySQL

CREATE DATABASE IF NOT EXISTS `phishing_awareness`;
USE `phishing_awareness`;

-- 1. Participants Table
-- Stores user information and their quiz results
CREATE TABLE IF NOT EXISTS `participants` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `quiz_score` INT DEFAULT NULL,
    `risk_level` VARCHAR(20) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Simulation Logs Table
-- Logs interactions with the fake login page WITHOUT storing passwords
CREATE TABLE IF NOT EXISTS `simulation_logs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `event_type` VARCHAR(50) NOT NULL, -- e.g., 'simulation_click', 'page_view'
    `user_email_used` VARCHAR(150) NULL, -- Educational: Shows what they *tried* to use
    `ip_address` VARCHAR(45) NULL,       -- Basic tracking (optional, kept simple for student project)
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Data for Admin Dashboard Testing
INSERT INTO `participants` (`name`, `email`, `quiz_score`, `risk_level`) VALUES
('Alice Smith', 'alice@example.com', 9, 'Safe User'),
('Bob Jones', 'bob@example.com', 4, 'High Risk'),
('Charlie Brown', 'charlie@example.com', 6, 'Medium Risk'),
('Diana Prince', 'diana@example.com', 10, 'Safe User'),
('Evan Davis', 'evan@example.com', 2, 'High Risk');

INSERT INTO `simulation_logs` (`event_type`, `user_email_used`, `ip_address`) VALUES
('simulation_login_attempt', 'student1@university.edu', '192.168.1.101'),
('simulation_login_attempt', 'faculty2@university.edu', '192.168.1.105'),
('simulation_login_attempt', 'admin@example.com', '10.0.0.55');
