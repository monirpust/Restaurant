<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('home', compact("foods"));
    }

    public function redirects()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == '0')
        {
            $foods = Food::all();
            return view('home', compact("foods"));
        }

        else{
            return view('backend.admin');
        }     
    }
}
