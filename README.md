# Anonymous Posting Website

A Laravel-based web application that allows *anyone to post anonymously* without needing an account. Posts are reviewed by an *admin via a protected dashboard* before being published. Built with Laravel Breeze, HTML, and CSS.

---

## Features

- *Anonymous Posting* – Public users can submit posts with no login or registration.
- *Moderation Panel* – Admin can:
  - View all *pending posts*
  - *Accept* posts (to publish them)
  - *Reject* posts (to discard them)
- *Admin Authentication* – Secured via Laravel Breeze

---

## Tech Stack

- *Framework*: Laravel 10.x
- *Frontend*: Blade, HTML, CSS
- *Auth*: Laravel Breeze
- *Database*: SQLite

---

## Installation Guide

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/anonymous-posting.git
cd anonymous-posting

- Installing Dependencies -
composer install
npm install && npm run dev

- Configure environment -
cp .env.example .env
php artisan key:generate

- Setting up the database -
php artisan migrate

- Run the application -
php artisan serve
github.com

