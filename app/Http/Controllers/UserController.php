<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //


    public function registerUser(Request $req)
    {
        $req->validate([
            'name' => 'required',
            // unique: pachadi database ko table ko naam rakhne that for unique validation
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $data = new User();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        // $data->password= $req->password;

        $data->save();

        // with works as an internal session
        if ($data) {
            // return back()->with('success','User Created');
            return redirect('/login');
        } else {
            return back()->with('fail', 'Failed to signup');
        }
        // return redirect('/login');
        // return $req->all();

    }
    public function loginUser(Request $req)
    {
        $req->validate([

            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                return redirect('/');
            } else {
                return back()->with('fail', 'Password not matched');
            }
        } else {
            return back()->with('fail', 'User not found');
        }
    }
}
