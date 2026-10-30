# Bakuna Tracker

Bakuna Tracker is a Laravel vaccination schedule dashboard for Purok Ang. It uses Blade, Tailwind CSS, Vite, SQLite, Eloquent, and a simple seeded login.

## Seeded login

- Email: `nurse.ang@bakuna.test`
- Password: `bakuna2026`

## Setup

From the project directory:

```powershell
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run build
```

For development, use two terminals:

```powershell
npm run dev
php artisan serve
```

Open `http://127.0.0.1:8000/login`, sign in with the seeded account, and use the dashboard or schedule page.

## Routes

- `/login` - sign in
- `/dashboard` - authenticated dashboard with statistics and alerts
- `/schedule` - authenticated vaccination schedule

