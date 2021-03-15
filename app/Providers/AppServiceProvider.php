<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Models\Cart;
use App\Models\CartDetail;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $cart_count = 0;
        $cartID = null;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $cart_count = $cart->details->count();
        } else {
            try {
                $cartID = Crypt::decrypt(Cookie::get('cartID'), false);
                $cartID = explode('|', $cartID)[1];
            } catch (DecryptException $e) {
                $cartID = 0;
            }

            $cart = Cart::find($cartID);
            if($cart) $cart_count = $cart->details->count();
        }

        View::share('cart_count', $cart_count);
    }
}
