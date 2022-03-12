<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# MairaPass

## Info

Manage and store your password. Generate secure and random passwords and see their security level (PRO version).

Developed by David Jiménez as a Certificate of Higher Education end project.

## Setup

### 1

Installing Node and Composer dependencies.

`
npm install
`

`
composer update
composer install
`

### 2

Setup .env file.

- Create .env file in root
- Set default variables:
APP_DEBUG=true
APP_ENV=local
APP_KEY=key
DATABASE_URL
- config/database.php configure with Database access
- Be sure you have postgreSQL extension activate in php.ini
  
### 3

Start server and develope, GL!

`
php artisan serve
`