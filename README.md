# CYS IDEA

An Arabic student planner built independently by Ali Bin Muraitan with Laravel and Blade. The app keeps lecture schedules, daily tasks, and exam dates in one place and stores entries in a relational database.

## What the app supports

| Area | What you can do |
| --- | --- |
| Lectures | Add and view a subject, weekday, and start and end times. |
| Daily tasks | Add and view tasks from the planner. |
| Exams | Add and view entries in the exam schedule. |

## Stack

- PHP 8.2 or newer and Laravel 11
- Blade templates, CSS, and JavaScript
- Eloquent models and database migrations
- SQLite for the local setup below

## Run locally

Install PHP with the PDO SQLite extension and Composer. From this directory, install dependencies and create the local environment file.

```bash
composer install
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate
php artisan serve --host=127.0.0.1 --port=8000
```

On Windows PowerShell, use `Copy-Item .env.example .env` to create the environment file. Open `http://127.0.0.1:8000` and add sample entries from the planner pages. The migrations create a fresh database. The application pages load their CSS and JavaScript from `public/`.

## Scope

This version is a local student project. The planner pages share one database and do not separate entries by user account.
