<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // for bootstrap pagination

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
        //
        Paginator::useBootstrap(); // for bootstrap pagination

        Validator::extend('pdf', function($attribute, $value, $parameters) {
            $allowed_mimes = [
                'application/pdf', // pdf
            ];
            return in_array($value->getMimeType(), $allowed_mimes);
        });
    }

    // and in the NewsletterRequest:
public function rules()
{
    return [
        'certificate' => 'pdf',
    ];
}
}
