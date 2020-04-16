# Micro CMS DEMO - Laravel PHP Framework

Laravel 5.2 demo project

## Usage

Clone the repo. 

```
git clone https://github.com/----.git
```

Run the install: 
```
composer install
```

### Create MYSQL database, db_user and db_user_password.

Copy/rename '.env.example' to '.env' and configure database connection and other settings

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USER
DB_PASSWORD=YOUR_DB_USER_PASSWORD
```

### Run the migrations and seed the database

```
php artisan migrate:refresh --seed
```

### Nginx / Apache
Set web root to /public folder.

#### Storage
Create a symlink to storage:

```
ln -s /path/to/laravel/storage/app/public /path/to/laravel/public/storage
```
