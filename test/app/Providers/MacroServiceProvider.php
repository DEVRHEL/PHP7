<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('cap', function ($str){
            return Response::make(strtoupper($str));
        });
        Response::macro('contact', function($action){
            $contact='
            <form action="'.$action.'" method="post">
                Ho ten: <input type="text"> <br>
                Sdt: <input type="text">
            </form>
            ';
            return $contact;
        });
    }
}
