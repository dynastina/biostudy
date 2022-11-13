# Metronic 7 + Laravel 8

### Introduction

This project is a base functional for any projects. Build with combination of laravel and metronic template
You can see the raw project of templates in bitbucket > Asset/Template Backend HTML

If you need front end in your project try this

```bash
open routes folder
```

```bash
edit front.php and uncomment // Route::get('/', 'PagesController@index');
```

```bash
go to app/Http/FrontEnd/PagesController to build frontend
```

You can use raw projects templates for front end in bitbucket > Asset/Template Frontend

### Installation

Laravel has a set of requirements in order to ron smoothly in specific environment. Please see [requirements](https://laravel.com/docs/7.x#server-requirements) section in Laravel documentation.

Metronic similarly uses additional plugins and frameworks, so ensure You have [Composer](https://getcomposer.org/) and [Node](https://nodejs.org/) installed on Your machine.

Assuming your machine meets all requirements - let's process to installation of Metronic Laravel integration (skeleton).

1. Open in cmd or terminal app and navigate to this folder
2. Run following commands

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
configure your app_name and your database
```

```bash
php artisan migrate --seed
```

```bash
php artisan key:generate
```

```bash
Extract stubs.rar to vendor/ibex/crud-generator/src
```

```bash
php artisan serve
```

```bash
Navigate to generated server link (http://127.0.0.1:8000)
```

If you want to make new module automatically, you can try this one

```bash
make table in your database
```

```bash
php artisan make:crud {table_name}
```

Please take a note, in every single table you create. Please include these:
1. created_at
2. updated_at
3. created_by
4. updated_by

```bash
configure aside_menu.php
```

```bash
configure role access 
```

```bash
make routing in web.php
```

### Copyright Zamasco Development Team

last updated by ganden

----------------------------------------------------------------------
Permission https://github.com/spatie/laravel-permission

CRUD Generator (vendor\ibex\crud-generator\src\stubs) https://github.com/awais-vteams/laravel-crud-generator