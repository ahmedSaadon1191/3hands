<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login()
    {
        return view('backEnd.Auth.login');
    }
    
    public function makeLogin(Request $request)
    {
        // return $request;

        if(Auth::guard('admin')->attempt(['email' =>$request->email,'password' =>$request->password]))
        {
            return redirect()->route('admin.DashBoard');
        }
            return back()->with(['error' => 'Email Or Password Was Invalied']);
    }

    public function DashBoard()
    {
        return view('backEnd.dashBoard');
    }

    public function logout()
    {
        // return "yes";
        \auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function test()
    {
        return view('backEnd.layouts.app');
    }
}
