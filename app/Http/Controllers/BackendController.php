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
        return view("backend.foodmenu");
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
}
