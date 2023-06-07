<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate_Customer;

//use Illuminate\Support\Facades\DB;

class RealEstateCustomerController extends Controller
{
    //
    public function index()
    {

        $realestate_customer = RealEstate_Customer::inRandomOrder()->where('status', '=', 0)->first();
        return view('realestate.callcustomer.customercallform', compact('realestate_customer'));
    }

    public function callinfosbmit()
    {
        echo "in called function ";
    }

    public function followup()
    {
        echo "in followup function";
    }

    public function meeting()
    {
        echo "in meeting funcion";
    }
}