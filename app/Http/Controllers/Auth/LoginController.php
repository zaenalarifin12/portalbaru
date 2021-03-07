<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    public function loginAdmin()
    {
        return view("auth.loginAdmin");
    }

    public function storeLoginAdmin(Request $request)
    {
        $username   = $request->only('username');
        $password   = $request->only('password');

        $user = DB::table("user")->where('username','=',$username)
                ->where(function($query) {
                    $query->where('role', 2)
                          ->orWhere('role', 3)
                          ->orWhere('role', 4)
                          ->orWhere('role', 5);
                })->first();

            
        if ($user != null) {
            $x = Auth::loginUsingId($user->id);
            return redirect("/");
        }else{
            return redirect()->back()->with("msg", "username atau password ada yang salah");
        }
        


        
    }
}
