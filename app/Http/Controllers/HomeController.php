<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        $chefs = Foodchef::all();
        return view('home', compact("foods", "chefs"));
    }

    public function redirects()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == '0')
        {
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();

            $foods = Food::all();
            $chefs = Foodchef::all();
            return view('home', compact("foods", "chefs", "count"));
        }

        else{
            return view('backend.admin');
        }     
    }

    public function addtocart(Request $request, $id)
    {
        if(Auth::check())
        {
            $cart = new Cart;
            $user_id = Auth::id();

            $cart->user_id = $user_id;
            $cart->food_id = $id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }
}
