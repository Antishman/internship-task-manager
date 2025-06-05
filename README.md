# Internship Task Manager

This is a simple task manager API built with Laravel 10. It allows you to manage tasks using RESTful API endpoints.

## Requirements

- PHP 8.1 or higher
- Composer
- SQLite (used as the database)

## Setup Instructions

1. Clone the project.
2. Run `composer install`.
3. Create a `.env` file and set up SQLite:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```
4. Create the SQLite database file:
   ```
   touch database/database.sqlite
   ```
5. Run migrations:
   ```
   php artisan migrate
   ```
6. Start the server:
   ```
   php artisan serve
   ```

## API Endpoints

- `GET /api/tasks` - List all tasks. You can add `?status=completed` or `?status=pending` to filter.
- `POST /api/tasks` - Add a task. Requires a `title`.
- `PUT /api/tasks/{id}` - Mark a task as completed.
- `DELETE /api/tasks/{id}` - Delete a task.

## Test With Postman

You can use Postman to test all the endpoints by sending requests to:
```
http://127.0.0.1:8000/api/tasks
```

## Notes

- There's no frontend, just an "API is running" HTML page at `/`.
- Data is stored using SQLite in a local file.

That's it!
