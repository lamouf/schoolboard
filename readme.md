<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About MindGeek School Board Manager
This application it is made to allow to show a student belongint to a certain school bord with his grades:

### Features:
    path '/' : the root app shows the list of two school boards
    path '/schoolboard/1' : shows the students of the school board 1
    path '/schoolboard/1/student/12 : shows the student with id = 12 of the school board 1
        - we can see the list of grades of the current students
        - we can add a grade to the current student with post form 
        - when we send the new grade to the student a certain logic is done to :
            - calculate the average
            - checks if the student has failed or succeeded
            - generate xml or json content before to log it in storage/logs/laravel.log
            

### Requisit :
    - This application is written with php7.0
    - Make sure to have installed the appropriate db drivers pdo_sqlite in this case
    - Notice that i removed the db config from .env file 
    ( because the path to sqlite file is not resolved this way for i do not know what is the exact reason)
    - the db config is in config/database.php file and the database file is database/schoolboard.sqlite
    - put the application folder in place reachable by a running web server
        
### Run the application
    Once all the environment correctly set (Db config and drivers, php extensions)
    - run composer install to install all the needed packages defined in composer.json
    - then 'run php artisan migrate' to install the db schema defined in the migrations.
    - run 'php artisan db:seed' The seeds are created to populate the database (fake data to work with).
    (you can find sutents with more 4 grades, for those cases, when you try to add a grade it will not be saved)
    - Go to the browser and write the url address on the navigation bar
    
 Any Question is Welcomed,
 Enjoy.
 Lamara Mouffok