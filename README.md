# South End School Laravel Application

This repository contains the source code for the South End School website and administration system, built using the [Laravel](https://laravel.com/) framework (PHP 8+) along with a mix of frontend assets powered by Vite.

## 📌 Project Structure

- **app/**: Application source (models, controllers, middleware, providers).
- **bootstrap/**: Framework bootstrap files.
- **config/**: Laravel configuration files.
- **database/**: Migrations, factories, and seeders.
- **public/**: Web-accessible entrypoint and assets.
- **resources/**: Views, CSS, JS for the frontend.
- **routes/**: Route definitions (web.php, admin.php, console.php).
- **tests/**: PHPUnit tests (Feature and Unit).

## 🚀 Getting Started

Follow these steps to set up the project locally:

1. **Clone the repository**
   ```bash
   git clone <repo-url> south-end-scl
   cd south-end-scl
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies & build assets**
   ```bash
   npm install
   npm run dev   # or npm run build for production
   ```

4. **Environment configuration**
   - Copy `.env.example` to `.env`.
   - Generate an app key:
     ```bash
     php artisan key:generate
     ```
   - Configure database settings and other services in `.env`.

5. **Database setup**
   ```bash
   php artisan migrate --seed
   ```

6. **Run the development server**
   ```bash
   php artisan serve
   ```

Access the application at `http://localhost:8000`.

## 🛠️ Features

- School informational pages generated from `html/` directory and dynamic models.
- Admin dashboard for managing events, notices, galleries, results, etc.
- User authentication and role-based access control.
- Seeders and factories for rapid development.

## ✅ Testing

Run the test suite with PHPUnit:

```bash
php artisan test
``` 

## 📦 Deployment

1. Ensure environment variables are configured in production.
2. Run `composer install --optimize-autoloader --no-dev`.
3. Compile assets with `npm run build`.
4. Migrate database: `php artisan migrate --force`.
5. Configure a web server (NGINX/Apache) pointing to `public/`.

## 🤝 Contributing

1. Fork the repository.
2. Create a new branch for your feature or bugfix (`feature/xyz`).
3. Commit your changes with clear messages.
4. Submit a pull request.

## 📄 License

This project is licensed under the MIT License. See [LICENSE](LICENSE) for details.

---

*Generated on 1 March 2026.*