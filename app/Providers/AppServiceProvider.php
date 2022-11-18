<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

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
        Response::macro('notFound', function ($value = 'user not found') {
            return response()->json([
                'message'=> $value
            ],404);
        });
        Response::macro('success', function ($value = 'Succeeded') {
            return response()->json([
                'message'=> $value
            ],200);
        });
    }
}
