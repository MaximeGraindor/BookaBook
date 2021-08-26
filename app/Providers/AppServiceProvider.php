<?php

namespace App\Providers;

use App\Models\Order;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /* View::composer('layouts.main', function( $view )
        {
            $draftOrder = Order::with('books')->whereHas('status', function($query){
                $query->where('name', 'Brouillon');
            })
            ->where('user_id', Auth::user()->id)
            ->first();

            $cartQuantity = 0;

            foreach ($draftOrder->books as $book) {
                $cartQuantity += $book->pivot->quantity;
            }


            //pass the data to the view
            $view->with( 'cartQuantity', $cartQuantity );
        } ); */

    }
}
