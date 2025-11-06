<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🏢 Laravel Company Management System

This is a simple Laravel-based Company Management application.  
It includes **user authentication (without any package)** and full **CRUD functionality** for managing companies, with dependent dropdowns for Country → State → City and multi-select services/branches.

---

## 🚀 Features

### 🔐 Authentication (Custom)
- User Registration (Sign Up)
- User Login / Logout
- Passwords encrypted using `bcrypt`
- Middleware-protected routes

### 🏢 Company Management (CRUD)
- Add / Edit / Delete / View Company
- Upload Company Logo
- Fields include:
  - Company Name  
  - Email  
  - Mobile  
  - Services (multiple select)  
  - Country → State → City (dependent dropdowns)  
  - Branches (checkbox - multiple select)
- View details in a **Bootstrap modal popup**
- Responsive UI built with Bootstrap 5

---

## 🧰 Tech Stack

- **Laravel 10**
- **PHP 8.1+**
- **MySQL / MariaDB**
- **Bootstrap 5**
- **jQuery 3.6**
- **AJAX**

---

## ⚙️ Project Setup

Follow the steps below to set up and run the project locally.

---

### 1️⃣ Clone Repository
```bash
git clone https://github.com/your-username/company-management.git
cd company-management

--- 

### 2️⃣ Install Dependencies
```bash
composer install

3️⃣ Copy Environment File
bash

cp .env.example .env
4️⃣ Generate Application Key
bash

php artisan key:generate
5️⃣ Configure Database
Open .env and update your database credentials:

env

DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
6️⃣ Run Migrations
bash

php artisan migrate
7️⃣ Link Storage (for logo uploads)
bash

php artisan storage:link
8️⃣ Start Development Server
bash

php artisan serve
Now open your browser and go to:
👉 http://127.0.0.1:8000

🗂️ Important Folder Structure
Path	Description
routes/web.php	All web routes (Auth + Company CRUD)
app/Models/User.php	User model for authentication
app/Models/Company.php	Company model with fillable fields
app/Http/Controllers/AuthController.php	Handles login, register, and logout
app/Http/Controllers/CompanyController.php	Handles all company CRUD logic
resources/views/auth/	Login & Register views
resources/views/companies/	Company CRUD views
resources/views/layouts/app.blade.php	Master layout (Bootstrap, JS, etc.)
public/storage/logos/	Uploaded company logos

🔗 Routes Summary
Method	URI	Action	Description
GET	/register	AuthController@showRegisterForm	Display registration page
POST	/register	AuthController@register	Register new user
GET	/login	AuthController@showLoginForm	Display login page
POST	/login	AuthController@login	Authenticate user
GET	/logout	AuthController@logout	Logout user
GET	/companies	CompanyController@index	List all companies
GET	/companies/create	CompanyController@create	Show create form
POST	/companies	CompanyController@store	Store new company
GET	/companies/{id}/edit	CompanyController@edit	Edit company
PUT	/companies/{id}	CompanyController@update	Update company
DELETE	/companies/{id}	CompanyController@destroy	Delete company
GET	/companies/{id}/view	CompanyController@view	Fetch company details (AJAX)

🧠 Notes
No authentication packages like Breeze or Jetstream are used.

Authentication handled manually with sessions and hashing.

The modal popup uses Bootstrap 5’s JS (bootstrap.bundle.min.js).

Countries, states, and cities are fetched via AJAX.

Services and branches are stored as JSON arrays.

🪶 Example .env File
env

APP_NAME="Company Management"
APP_ENV=local
APP_KEY=base64:generated_key_here
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=company_db
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public
🧑‍💻 Common Artisan Commands
Command	Purpose
composer install	Install dependencies
php artisan migrate	Run migrations
php artisan serve	Start local server
php artisan storage:link	Create public storage link
php artisan key:generate	Generate app key

🎯 Future Enhancements
Add Role-Based Access Control (Admin/User)

Add pagination and filters to company list

Export company data to Excel / PDF

Implement image optimization for logos

👩‍💻 Author
Mansi Thakkar
🛠️ Laravel Developer | PHP Enthusiast
📧 mansithakkar2699@gmail.com
🔗 https://www.linkedin.com/in/mansithakkar-17463521a/

📝 License
This project is open-source and available for modification or extension.