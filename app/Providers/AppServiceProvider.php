<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('recursive', function () {


            return $this->map(function ($value) {
                if (is_array($value) || is_object($value)) {
                    return collect($value)->recursive();

                }
                return $value;
            });

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        Collection::macro('FirstJsonRead', function () {


            return $this->map(function ($value) {
                if (is_array($value) || is_object($value)) {

                    foreach ($value as $row){
                        foreach ( $row as $item){
                            return $item;
                        }
                    }

                }
                return $value;
            });

        });


    }

}
