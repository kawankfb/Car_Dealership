<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $data=$request->user();
        return view('profile',['data'=>$data]);
    }
    public function edit(Request $request)
    {

        $user=$request->user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->last_name=$request->lastname;
        $user->phone_number=$request->phone;

        $user->save();
        return back();
    }
}
