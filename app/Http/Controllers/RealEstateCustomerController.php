<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate_Customer;
use App\Models\CallCustomer;

//use Illuminate\Support\Facades\DB;

class RealEstateCustomerController extends Controller
{
    //
    public function index()
    {

        $realestate_customer = RealEstate_Customer::inRandomOrder()->where('status', '=', 0)->first();
        return view('realestate.callcustomer.customercallform', compact('realestate_customer'));
    }

    public function callinfosubmit(Request $request)
    {

        $validator = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'totalcalled' => 'required'
        ]);
        $newDate = date("Y-m-d", strtotime($request['date']));

        CallCustomer::create([
            'called_date' => $newDate,
            'called_time' => $request['time'] . ":00",
            'userid' => $request['userid'],
            'customerid' => $request['customerid'],
            'totalcalled' => $request['totalcalled'],
            'sectiontype' => $request['sectiontype']
        ]);

    }

    public function followup()
    {
        echo "in followup function";
    }

    public function meeting()
    {
        echo "in meeting funcion";
    }

    public function status()
    {
        echo "in meeting funcion";
    }

    public function addcustomer()
    {
        echo "in add customer";
    }

    public function updatecustomer()
    {
        echo "in updatecustomer";
    }


}