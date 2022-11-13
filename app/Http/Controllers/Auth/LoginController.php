<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->user_type == 'admin') {
                return redirect()->route('admin.home');
            }
            if (auth()->user()->user_type == 'mechanic') {
                // $mechanic = Mechanic::where('user_id','=',Auth::id())->get();
                $id = Mechanic::where('user_id','=',Auth::id())->value('id');
                return redirect()->route('mech.requested',['mechanic'=>$id]);
                // return redirect()->route('user.home');
            }
            if (auth()->user()->user_type == 'user') {
                return redirect()->route('user.home');
            }

        }else{
            return redirect()->route('login')
                ->with('error','Email or Password Wrong.');
        }
          
    }
}
