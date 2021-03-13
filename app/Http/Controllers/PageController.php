<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Articles;
use App\Models\CartDetail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = 20;
        if ($request->perPage) {
            $perpage = $request->perPage;
        }

        $slides     = Slide::all();
        $products   = Product::paginate(15);

        $new_products  =  DB::table('products')
            ->orderBy('created_at', 'asc')
            ->limit(15)
            ->get();

        $hot_view_products  = DB::table('products')
            ->orderBy('view_count', 'desc')
            ->limit(15)
            ->get();

        $hot_buy_products   = DB::table('products')
            ->orderBy('view_count', 'desc')
            ->limit(15)
            ->get();
        $suggestion_products    = Product::paginate(5);
        $news = Product::paginate(5);
        $title = 'Fresh Food';

        return view(
            'front_end.home',
            [
                'products'              => $products,
                'title'                 => $title,
                'slides'                => $slides,
                'hot_view_products'     => $hot_view_products,
                'new_products'          => $new_products,
                'hot_buy_products'      => $hot_buy_products,
                'suggestion_products'   => $suggestion_products,
                'news'                  => $news
            ]
        );
    }

    public function detail_product(Request $request, $name, $id)
    {
        $product   = Product::Find($id);
        $articles = $product->articles;
        $content = $articles->content;
        $product->increment('view_count');
        $title = $product->name . " | Fresh Food";
        return view(
            'front_end.product.detail-product',
            [
                'product'   => $product,
                'title'     => $title,
                'articles'  => $content,
            ]
        );
    }

    public function new_product(Request $request)
    {
        $perpage = 20;
        if ($request->perPage) {
            $perpage = $request->perPage;
        }

        $slides     = Slide::all();
        $products   = Product::paginate(15);

        $new_products  =  DB::table('products')
            ->orderBy('created_at', 'asc')
            ->limit(15)
            ->get();

        $title = 'Fresh Food';

        return view(
            'front_end.product.new',
            [
                'title'                 => $title,
                'new_products'          => $new_products,
            ]
        );
    }

    public function category_product(Request $request)
    {
    }

    public function product_most_buyed(Request $request)
    {
    }

    public function product_most_viewed(Request $request)
    {
    }

    public function category_news(Request $request)
    {
    }

    public function detail_news(Request $request)
    {
    }

    public function cart(Request $request)
    {

        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $cart = Cart::where('user_id', $user->id)->first();


            if($cart) {
                $products = $cart->details;//CartDetail::where('cart_id', $cart->id)->get();
                if($products) {
                    foreach ($products as $product) {
                        $product->id = $product->product->id;
                        $product->image = $product->product->image_path;
                        $product->name = $product->product->name;
                        $product->total = $product->current_price * $product->quantity;
                    }
                }
            } else {
                $cart = new Cart;
                $cart->user_id = Auth::user()->id;
                $cart->save();
                $products = CartDetail::where('cart_id', $cart->id)->get();
            }


        }else {
            $cartID = $request->cookie('cartID');
            $cart = Cart::find($cartID);

           if($cart) {
                $products = $cart->details;//CartDetail::where('cart_id', $cart->id)->get();
                if($products) {
                    foreach ($products as $product) {
                        $product->id = $product->product->id;
                        $product->image = $product->product->image_path;
                        $product->name = $product->product->name;
                        $product->total = $product->current_price * $product->quantity;
                    }
                }

           }
           else {
                $cart = new Cart;
                $cart->save();
                Cookie::queue('cartID', $cart->id);

                $products = $cart->details;//CartDetail::where('cart_id', $cart->id)->get();
                if($products) {
                    foreach ($products as $product) {
                        $product->id = $product->product->id;
                        $product->image = $product->product->image_path;
                        $product->name = $product->product->name;
                        $product->total = $product->current_price * $product->quantity;
                    }
                }
            }
        }


        return view('front_end.cart.index', ['products' => $products]);
    }

    public function add_to_cart(Request $request)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            if($cart) {
                $product = Product::find($request->id);
                if($product) {
                   // $cart_detail = CartDetail::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
                    $cart_detail = $cart->details->firstWhere('product_id', $product->id);
                    if($cart_detail) {
                        $cart_detail->quantity += $request->quantity;
                        $cart_detail->save();
                    } else {
                        $cart_detail = new CartDetail();
                        $cart_detail->cart_id = $cart->id;
                        $cart_detail->product_id = $product->id;
                        $cart_detail->quantity = $request->quantity;
                        $cart_detail->current_price = $product->price;
                        $cart_detail->save();
                    }
                }
            } else {
                $cart = new Cart;
                $cart->user_id = Auth::user()->id;
                $cart->save();

                $product = Product::find($request->id);

                if($product) {
                    $cart_detail = new CartDetail();
                    $cart_detail->cart_id = $cart->id;
                    $cart_detail->product_id = $product->id;
                    $cart_detail->quantity = $request->quantity;
                    $cart_detail->current_price = $product->price;
                    $cart_detail->save();
                }
            }
        }
        else {

            $cartID = $request->cookie('cartID');
            $cart = Cart::find($cartID);

            if($cart) {
                $product = Product::find($request->id);
                if($product) {
                    //$cart_details = $cart->details;//CartDetail::where('cart_id', $cartID)->where('product_id', $product->id)->first();
                    $cart_detail = $cart->details->firstWhere('product_id', $product->id);
                    if($cart_detail) {
                        $cart_detail->quantity += $request->quantity;
                        $cart_detail->save();
                    } else {
                        $cart_detail = new CartDetail();
                        $cart_detail->cart_id = $cart->id;
                        $cart_detail->product_id = $product->id;
                        $cart_detail->quantity = $request->quantity;
                        $cart_detail->current_price = $product->price;
                        $cart_detail->save();
                    }

                }
            } else {
                $cart = new Cart;
                $cart->save();
                Cookie::queue('cartID', $cart->id);
                $product = Product::find($request->id);

                if($product) {
                    $cart_detail = new CartDetail();
                    $cart_detail->cart_id = $cart->id;
                    $cart_detail->product_id = $product->id;
                    $cart_detail->quantity = $request->quantity;
                    $cart_detail->current_price = $product->price;
                    $cart_detail->save();
                }
            }
        }

        // $product = Product::find($request->id);
        // $cart = $product->id;
        // $request->session()->put('cart', '1');
        // dd(session('cart'));
        // $cart_detail = new CartDetail();
        // $cart_detail->cart_id = $cart->id;
        // $cart_detail->product_id = $request->id;
        // $cart_detail->quantity = $request->quantity;
        // $cart_detail->current_price = $request->price;
        // $cart_detail->save();

        return redirect()->back();
    }
}
