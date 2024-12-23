# DigidesXBI

This project is a collaboration between Digides and BI. Digides serves web applications as information systems to provide information from agencies to end users.

## Requirements

-   PHP >= 7.4.33
-   Laravel >= 8.83.27
-   Composer >= 2.7.2

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/itorijal/digides-x-bi.git
    ```

## Install composer dependencies

```
composer install
```

## Set up your environment variables

-   Copy the .env.example file and rename it to .env.
-   Update the .env file with your database configuration and other settings.

## generate application key

```
php artisan key:generate
```

## generate storage symbolic link

```
php artisan storage:link
```

## generate admin account

```
php artisan db:seed --class=UserSeeder
```

## cron-job command

```
php artisan command:mail-cronjob
```
