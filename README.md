## Laravel 8 Base (creation notes)

### How to run

requirement;
- npm
- composer

npm install
composer install
create db at phpmyadmin based on database name in .env file
php artisan migrate:refresh --seed
php artisan key:generate

(make sure to enable/uncomment extension=fileinfo, extension=pdo_mysql at php.ini)

### Migration files
`php artisan make:migration ObjectName`

### Run migration w/ seeders
`php artisan migrate:refresh --seed`

(make sure to enable/uncomment extension=fileinfo, extension=pdo_mysql at php.ini)

to revert back migration
`php artisan migrate:reset` 

foreign key example on table migration files (e.g. table called team)
```
$table->integer('tournament_id')->unsigned();
$table->foreign('tournament_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
```

#### Model
if you would like to generate a database migration when you generate the model, you may use the --migration or -m option:

`php artisan make:model ObjectName --migration`

(more flag)
`--seed`
`--controller`

links to table by
```  
protected $table = 'teams';

protected $fillable = [
    'name',
    'category',
    'logo_path',
    'tournament_id',
];
```

soft delete
`use Illuminate\Database\Eloquent\SoftDeletes;`

create relationship;
- as parent
`public function athlete()
{
    return $this->hasMany(Athlete::class);
}`

- as children    
`public function tournament()
{
    return $this->belongsTo(Tournament::class);
}`

read more here: https://laravel.com/docs/8.x/eloquent-relationships

### Seeders
dummy data for testing

php artisan make:seeder ObjectName

add `$this->call(YourSeederClassNameHere::class);` at DatabaseSeeder

for countries seeds, use this package (https://github.com/webpatser/laravel-countries)

### Applying templates
Put assets, css, js folders/files inside public and just 

### Authentication Settings/UI

this package, Laravel UI (https://github.com/laravel/ui) will automatically create controller, middle, views, etc for registration, login, etc
watch https://www.youtube.com/watch?v=XCrmk1bKxf4 for tutorial

NOTE: comment $this->guard()->login($user); to disable login after register at vendor/laravel/ui/auth-backend/RegistersUsers.php 

alternative for Laravel UI is Laravel Fortify

### Events & listeners (for activity log)

read https://dev.to/kingsconsult/laravel-8-events-and-listeners-with-practical-example-9m7

### Middleware for permission

php artisan make:middleware CheckPermission

register it under routemiddleware at Kernel

add parameter permission name to middleware

add query and if statement if user's role id has permission id of permission name given 

### Helpers (global functions)

https://dev.to/kingsconsult/how-to-create-laravel-8-helpers-function-global-function-d8n

run `composer dump-autoload` if function not found  

### NOTES
import asset by using {{asset('######')}}

to solve bootstrap ui pagination problem add this to AppServiceProvider;
use Illuminate\Pagination\Paginator;
public function boot()
{
     Paginator::useBootstrap();
}

### TOSTUDY
filepond - for file upload (https://pqina.nl/filepond/docs/getting-started/installation/javascript/)
