# E-Commerce Management System Project

## Description
This project is a **E-Commerce Management System** built with **Laravel 10** that provides a **RESTful API** for Show Products, User Orders and Place an order. It allows admins to perform **CRUD operations** (Create, Read, Update, Delete) on products,categories with the ability to filter Products by **Category** and search them by **product name**, **View, Change status** on orders, And **View** on users with the ability to search them by **user name**.

### Key Features:
- **CRUD Operations**: Create, read, update, and delete Products and Categories in the dashboard.
- **Filtering and Searching**: Filter product by category, search them by product name.
- **Form Requests**: Validation is handled by custom form request classes.
- **Resources**: API responses are formatted using Laravel resources for a consistent structure.
- **Seeders**: Populate the database with initial data for testing and development.

### Technologies Used:
- **Laravel 10**
- **PHP**
- **MySQL**
- **XAMPP** (for local development environment)
- **Composer** (PHP dependency manager)
- **Postman Collection**: Contains all API requests for easy testing and interaction with the API.

---

## Installation

### Prerequisites

Ensure you have the following installed on your machine:
- **XAMPP**: For running MySQL and Apache servers locally.
- **Composer**: For PHP dependency management.
- **node.js**: For install all the dependencies listed in **package.json** file.
- **PHP**: Required for running Laravel.
- **MySQL**: Database for the project
- **Postman**: Required for testing the requestes.

### Steps to Run the Project

1. Clone the Repository  
   ```bash
   git clone https://github.com/BsHeR4/E-Commerce.git
2. Navigate to the Project Directory
   ```bash
   cd e-commerce
3. Install Dependencies
   ```bash
   composer install
   npm install
4. Create Environment File
   ```bash
   cp .env.example .env
   Update the .env file with your database configuration (MySQL credentials, database name, etc.).
5. Generate Application Key
    ```bash
    php artisan key:generate
6. Run Migrations
    ```bash
    php artisan migrate
7. Seed the Database
    ```bash
    php artisan db:seed
8. Run the Application
    ```bash
    php artisan serve
    npm run dev
9. Interact with the API and test the various endpoints via Postman collection 
    Get the collection from here: https://www.postman.com/bsher4/workspace/projects/collection/33882685-4c2f09bf-da3d-4f06-b7e2-6a7dd42e2759?action=share&creator=33882685
