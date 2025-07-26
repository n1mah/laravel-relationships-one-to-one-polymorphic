<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo">
  </a>
</p>

# Laravel One-to-One Polymorphic Relations
```( Laravel 12 )```
>A robust Laravel 12 project demonstrating a clean implementation of **one-to-one polymorphic relationships** with comprehensive features including image upload, validation rules, and service layers.



---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Requirements](#requirements)
- [Image Upload Service](#image-upload-service)
- [Routing](#routing)
- [License](#license)
- [Connect with Me](#Connect-with-Me)

---

## Overview

This project is built on Laravel 12 and showcases how to implement a **polymorphic one-to-one relationship** between models (`User`, `Post`, `Image`). It includes:

- Polymorphic image association with `User` and `Post` models.
- Dedicated service class for handling image uploads with disk and directory abstraction.
- Modular validation rules split into reusable classes.
- RESTful resource controllers for managing CRUD operations.
- Blade templates for frontend CRUD interfaces.
- Use of Laravel’s form requests for clean validation.

---

## Features

- **One-to-One Polymorphic Relationship** between models and images.
- **Image upload management** using Laravel’s filesystem and a dedicated service.
- **Robust validation** with context-aware rules (`create` vs `update`).
- **Clean, maintainable codebase** with separation of concerns.
- **Storage linking** for public access to uploaded files.
- **Resourceful routing** and controller actions.
- Easily extendable for additional models or functionality.

---


## Installation

```bash


composer install

cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan storage:link

php artisan serve

```


---

## Usage

- Access the application at http://localhost:8000 after running the server.
- Use the resource routes to manage posts and users, including image uploads.
- Use the provided Blade views for creating, editing, listing, and showing records.


---


## Project Structure

````

app/
├── Http/
│   ├── Controllers/
│   │   ├── PostController.php
│   │   └── UserController.php
│   ├── Requests/
│   │   ├── StorePostRequest.php
│   │   ├── UpdatePostRequest.php
│   │   ├── StoreUserRequest.php
│   │   └── UpdateUserRequest.php
├── Models/
│   ├── Image.php
│   ├── Post.php
│   └── User.php
├── Rules/
│   ├── Common/
│   │   └── ImageRules.php
│   ├── PostRules.php
│   └── UserRules.php
├── Services/
│   └── ImageService.php
routes/
└── web.php
resources/
└── views/
````
---


## Requirements

- PHP >= 8.3
- Laravel 12.x
- Composer
- Database (MySQL)

---

## Image Upload Service
ImageService encapsulates upload logic:

>Stores the file on the configured disk (public by default).
> 
>Saves image record with polymorphic relation to the associated model.
> 
>Handles file path and storage location abstractly for flexibility.

---

## Routing
Resourceful routes are defined for easy CRUD operations:

```php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);
```

---

## Image Upload Service
ImageService encapsulates upload logic:

Stores the file on the configured disk (public by default).

Saves image record with polymorphic relation to the associated model.

Handles file path and storage location abstractly for flexibility.

---
## License
>This project is open-source and free to use.

---
## Connect with Me

You can find more of my work or get in touch through the links below:

🔗 GitHub: [`https://github.com/n1mah`](https://github.com/n1mah)

🌐 Portfolio: [`88nima.com`](https://88nima.com/)

---
