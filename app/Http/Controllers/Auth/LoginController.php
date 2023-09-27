<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Session;

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

    public function index()
    {
        return view('auth.login');
    }

    public function loginsubmit(Request $request)
    {
        // echo "inlogin controller";
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // dd(auth()->user()->type);

            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.home');
            } else {
                $usersection = $input['usersection'];
                $result = DB::table('users')
                    ->whereRaw('FIND_IN_SET(?, section)', $usersection)
                    ->get();
                if (sizeof($result) > 0) {
                    if ($input['usersection'] == 1) {
                        return redirect()->route('home');
                    } else if ($input['usersection'] == 2) {
                        return redirect()->route('investment');

                    } else if ($input['usersection'] == 3) {
                        return redirect()->route('software');
                    }
                } else {
                    Session::flush();
                    return redirect('/');
                }
            }

        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    // public function login(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         //  dd(auth()->user()->type);
    //         return redirect()->route('home');
    //         // if (auth()->user()->type == 'admin') {
    //         //     return redirect()->route('admin.home');
    //         // } else {
    //         //     if ($input['usersection'] == 1) {
    //         //         return redirect()->route('home');
    //         //     } else if ($input['usersection'] == 2) {
    //         //         return redirect()->route('investment');
    //         //     } else {
    //         //         return redirect()->route('software');
    //         //     }
    //         // }
    //     } else {
    //         return redirect()->route('login')
    //             ->with('error', 'Email-Address And Password Are Wrong.');
    //     }

    // }
}