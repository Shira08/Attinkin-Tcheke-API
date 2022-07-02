<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use DB;
use Hash;
use Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('logins.admin-login');
    }
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);  
        $email = $request->email;
        $password = $request->password;

       
       /* $login = DB::table('pharmacies')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->first();*/
                $login = Admin::where('email', $email)->first(['id', 'password']);
                //dd($login);
        if($login)
        {
                if(hash::check($request->password, $login->password))
                {
                    $request->session()->put('loginId',$login->id);
                    return redirect('dashboard');
                }else
                {
                    return back()->with( 'fail', ' pass not good' );
                }
        }else
        {
            return back()->with( 'fail', 'Email or pass not good' );
        }
    }
    public function dashboard()
    {
        return view("pages.dashboard");

    }
    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('admin-login');
        }
    }
}
