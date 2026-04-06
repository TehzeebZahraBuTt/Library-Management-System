# Library Management System

## Overview

This project is a web-based **Library Management System** built with PHP and MySQL. It provides separate areas for administrators/librarians and users to manage books, members, borrow requests, issued books, categories, profiles, and related library operations.

## Tech Stack

- **Backend:** PHP
- **Database:** MySQL
- **Web server:** Apache
- **Frontend:** HTML, CSS, JavaScript
- **UI libraries:** Bootstrap, Bootstrap Select, Font Awesome
- **Dynamic behavior:** jQuery, AJAX
- **Charts/visuals:** Chart.js and related admin assets
- **Local development environment:** XAMPP

## Features

- Admin/librarian dashboard
- Add, edit, view, and delete books, members, librarians, and categories
- Borrow request and issued book management
- Book status and availability tracking
- User registration and login
- User book browsing, borrowing, return, and profile pages
- AJAX-based interactions for selected pages

## Project Structure

```text
Library-Project/
├── db_lms.sql                 # Database schema and initial data
├── README.md                  # Project documentation
├── Admin/                     # Admin and librarian dashboard pages
│   ├── add-book.php
│   ├── add-member.php
│   ├── add-librarian.php
│   ├── view-books.php
│   ├── view-members.php
│   ├── view-librarians.php
│   ├── lib_Librarian-dashboard.php
│   └── ...
├── Login/                     # Authentication and public/user-facing pages
│   ├── user-login.php
│   ├── user-registration.php
│   ├── SignUpAjax.php
│   └── User/
│       ├── Home.php
│       ├── Browse-books.php
│       ├── Borrow-book.php
│       ├── my-books.php
│       └── ...
└── User/                      # User-side assets and vendor files
	 └── vendor/
```

### Key Folders

- **`Admin/`** — contains the librarian/admin workflow, dashboard, CRUD pages, and management utilities.
- **`Login/`** — contains login/registration pages and the user portal.
- **`Login/User/`** — contains the user dashboard pages for browsing books, borrowing, returning, and account management.
- **`db_lms.sql`** — database export used to create the application schema.

## Deployment Guide

### Prerequisites

- PHP 7.4 or newer
- MySQL or MariaDB
- Apache web server
- XAMPP, WAMP, or a similar local server stack

### Local Deployment Steps

1. **Copy the project** into your web server directory.
	- For XAMPP, place it inside `htdocs`.
	- Example path: `C:\xampp\htdocs\Library-Project`

2. **Start Apache and MySQL** from the XAMPP/WAMP control panel.

3. **Create the database**
	- Open phpMyAdmin.
	- Create a new database named `db_lms`.

4. **Import the SQL file**
	- Open the `db_lms.sql` file in phpMyAdmin import.
	- Import it into the `db_lms` database.

5. **Check database credentials**
	- The project connects with:
      -FOR ADMIN
	  - host: `localhost`
	  - user: `admin`
	  - password: admin123
	  - database: `db_lms`
	- If your local setup uses different credentials, update the connection details in the PHP files accordingly.

6. **Open the project in your browser**
	- Use the local URL for the project folder, for example:
	  - `http://localhost/Library-Project/`
	- If the root page is not a landing page, open the login or user page directly, such as:
	  - `http://localhost/Library-Project/Login/user-login.php`

## Notes

- This project is designed for a classic PHP/MySQL stack and is best run in a local server environment like XAMPP.
- Many pages rely on direct database connections, so importing `db_lms.sql` is required before using the application.

## License

No license information was provided with the project.