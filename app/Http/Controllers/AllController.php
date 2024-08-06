<?php

namespace App\Http\Controllers;

use App\Http\Requests\inwardsRequest;
use App\Models\registration;
use App\Models\User;
use App\Rules\Allrules;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\Email;


class AllController extends Controller
{

    public function view_registration()
    {
        return view("registration_form");
    }

    public function view_login()
    {
        return view("login_form");
    }

    public function main_page()
    {
        return view('main_page');
    }
    public function view_inward()
    {
        if (Auth::check()) {
            $qulitys = DB::table('qualitys')->get();
            return view('inward_page', ['qulitys' => $qulitys]);
        } else {
            return redirect()->route('log_in_page');
        }
        // return view("inward_page");
    }

    public function view_outward()
    {
        if (Auth::check()) {
            $qulitys = DB::table('qualitys')->get();
            return view('outward_page', ['qulitys' => $qulitys]);
        } else {
            return redirect()->route('log_in_page');
        }
        // return view("outward_page");
    }

    public function userRegistration(Request $req)
    {
        $req->validate([
            'name' => 'required|alpha',
            'number' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'password' => 'required|numeric|digits:4',
        ]);

        $users = new User;
        $users->name = $req->name;
        // $users->Number = $req->number;
        $users->email = $req->email;
        $users->password = $req->password;

        $users->save();
        return view("login_form");
        // return $req['name'];
        // if ($req) {
        //     return view("login_form");
        // }
        // else{
        //     return "<h1>hello</h1>";
        // }
    }

    public function userlogin(Request $req)
    {
        // return $req->Email . $req->Password;

        $data = $req->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where('email', '=', $req->email)->first();
        // dd($user);
        if ($user && Hash::check($req->password, $user->password)) {
            Auth::login($user);
            if (Auth::check()) {
                // dd($user);
                return redirect()->route('main_page');
                // return 'ok';
            } else {
                return 'ok not';
            }
        } else {
            return 'not';
        }
        // $email = $req->Email;
        // $password = $req->Password;
        // if(Auth::attempt($data)) {
        //     return "hello";
        // }
        // else{
        //     return "password";
        // }

    }


    public function view_main()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $user = Auth::user();
            return view('main_page');
        } else {
            // $user = Auth::user();
            // return $user. "yes";
            return redirect()->route('log_in_page');
        }
    }

    public function index_data($qulitys)
    {
        $qulitys = DB::table('qualitys')->get();
        return view('inward_page', ['qulitys' => $qulitys]);
    }

    public function logout(Request $request)
    {
        // if(Auth::logout()){
        // Session::flash();
        // $request->session()->flash('key', $value);
        // return $request;
        $request->session()->flush();
        // return "You are Log Out.";
        return redirect()->route('log_in_page');
        // return view('login_form');
    }



    public function enter_inward(inwardsRequest $req)
    {
        return "<h1>Thank You For Visit.</h1>";
    }

    public function enter_outward(inwardsRequest $req)
    {
        return $req;
    }
}
