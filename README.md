# Laravel Vue Application

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
   git clone https://github.com/yourusername/your-repo-name.git
   cd your-repo-name
2. **Install PHP dependencies**:
   composer install
3. **Install Node.js dependencies**:
   npm install
4. **Generate an application key**:
   php artisan key:generate
5. **Set up your database**:
   Create a new database in your preferred database management system.
   Update your .env file with the appropriate database configuration (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
6. **Run migrations**:
   php artisan migrate
7. **Compile the assets**:
   npm run dev
   # or for production
   npm run build
8. **Start the server**:
   php artisan serve

