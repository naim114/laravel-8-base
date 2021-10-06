## Laravel 8 Base (creation notes)

### Create migration files
php artisan make:migration ObjectName

### Run migration w/ seeders
php artisan migrate:refresh --seed

### Create seeders
php artisan make:seeder ObjectName

for countries seeds, use this package (https://github.com/webpatser/laravel-countries)

### Applying templates
Put assets, css, js folders/files inside public and just 

### Authentication Settings/UI

this package https://github.com/webpatser/laravel-countries will automatically create controller, middle, views, etc for registration, login, etc
watch https://www.youtube.com/watch?v=XCrmk1bKxf4 for tutorial
