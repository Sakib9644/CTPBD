<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/profile';

    public function index () {
        return view('auth.login');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->user_type === 'Customer') {
            return redirect()->route('customers.index');
        }
        if ($user->user_type === 'Admin') {
            return redirect()->route('profile');
        }

        return redirect($this->redirectTo);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
