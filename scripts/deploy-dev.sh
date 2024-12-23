cd ..
git reset --hard
git clean -fd
git pull origin develop
composer update
php artisan migrate
