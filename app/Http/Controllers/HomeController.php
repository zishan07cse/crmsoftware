<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //public function index(Request $request)

    public function index()
    {
        // $param = '1';
        // // dd($request()->parameter);
        // if ($param == 1) {
        //     return view('realestate.dashboard');
        // } else if ($param = 2) {
        //     return view('investment.dashboard');
        // } else {
        //     return view('it.dashboard');
        // }
        //dd($request->all());
        return view('realestate.dashboard');

    }

    public function investment()
    {
        return view('investment.dashboard');
    }

    public function software()
    {

        return view('software.dashboard');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {

        return view('admin.dashboard');
    }

}