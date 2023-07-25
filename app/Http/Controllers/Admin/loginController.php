<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function doLogin(Request $req)
    {
       $input=$req->only(['username','password']);
      if(auth()->guard('admin')->attempt($input))
      {
        $adminName = Auth::guard('admin')->user()->username;

        // Store the admin's name in the session
        $req->session()->put('adminName', $adminName);
        return redirect()->route('dashboard');
      }
      else
      {
        return "Login error";
      }
    }
}
