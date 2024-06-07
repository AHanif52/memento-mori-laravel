<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Validator::extend('unique_code', function ($attribute, $value, $parameters, $validator) {
        //     // Lakukan pengecekan untuk memastikan bahwa value tidak duplikat dalam tabel
        //     // Di sini, saya anggap Anda ingin memeriksa tabel 'villages' karena 'code' adalah atribut dari 'villages'
        //     return !\App\Models\Village::where($attribute, $value)->exists();
        // });
    }
}
