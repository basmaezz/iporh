<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PanelLoginController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest:admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin');
        return (isset($admin->user()->id)) ? redirect()->route(get_current_locale().'.panel.dashboard') : redirect()->route(get_current_locale().'.panel.login');
    }

    public function showLoginForm()
    {
        return view('panel.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            return redirect()->route(get_current_locale().'.panel.dashboard');
        }
        session()->flash('response', __('البيانات المدخلة غير صحيحة'));
        return redirect()->back();
    }
}
