<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

class BackendController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view("backend.userlist", compact("users"));
    }

    public function remove($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect("/users");
    }

    public function foodmenu()
    {
        $foods = Food::all();
        return view("backend.foodmenu", compact("foods"));
    }

    public function uploadfood(Request $request)
    {

        $data = new Food;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save(); 


        return redirect("/foodmenu");
    }

    public function updatefood($id)
    {
        $food = Food::find($id);

        return view("backend.updatefood", compact("food"));
    }

    public function savefood(Request $request, $id)
    {
        $food = Food::find($id);

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $food->image = $imagename;
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;

        $food->save(); 


        return redirect("/foodmenu");
    }

    public function removefood($id)
    {
        $food = Food::find($id);
        $food->delete();
        
        return redirect("/foodmenu");
    }
}
