# Cloud Capacity Dashboard – SMPlus Technical Test

## Deskripsi
Aplikasi **Cloud Capacity Dashboard** digunakan untuk menampilkan visualisasi kapasitas **CPU** dan **Memory** per **Cluster**, serta menyediakan fitur **download report** dan **notifikasi email**.

Aplikasi ini dibangun menggunakan **Laravel 12** sebagai backend dan **React + TypeScript (InertiaJS)** sebagai frontend, dengan **PostgreSQL** sebagai database.

---

## IDE & Development Tools

### IDE Utama
- **Visual Studio Code**

### Tools & Software
- Composer (Backend dependency manager)
- Node.js & NPM (Frontend build tool)
- PostgreSQL Client (DBeaver / pgAdmin / TablePlus)
- Git (Version control)
- Terminal / PowerShell

---

## Tech Stack
- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: React + TypeScript + InertiaJS
- **Styling**: Tailwind CSS
- **Chart**: Chart.js
- **Database**: PostgreSQL
- **Mail**: SMTP
- **Build Tool**: Vite

---

## System Requirements

### Software
- PHP **8.2+**
- Composer
- Node.js **18+**
- NPM
- PostgreSQL Server

### PHP Extensions (WAJIB)
Aktifkan pada `php.ini`:
- `openssl`
- `curl`
- `pdo_pgsql`
- `pgsql`
- `mbstring`
- `fileinfo`

---

## INSTALLATION
- `Clone Repository`
```
git clone https://github.com/aryonuwi/SMPlus.git
cd SMPlus
```

- `Install Backend Dependencies`
```
composer install
```

- `Setup Environment`
```
copy .env.example .env
```

- `Generate application key`
``` 
php artisan key:generate
```

- `Konfigurasi Database (PostgreSQL)`
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=sm_plus_test
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

- `Konfigurasi Email (SMTP)`
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=xxxx
MAIL_PASSWORD=xxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@smplus.test
MAIL_FROM_NAME="SMPlus Dashboard"

REPORT_RECIPIENT_EMAIL=hr@company.com
CANDIDATE_NAME="Aryo"
```

- `Jalankan Database Migration & Seeder`
```
php artisan migrate
php artisan db:seed
```

- `Install Frontend Dependencies`
```
npm install
```

## RUNNING APPLICATION
- `Jalankan Backend (Laravel)`
```
php artisan serve
```
`Backend berjalan di:`
```
http://localhost:8000
```
- `Jalankan Frontend`
`Buka terminal baru:`
```
npm run dev
```
`Vite berjalan di:`
```
http://localhost:5173
```
** Penting: **
`Karena menggunakan InertiaJS, aplikasi diakses melalui Laravel, bukan Vite:`
```
http://localhost:8000
```
- `Akses Aplikasi`
```
http://localhost:8000
```
