#Install:
composer create-project --prefer-dist laravel/laravel fruit-store
php artisan migrate
composer require laravel/ui
npm install --save-dev vite
php artisan make:model
composer require spatie/laravel-enum
php artisan make:spatie-enum UnitEnum
composer require livewire/livewire
composer require spatie/laravel-sluggable
### for forms
php artisan make:livewire CreateFruitForm
php artisan make:request CreateFruitRequest

## Create models
php artisan make:model Fruit
php artisan make:model FruitCategory


## Create migration
php artisan make:migration create_fruit_categories_table --create=fruit_categories
php artisan make:migration create_fruits_table --create=fruits
## Run seeder
php artisan db:seed
php artisan db:seed --class=FruitCategorySeeder
php artisan db:seed --class=FruitSeeder