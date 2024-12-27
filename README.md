# Tutorial Install Aplikasi 



## Clone the Repository

```sh
git clone https://github.com/M-Iqbal-Husaini/ICIF.git
cd ICIF
```

## Install Composer

```sh
composer install
```

## Create `.env` File

```sh
cp .env.example .env
```

## Configure Database (optional)

Update the `.env` file with your database credentials.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

## Run Migrations

```sh
php artisan migrate
```

## Run Seeder

```sh
php artisan db:seed
```

## Run the Application

```sh
php artisan serve
```

```sh
npm run dev
```


Now, you can access ICIF application by visiting `http://localhost:8000` in your web browser.
"# ICIF" 
