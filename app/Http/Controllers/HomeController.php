<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Foodchef;

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
            $foods = Food::all();
            $chefs = Foodchef::all();
            return view('home', compact("foods", "chefs"));
        }

        else{
            return view('backend.admin');
        }     
    }
}
