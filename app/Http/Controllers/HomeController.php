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
        if(Auth::check())
        {
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
        }
        $foods = Food::all();
        $chefs = Foodchef::all();
        return view('home', compact("foods", "chefs", "count"));
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

    public function showcart($id)
    {
       $user_id = $id;

       $count = Cart::where('user_id', $id)->count();

       $cartitems = Cart::where('user_id', $id)->get();

       $items = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();

       return view('showcart', compact('count', 'items', 'cartitems'));
    }

    public function removeitem($id)
    {
        $item = Cart::find($id);

        $item->delete();

        return redirect()->back();
    }
}
