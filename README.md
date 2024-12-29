# Expense tracker - Laravel Vue Application

This is a Laravel and Vue.js application designed for tracking expenses and managing categories. This README provides instructions on how to set up and run the project locally.

## Features

- User authentication using Laravel Fortify
- CRUD operations for expenses and categories
- Responsive design with Vue.js and Tailwind CSS

## Prerequisites

Make sure you have the following installed:

- PHP (>= 7.3)
- Composer
- Node.js (>= 12.x)
- NPM

## Installation

Follow these steps to get your development environment set up:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/MuhammadAnasP/Expense-tracker.git
   cd your-repo-name
2. **Install PHP dependencies**:
   ```bash
   composer install
4. **Install Node.js dependencies**:
   ```bash
   npm install
6. **Generate an application key**:
   ```bash
   php artisan key:generate
8. **Set up your database**:
   Create a new database in your preferred database management system.
   Update your .env file with the appropriate database configuration (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
9. **Run migrations**:
   ```bash
   php artisan migrate
10. **Compile the assets**:
    ```bash
    npm run dev
11. **Start the server**:
    ```bash
    php artisan serve

