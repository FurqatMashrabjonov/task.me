<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Food;
use App\Models\Table;
use App\Observers\CategoryObserver;
use App\Observers\FoodObserver;
use App\Observers\TableObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Table::observe(TableObserver::class);
    }
}
