# 🚛 Transport & Freight Management System (PHP Backend)

A web-based **Transport and Freight Management System** built using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**.  
This was my **first backend project**, created to learn how data flows between users, admin, and the database.

---

## 📋 Table of Contents
- [Project Overview](#-project-overview)
- [User Features](#-user-features)
- [Admin Features](#-admin-features)
- [Technical Stack](#-technical-stack)
- [Workflow](#-workflow)
- [Learning Highlights](#-learning-highlights)
- [Known Issues](#-known-issues)
- [Future Improvements](#-future-improvements)
- [Project Structure](#-project-structure)
- [Installation & Setup](#-installation--setup)
- [Author](#-author)
- [Note](#-note)
- [Acknowledgment](#-acknowledgment)

---

## 🧾 Project Overview

The **Transport & Freight Management System** helps manage **Builty (Consignment) Forms** from submission to approval and record tracking.  
It includes both **Admin** and **User** panels for easy management of logistics workflows.

### 🎯 Objectives
- Build a working multi-user management system (Admin + Users)  
- Learn backend development with PHP and MySQL  
- Understand CRUD operations, authentication, and data flow  
- Implement form submissions and PDF export

---

## 👤 User Features

| Feature | Description |
|:--------|:-------------|
| **Registration & Login** | Users can register and log in to access their personal dashboard |
| **Dashboard** | Allows users to submit Builty forms with freight details |
| **Submitted Builty Table** | Displays all forms submitted by the user with their status |
| **Approved Forms Page** | Shows all admin-approved forms with PDF download option |
| **Profile Management** | Users can view and edit their personal information |

---

## 🧑‍💼 Admin Features

| Feature | Description |
|:--------|:-------------|
| **Pending Forms Dashboard** | Review all new Builty submissions from users |
| **Approved Forms Page** | View and manage all approved forms |
| **Registered Users Management** | View and delete user accounts |
| **Latest Enquiries** | Display contact enquiries from users |
| **Admin Profile** | View and manage admin information |

---

## ⚙️ Technical Stack

| Category | Technologies Used |
|:----------|:------------------|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | Core PHP |
| **Database** | MySQL |
| **PDF Generation** | FPDF / TCPDF Library |
| **Authentication** | PHP Sessions |

---

## 🔄 Workflow

User submits Builty Form
        ↓
Admin reviews the form
        ↓

✔️ Approved → Moves to Approved Forms
❌ Rejected → Removed from database

---

### 🧠 Learning Highlights
- Database connection and queries using PHP-MySQL.  
- Session-based authentication and dashboard logic.  
- CRUD operations and form validation  
- PDF export and server-side file generation
- Understanding user roles (Admin vs User)
- Developing real-world backend workflows

---

### 🐞 Known Issues

⚠️ These issues are from the original version of the project and are intentionally left unchanged to represent the learning stage.

- Passwords stored in plain text (no encryption) 
- No access control check for admin pages (direct URL access possible)  
- No prepared statements (SQL injection risk)  
- Minimal client and server-side validation 
- Lacks CSRF protection

---

## 🚀 Future Improvements

* Implement `password_hash()` and `password_verify()`
* Add session validation and role-based access control
* Use prepared statements for database queries
* Improve input validation and sanitization
* Integrate a modern frontend framework (Bootstrap / Tailwind)
* Adopt MVC architecture for cleaner structure

---

## 🗂️ Project Structure

    project/
    ├── config/
    ├── css/
    ├── dist/
    ├── images/
    ├── includes/
    ├── static/
    ├── stats/
    ├── vendor/
    ├── addenquiry.php
    ├── admin_approved_forms.php
    ├── admin_forms.php
    ├── admin_profile.php
    ├── approved_forms.php
    ├── authentication.php
    ├── delete_builty.php
    ├── delete_enquiry.php
    ├── delete_user.php
    ├── form.php
    ├── generate_pdf.php
    ├── index.php
    ├── latest_enquiries.php
    ├── login_authentication.php
    ├── logout.php
    ├── main.php
    ├── process_form.php
    ├── profile.php
    ├── registered_users.php
    ├── submit_builty.php
    ├── update_status.php
    ├── user_record.php
    ├── view_enquiry.php
    ├── view_record.php
    └── view_user.php

---

## 💻 Installation & Setup

Follow these steps to run the project locally on XAMPP or any PHP-supported environment:

1️⃣ Clone the Repository -> git clone https://github.com/PIYUSHPANDEY735/Transport-Frieght-Management-System.git

2️⃣ Move to XAMPP htdocs Directory -> C:\xampp\htdocs\projectfolder (Rename projectfolder to your preferred folder name.)

3️⃣ Start Apache and MySQL -> Open XAMPP Control Panel -> Start Apache and MySQL

4️⃣ Create Database -> Open phpMyAdmin -> Create a new database (e.g. transport_db)

5️⃣ Import SQL File -> Go to Import → Choose database.sql file included in the project → Click Go

6️⃣ Configure Database Connection

Edit your db.config.php file (found in config or includes folder):

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'transport_db';

7️⃣ Run the Application -> http://localhost/projectfolder/

8️⃣ Login Credentials (Passwords are stored in plain text) -> Check users or admin tables in your database for credentials

---

## 👨‍💻 Author

👨‍🦱 Piyush Pandey
📧 Email: peeyushpandey735@gmail.com
💼 Aspiring Full Stack Developer (PHP | MySQL | JavaScript)

---

## 📝 Note

This was my first backend project, built one year ago during my early PHP learning phase.
Since then, I’ve created a more advanced and secure Full Stack PHP Application, which is live here:

My Latest Full Stack PHP Project -> Multi User Application Management Portal
Project Link -> https://github.com/PIYUSHPANDEY735/Multi-User-Application-Management-Portal

---

## ⭐ Acknowledgment

Thanks to: PHP documentation, Online tutorials and communities and lastly LLM Models like Chatgpt , Claude etc.
