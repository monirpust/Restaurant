<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
