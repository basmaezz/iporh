<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        return view('panel.home');
    }




    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route(get_current_locale().'.panel.login');
    }

}
