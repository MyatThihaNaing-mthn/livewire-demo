# Livewire Demo User Management

This project is a Laravel application using Livewire for user management.

## Requirements

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL or other supported database

## Setup Instructions

1. **Clone the repository**
   ```sh
   git clone <your-repo-url>
   cd livewire-demo
   ```

2. **Install dependencies**
   ```sh
   composer install
   npm install
   ```

3. **Copy and configure environment file**
   ```sh
   cp .env.example .env
   ```
   Edit `.env` and set your database credentials.

4. **Generate application key**
   ```sh
   php artisan key:generate
   ```

5. **Run migrations and seed database**
   ```sh
   php artisan migrate --seed
   ```
   Or, to reset and seed:
   ```sh
   php artisan migrate:fresh --seed
   ```

6. **Start the development server**
   ```sh
   php artisan serve
   ```

7. **Build frontend assets**
   ```sh
   npm run dev
   ```

## Modules

This project uses [nwidart/laravel-modules](https://nwidart.com/laravel-modules/) for modular development.  
To create a new module:
```sh
php artisan module:make ModuleName
```



## Troubleshooting

- If you encounter autoload or class not found errors, run:
  ```sh
  composer dump-autoload
  ```
- Ensure all seeders are in `database/seeders` and have the correct namespace.

## Useful Commands

- **Module commands:**  
  ```sh
  php artisan module:list
  php artisan module:seed ModuleName
  ```

##