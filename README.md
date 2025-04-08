# 🚨 Secure Incident Reporting System (PHP + MySQL)

A simple, secure, and scalable Incident Reporting System built using PHP, MySQL, Bootstrap, and JavaScript. It includes features like user authentication, role-based access control (RBAC), incident submission, filtering, dashboards, and audit logging.

## 📁 Folder Structure


## 🧑‍💼 Roles

- **User**: Can submit incidents and view only their own reports.
- **Admin**: Can manage all incidents and view dashboard analytics.
- **Super Admin**: Manages users, roles, and can delete incidents permanently.

## 🔐 Features

- Secure login system using PHP Sessions (JWT placeholder available for enhancement)
- RBAC (Role-Based Access Control)
- Submit incidents with file upload
- Dashboards with real-time incident analytics
- Audit trail and logs (admin activity)
- Super Admin panel for user management

## 🧰 Technologies Used

- PHP (MySQLi)
- MySQL
- Bootstrap
- JavaScript (AJAX)
- Chart.js (for admin dashboard charts)

---

## 🛠️ Setup Instructions

1. **Clone this Repository**
   ```bash
   git clone https://github.com/banothanilnayak/Incident_Reporting_System


mysql schema
--------------

CREATE DATABASE incident_system;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('user', 'admin', 'superadmin') DEFAULT 'user',
    is_blocked TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Incidents table
CREATE TABLE incidents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    category ENUM('Phishing', 'Malware', 'Ransomware', 'Unauthorized Access', 'Other'),
    priority ENUM('Low', 'Medium', 'High'),
    status ENUM('Open', 'In Progress', 'Resolved') DEFAULT 'Open',
    evidence VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Logs table (Audit)
CREATE TABLE audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(255),
    performed_by INT,
    incident_id INT,
    ip_address VARCHAR(50),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (performed_by) REFERENCES users(id),
    FOREIGN KEY (incident_id) REFERENCES incidents(id)
);

**** COULDNT IMPLEMENT AUTH WITH JWT AS IAM NOT FIMILIAR IN CORE PHP.***
**** HAHA HOPE YOU LIKE THIS SIMPLE PROJECT ***** 

****************THANK YOU *************


**BANOTH ANIL *****