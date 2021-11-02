## Laravel 8 Base (creation notes)

### Migration files
php artisan make:migration ObjectName

### Run migration w/ seeders
php artisan migrate:refresh --seed

to revert back migration
php artisan migrate:reset 

### Seeders
dummy data for testing

php artisan make:seeder ObjectName

for countries seeds, use this package (https://github.com/webpatser/laravel-countries)

### Applying templates
Put assets, css, js folders/files inside public and just 

### Authentication Settings/UI

this package, Laravel UI (https://github.com/laravel/ui) will automatically create controller, middle, views, etc for registration, login, etc
watch https://www.youtube.com/watch?v=XCrmk1bKxf4 for tutorial
alternative for Laravel UI is Laravel Fortify

### Events & listeners (for activity log)

read https://dev.to/kingsconsult/laravel-8-events-and-listeners-with-practical-example-9m7

### Middleware for permission

php artisan make:middleware CheckPermission

register it under routemiddleware

add parameter permission name to middleware

add query and if statement if user's role id has permission id of permission name given 

### Helpers (global functions)

https://dev.to/kingsconsult/how-to-create-laravel-8-helpers-function-global-function-d8n

### NOTES
import asset by using {{asset('######')}}  


### TOSTUDY
filepond - for file upload (https://pqina.nl/filepond/docs/getting-started/installation/javascript/)
