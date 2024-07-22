# News App

## Deskripsi
News App adalah aplikasi web untuk menampilkan berita terkini.

## Prasyarat
- PHP >= 8.2
- Composer >= 2.x.x
- Node.js >= 20.xx.x
- NPM
- PostgreSQL

## Instalasi

### Clone Repository
Clone repository ini ke direktori lokal Anda:

```bash

git clone https://github.com/arislaode/news-app.git

cd news-app

```

### Instal Dependensi
Instal dependensi PHP menggunakan Composer:

```bash
composer install
```

Instal dependensi Node.js menggunakan npm:
```bash
npm install
```

### Konfigurasi Environment
Salin file .env.example ke .env dan sesuaikan konfigurasi environment Anda:

```bash
cp .env.example .env
```

### Generate Key Laravel
Buat key baru project laravel:
```bash
php artisan key:generate
```

### Migrasi inisial laravel
menjalankan semua migrasi awal project laravel:

```bash
php artisan migrate

```

### Build Assets
Build aset menggunakan Vite:

```bash
npm run build
```

### Jalankan Server
Jalankan server pengembangan Laravel::

```bash
php artisan serve
```