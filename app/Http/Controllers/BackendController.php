<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchef;
use App\Models\Order;

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

    public function reservation(Request $request)
    {
        $data = new Reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;

        $data->save();

        return redirect("/");
    }

    public function showreservation()
    {
        $data = Reservation::all();

        return view("backend.showreservation", compact("data"));
    }

    public function showchef()
    {
        $chef = Foodchef::all();
        return view("backend.showchef", compact("chef"));
    }

    public function addchef(Request $request)
    {

        $chef = new Foodchef;
        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);

        $chef->image = $imagename;
        $chef->name = $request->name;
        $chef->expertise = $request->expertise;

        $chef->save(); 

        return redirect("/showchef");
    }

    public function editchef($id)
    {
        $chef = Foodchef::find($id);

        return view("backend.editchef", compact("chef"));
    }

    public function updatechef(Request $request, $id)
    {
        $chef = Foodchef::find($id);

        if($request->image)
        {
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('chefimage', $imagename);
            $chef->image = $imagename;
        }

        $chef->name = $request->name;
        $chef->expertise = $request->expertise;

        $chef->save(); 

        return redirect("/showchef");
    }

    public function removechef($id)
    {
        $chef = Foodchef::find($id);
        $chef->delete();

        return redirect("/showchef");
    }

    public function showorders()
    {
        $orders = Order::all();
        return view('backend.showorders', compact('orders'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $orders = Order::where('name', 'Like', '%'.$search.'%')->orwhere('foodname', 'Like', '%'.$search.'%')->get();
        return view('backend.showorders', compact('orders'));
    }
}
