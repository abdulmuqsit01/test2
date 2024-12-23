cd ..
git reset --hard
git clean -fd
git pull origin master
composer update
php artisan migrate
