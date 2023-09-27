<?php

namespace App\Http\Controllers;

use App\Models\CallCustomer;
use App\Models\FollowupCustomer;
use App\Models\MeetingCustomer;
use App\Models\RealEstateCustomer;
use App\Models\RealestateCustomerchoice;
use App\Models\SellingtoCustomer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        $callbacklist = DB::table("calllists")
        ->join('realestate_customer', 'calllists.customerid', '=', 'realestate_customer.id')
        ->select(
            "realestate_customer.id",
            "realestate_customer.fullname",
            "realestate_customer.mobilenumber",
            "calllists.called_date",
            "calllists.called_time"
        )
        ->get();
        $userid = $userid = auth()->user()->id;
        $currentdate = date('Y-m-d');
        $totalnextmeeting = DB::table('meetings')
            ->select('*')
            ->whereDate('meeting_date', '>=', $currentdate)
            ->count();
        $currentdate = $date = date('Y-m-d');
        $totalnextfollowup = DB::table('followups')
            ->select('*')
            ->whereDate('followup_date', '>=', $currentdate)
            ->count();
        $callbacklist = DB::table("calllists")
            ->get();

        Session::put('callbacklist', $callbacklist);
        $todaysell = DB::table('realestatesells')
            ->select('*')
            ->whereDate('sellingdate', '=', $currentdate)->where('userid', $userid)
            ->count();
        $totalcall = RealEstateCustomer::where('userid', $userid)->where('callstatus', '1')->count();
        $totalmeeting = FollowupCustomer::where('userid', $userid)->where('sectiontype', '1')->count();
        $totalfollowup = MeetingCustomer::where('userid', $userid)->where('sectiontype', '1')->count();
        $totalcustomer = RealEstateCustomer::count();
        $totalleads = RealestateCustomerchoice::where('userid', $userid)->count();
        $totalcomplete = SellingtoCustomer::where('userid', $userid)->count();
        // dd($totalleads . $totalchequereceive);
        return view('realestate.dashboard')->with('nextfollowup', $totalnextfollowup)->with('nextmeeting', $totalnextmeeting)
            ->with('totalfollowup', $totalfollowup)->with('totalmeeting', $totalmeeting)->with('totalcall', $totalcall)
            ->with("totalcustomer", $totalcustomer)->with('totalleads', $totalleads)->with
            ('totalcomplete', $totalcomplete)->with('todaysell', $todaysell)->with('callbacklist', $callbacklist);

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