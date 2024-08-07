<?php

namespace App\Http\Controllers;

use App\Http\Requests\inwardsRequest;
use App\Http\Requests\outwardRequest;
use App\Models\inward;
use App\Models\outward;
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
        if (Auth::check()) {
            return redirect()->route('main_page');
        }
        return view("registration_form");
    }

    public function view_login()
    {
        if (Auth::check()) {
            return redirect()->route('main_page');
        }
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
    }

    public function view_outward()
    {
        if (Auth::check()) {
            $qulitys = DB::table('qualitys')->get();
            $vendors = DB::table('vendors')->get();
            return view('outward_page', ['qulitys' => $qulitys, 'vendors' => $vendors]);
        } else {
            return redirect()->route('log_in_page');
        }
    }

    public function userRegistration(Request $req)
    {
        $req->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/',
            'number' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|numeric|digits:4',
        ]);

        $users = new User;
        $users->name = $req->name;
        $users->number = $req->number;
        $users->email = $req->email;
        $users->password = $req->password;

        $users->save();
        return view("login_form");
    }

    public function userlogin(Request $req)
    {

        $data = $req->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where('email', '=', $req->email)->first();
        if ($user && Hash::check($req->password, $user->password)) {
            Auth::login($user);
            if (Auth::check()) {
                return redirect()->route('main_page');
            } else {
                return redirect('log-in')->withError('Login information is Incorrect');
            }
        } else {
            return redirect('log-in')->withError('Login information is Incorrect');
        }
    }


    public function view_main()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $user = Auth::user();
            return view('main_page');
        } else {
            return redirect()->route('log_in_page');
        }
    }

    public function qulitys_data($qulitys)
    {
        $qulitys = DB::table('qualitys')->get();
        return view('inward_page', ['qulitys' => $qulitys]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('log_in_page');
    }



    public function enter_inward(inwardsRequest $req)
    {
        $inward_data = new inward();
        $inward_data->Date_Time = $req->date_time;
        $inward_data->Quality = $req->select;
        $inward_data->Meter = $req->number;
        $inward_data->save();
        return $req;
    }

    public function enter_outward(outwardRequest $req)
    {
        $outward_data = new outward();
        $outward_data->Vendor = $req->select_vender;
        $outward_data->Date_Time = $req->date_time;
        $outward_data->Quality = $req->select;
        $outward_data->Meter = $req->number;
        $outward_data->save();
        return view('success_message');
    }

    public function message()
    {
        return view('success_message');
    }
}
