#step 1
Copy .env.example to .env 
---------------------------
#step 2
composer install (or) composer update
--------------------------------
#step 3
Config database
-----------------------
#step 4
php artisan migrate
php artisan db:seed (or) php artisan db:seed --class=UserSeeder
------------------------------------
#step 5
php artisan key:generate
--------------------------------
admin Login
username: admin@gmail.com
password: 123456
------------------------