# HighNox System

## Environment Setup

The project is built on Laravel 5.5 and requires minimum PHP 7.1.x version and MySQL 5.1.x version. If you are going to use XAMPP, make sure to download the XAMPP which has PHP 7.1.x version.

The project already contains the Database Migrations and Seeds for the tables. Follow these steps for project setup

- Make sure you have latest version of PHP Composer installed.
- Clone this repository
- Rename .env.example file to .env
- Configure the database settings
- Run the below command to generate APP Secret Key
```    
php artisan key:generate
```
- Run the below command to run the migrations
```
php artisan migrate
```
- Run the below command to seed the database for supportive entities
```
php artisan db:seed
```

Thats it!