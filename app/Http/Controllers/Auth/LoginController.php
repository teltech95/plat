<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo(){
        if( Auth()->user()->role == 1){
            return route('company.dashboard');
        }
        elseif( Auth()->user() == 2){
            return route('corporate.dashboard');
        }
        elseif( Auth()->user() == 3){
            return route('normal.dashboard');
        }
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){

            if( auth()->user()->role == 1 ){
                return redirect()->route('company.dashboard');
            }
            elseif( auth()->user()->role == 2 ){
                return redirect()->route('corporate.dashboard');
            }
            elseif( auth()->user()->role == 3 ){
                return redirect()->route('normal.dashboard');
            }
            // else{
            //     return redirect()->route('tfa');
            // }

        }else{
            return redirect()->route('login')->with('error','Email and password are wrong');
        }
     }
}
