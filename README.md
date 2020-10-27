# SimpleQuizSystem

1. Run these commands to get started: 

    A. composer install

    B. npm install
    
    C. php artisan key:generate

2. then do DB configuration in .env file

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_db

DB_USERNAME=root

DB_PASSWORD=

3. Run the migrations

    D. php artisan migrate

4. Run the seeder class for admin

    E. php artisan db:seed --class=UserSeeder

4. After successfully running of above commands, run :

    F. php artisan serve
    

