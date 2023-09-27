<?php

namespace App\Http\Controllers;

use App\Models\MeetingCustomer;
use App\Models\FollowupCustomer;
use Illuminate\Http\Request;
use App\Models\RealEstateCustomer;
use App\Models\CallCustomer;
use App\Models\StatusCustomer;
use App\Models\RealestateCustomerchoice;
use App\Models\Status;
use App\Models\CallStatus;
use App\Models\Siteviews;
use App\Models\ReferenceCustomer;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SellingtoCustomer;
use App\Imports\RealEstateCustomerImport;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\SendMail;

//use Illuminate\Support\Facades\DB;

class RealEstateCustomerController extends Controller
{
    //
    public function index()
    {
    
        $callbacklist = $this->callbackinfolist();
        $realestate_customer = RealEstateCustomer::inRandomOrder()->where('userid', '=', 0)->where('callstatus', '=', 0)->first();
        return view('realestate.callcustomer.customercallform')->with('realestate_customer',$realestate_customer)
        ->with('callbacklist', $callbacklist);
    }



    public function callinfosubmit(Request $request)
    {

        //  echo ($request['radio']);

        if (($request['callstatus'] == 6)) {

            $validator = $request->validate([
                'calleddate' => 'required',
            ]);
        }

        $customer = RealEstateCustomer::find($request->customerid);
        $customer->fullname = $request['fullname'];
        $customer->mobilenumber = $request['mobilenumber'];
        $customer->landlinenumber = $request['landlinenumber'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->profession = $request['profession'];
        $customer->organization = $request['organization'];
        $customer->nationality = $request['nationality'];
        if ($request['callstatus'] == 7) {
            $customer->callstatus = 1;
        } else {
            $customer->callstatus = 0;
        }

        $customer->country = $request['country'];
        $customer->userid = $request['userid'];
        $customer->save();

        CallStatus::create([
            'callstatusnumber' => $request['callstatus'],
            'userid' => $request['userid'],
            'customerid' => $request['customerid'],
            'sectiontype' => $request['sectiontype']
        ]);


        if (($request['callstatus']) == 6) {

            $calledDate = date("Y-m-d", strtotime($request['calleddate']));
            CallCustomer::create([
                'called_date' => $calledDate,
                'called_time' => $request['calledtime'] . ":00",
                'calledtext' => $request['calledremark'],
                'userid' => $request['userid'],
                'customerid' => $request['customerid'],
                'sectiontype' => $request['sectiontype']
            ]);

            StatusCustomer::create([
                'interest' => 1,
                'userid' => $request['userid'],
                'customerid' => $request['customerid'],
                'sectiontype' => $request['sectiontype']
            ]);
        } else if (($request['callstatus']) == 7) {
            RealestateCustomerchoice::create([
                'flatinuae' => $request['flatinuae'],
                'prefercountry' => $request['prefercountry'],
                'propertytpe' => $request['propertytype'],
                'propertystatus' => $request['propertystatus'],
                'cityname' => $request['cityname'],
                'areaname' => $request['areaname'],
                'paymenttype' => $request['paymenttype'],
                'movingtime' => $request['movingtime'],
                'movingyear' => $request['movingyear'],
                'developername' => $request['developername'],
                'developernamebyus' => $request['developernamebyus'],
                'totalbudget' => $request['totalbudget'],
                'userid' => $request['userid'],
                'customerid' => $request['customerid'],
            ]);
            StatusCustomer::create([
                'interest' => 1,
                'userid' => $request['userid'],
                'customerid' => $request['customerid'],
                'sectiontype' => $request['sectiontype']
            ]);
            if ($request->has('followupdate')) {
                $followupstatus = 1;
                $followupdate = date("Y-m-d", strtotime($request['followupdate']));
            } else {
                $followupstatus = 0;
                $followupdate = "0000-00-00";
            }

            if ($request->has('meetingdate')) {
                $meetingstatus = 1;
                $meetingdate = date("Y-m-d", strtotime($request['meetingdate']));
            } else {
                $meetingstatus = 0;
                $meetingdate = "0000-00-00";
            }

            if ($request->has('followuptime')) {
                $followuptime = $request['followuptime'];
            } else {
                $followuptime = "00-00-00";
            }

            if ($request->has('meetingtime')) {
                $meetingtime = $request['meetingtime'];
            } else {
                $meetingtime = "00-00-00";
            }
            if ($request->has('followuptext')) {
                $followuptext = $request['followuptext'];
            } else {
                $followuptext = "";
            }

            if ($request->has('meetingtext')) {
                $meetingtext = $request['meetingtext'];
            } else {
                $meetingtext = "";
            }

            MeetingCustomer::create([
                'meeting_date' => $meetingdate,
                'meeting_time' => $meetingtime,
                'meetingtext' => $meetingtext,
                'userid' => $request['userid'],
                'customerid' => $request['customerid'],
                'sectiontype' => $request['sectiontype']
            ]);
            FollowupCustomer::create([
                'followup_date' => $followupdate,
                'followup_time' => $followuptime,
                'followuptext' => $followuptext,
                'userid' => $request['userid'],
                'customerid' => $request['customerid'],
                'sectiontype' => $request['sectiontype'],
            ]);
        } else {
            StatusCustomer::create([
                'interest' => 0,
                'userid' => $request['userid'],
                'customerid' => $request['customerid'],
                'sectiontype' => $request['sectiontype']
            ]);
        }
        $callbacklist = $this->callbackinfolist();
        return redirect('/user/realestate/customer/call')->
        with('success', 'Customer information has been updated successfully')->with('callbacklist', $callbacklist);
    }

    public function callinfoupdatesubmit(Request $request)
    {
        $calledupdatedDate = date("Y-m-d", strtotime($request['calleddatepickerupdate']));
        CallCustomer::create([
            'called_date' => $calledupdatedDate,
            'called_time' => $request['calledtimeupdate'] . ":00",
            'calledtext' => $request['calledremarkupdate'],
            'userid' => $request['userid'],
            'customerid' => $request['customerid'],
            'totalcalled' => $request['totalcalledupdate'],
            'sectiontype' => $request['sectiontype']
        ]);
        $callbacklist = $this->callbackinfolist();

        return redirect('user/realestate/customer/allleads')->
        with('success', 'Customer information has been updated successfully')->with('callbacklist', $callbacklist);
    }
    public function followupsubmit(Request $request)
    {


        $followupdatedupdate = date("Y-m-d", strtotime($request['followupdatepickerupdate']));
        FollowupCustomer::create([
            'followup_date' => $followupdatedupdate,
            'followup_time' => $request['followuptimeupdate'] . ":00",
            'followuptext' => $request['followuptextupdate'],
            'userid' => $request['userid'],
            'customerid' => $request['customerid'],
            'fallowupnumber' => $request['followupnumbeupdate'],
            'sectiontype' => $request['sectiontype']
        ]);
        $callbacklist = $this->callbackinfolist();
        return redirect('user/realestate/customer/allleads')
        ->with('success', 'Customer information has been updated successfully')->with('callbacklist', $callbacklist);
    }

    public function meetingsubmit(Request $request)
    {

        $meetingupdatedDate = date("Y-m-d", strtotime($request['meetingdatepickerupdate']));
        // dd($request['meetingtimeupdate']);
        MeetingCustomer::create([
            'meeting_date' => $meetingupdatedDate,
            'meeting_time' => $request['meetingtimeupdate'] . ":00",
            'userid' => $request['userid'],
            'customerid' => $request['customerid'],
            'meetingnumber' => $request['meetingnumberupdate'],
            'sectiontype' => $request['sectiontype']
        ]);
        $callbacklist = $this->callbackinfolist();
        return redirect('user/realestate/customer/allleads')->
        with('success', 'Customer information has been updated successfully')->with('callbacklist', $callbacklist);;

    }

    public function statussubmit(Request $request)
    {
        $data = array(
            'interest' => $request->radio,
        );

        StatusCustomer::where('customerid', $request->customerid)
            ->update($data);
        $callbacklist = $this->callbackinfolist();
        return redirect('user/realestate/customer/allleads')
        ->with('success', 'Customer information has been updated successfully')->with('callbacklist', $callbacklist);

    }

    public function sellslist()
    {
        $userid = $userid = auth()->user()->id;

        $allselleslist = DB::table("realestatesells")
            ->leftJoin("realestate_customer", function ($join) {
                $join->on("realestatesells.customerid", "=", "realestate_customer.id");
            })->where('realestate_customer.userid', '=', $userid)
            ->where('realestatesells.userid', '=', $userid)
            ->select(
                "realestatesells.id",
                "realestatesells.sellingcityname",
                "realestatesells.sellingareaname",
                "realestatesells.sellingpaymenttype",
                "realestatesells.totalprice",
                "realestatesells.sellingdate",
                "realestate_customer.fullname"
            )
            ->get();
        //dd($allselleslist);
        // DB::select('select a.id, a.sellingcityname, a.sellingareaname,a.sellingpaymenttype,a.totalprice,a.sellingdate, b.fullname 
        //from realestatesells a left join realestate_customer b on a.userid =b.userid AND a.customerid=b.id');
        $callbacklist = $this->callbackinfolist();
        return view('realestate.sellscustomer.allselleslist')->with('allselleslist',$allselleslist)->with('callbacklist', $callbacklist);

    }
    public function sellsdetail(string $id)
    {
        $sellsdetail = SellingtoCustomer::where("id", $id)->get();
        $customerid = $sellsdetail[0]['customerid'];
        $customerinfo = RealEstateCustomer::where('id', $customerid)->get();
        $fullname = $customerinfo[0]['fullname'];
        $callbacklist = $this->callbackinfolist();
        return view('realestate.sellscustomer.sellsdetail')->
        with('callbacklist',$callbacklist)->with('sellsdetail', $sellsdetail)->with('fullname', $fullname);

    }
    public function addcustomer()
    {
        $callbacklist = $this->callbackinfolist();
        return view('realestate.customer.addcustomerinfo')->
        with('callbacklist',$callbacklist);
    }

    public function previousfollowup()
    {
        $userid = $userid = auth()->user()->id;
        $currentdate = $date = date('Y-m-d');
        $prefollowup = DB::table('followups')
            ->select('*')
            ->whereDate('followup_date', '<=', $currentdate)->where('userid', $userid)
            ->whereDate('followup_date', '!=', '1970-01-01')
            ->get();
        $callbacklist = $this->callbackinfolist();
        return view('realestate.followup.previousfollowup')->with('prefollowup',$prefollowup)->with('callbacklist', $callbacklist);;

    }
    public function upcomingpfollowup()
    {
        $userid = $userid = auth()->user()->id;
        $currentdate = $date = date('Y-m-d');
        $nextfollowup = DB::table('followups')
            ->select('*')
            ->whereDate('followup_date', '>=', $currentdate)->where('userid', $userid)
            ->get();
        $callbacklist = $this->callbackinfolist();
        return view('realestate.followup.upcomingfollowup')->with('nextfollowup',$nextfollowup)
        ->with('callbacklist', $callbacklist);
    }

    public function upcomingmeeting()
    {
        $userid = $userid = auth()->user()->id;
        $currentdate = $date = date('Y-m-d');
        $nextmeeting = DB::table('meetings')
            ->select('*')
            ->whereDate('meeting_date', '>=', $currentdate)->where('userid', $userid)
            ->get();
        $callbacklist = $this->callbackinfolist();
        return view('realestate.meetings.upcomingmeeting')->with('nextmeeting',$nextmeeting)->with('callbacklist', $callbacklist);
    }

    public function previousmeeting()
    {
        $userid = auth()->user()->id;
        $currentdate = $date = date('Y-m-d');
        $premeeting = DB::table('meetings')
            ->select('*')
            ->whereDate('meeting_date', '<=', $currentdate)->where('userid', $userid)
            ->whereDate('meeting_date', '!=', '1970-01-01')
            ->get();
        $callbacklist = $this->callbackinfolist();
        return view('realestate.meetings.previousmeeting')->with('premeeting',$premeeting)->with('callbacklist', $callbacklist);
    }

    public function updatecustomer()
    {
        $callbacklist = $this->callbackinfolist();
        return view('admin.user.alluserlist')->with('callbacklist', $callbacklist);;
    }

    public function meetinglist()
    {
        echo "this is meeting list";
        dd();
        $userlist = User::select('id', 'name', 'email', 'type')->get();
        return view('admin.user.alluserlist', compact('userlist'));

    }

    public function newcustomerinfosubmit(Request $request)
    {


        RealEstateCustomer::create([
            'fullname' => $request['fullnamenew'],
            'mobilenumber' => $request['mobilenumbernew'],
            'landlinenumber' => $request['landlinenumber'],
            'email' => $request['emailnew'],
            'address' => $request['addressnew'],
            'profession' => $request['professionnew'],
            'organization' => $request['organizationnew'],
            'salary' => $request['salarynew'],
            'nationality' => $request['nationalitynew'],
            'country' => $request['countrynew'],
            'salaryrange' => $request['salaryrangenew'],
            'callstatus' => 0,
            'createdbyuserid' => $request['userid'],
            'reference' => $request['referenceid'],
            'customertype' => 'new',
        ]);
        $callbacklist = $this->callbackinfolist();
        return redirect('user/realestate/customer/addcustomer')->with
        ('success', 'Customer information has been added successfully')->with('callbacklist', $callbacklist);;
    }

    public function realestatecustomerimport()
    {
        $callbacklist = $this->callbackinfolist();
        Excel::import(new RealEstateCustomerImport, request()->file('file'));
        return redirect('user/realestate/customer/addcustomer')
        ->with('success', 'Customer information file has been uploaded successfully')->with('callbacklist', $callbacklist);;
    }
    public function followuplist()
    {
        echo "this is followuplist";
        dd();
    }

    public function callback()
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
        $callbacklist = $this->callbackinfolist();
        return view('realestate.callcustomer.allcallback')->with('callbacklist', $callbacklist)->with('callbacklist', $callbacklist);

    }

    public function callbackinfolist(){
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
        return $callbacklist;
    }
    public function wrongnumber()
    {
        $wrongnumberlist = DB::table("callstatus")
            ->join('realestate_customer', 'callstatus.customerid', '=', 'realestate_customer.id')->where('callstatus.callstatusnumber', '=', '5')
            ->select(
                "realestate_customer.id",
                "realestate_customer.fullname",
                "realestate_customer.mobilenumber"
            )
            ->get();
        $callbacklist = $this->callbackinfolist();
            
        return view('realestate.callcustomer.allwrongnumber')->with('wrongnumberlist',$wrongnumberlist
        )->with('callbacklist', $callbacklist);
    }

    public function notanswered()
    {
        $notanswered = DB::table("callstatus")
            ->join('realestate_customer', 'callstatus.customerid', '=', 'realestate_customer.id')->where('callstatus.callstatusnumber', '=', '4')
            ->select(
                "realestate_customer.id",
                "realestate_customer.fullname",
                "realestate_customer.mobilenumber"
            )
            ->get();
        $callbacklist = $this->callbackinfolist();
        return view('realestate.callcustomer.allnotanswered')->with('notanswered',$notanswered)
        ->with('callbacklist', $callbacklist);;
    }

    public function switchoff()
    {
        echo "this is all busy list";
        dd();
    }

    public function busy()
    {
        $busy = DB::table("callstatus")
            ->join('realestate_customer', 'callstatus.customerid', '=', 'realestate_customer.id')->where('callstatus.callstatusnumber', '=', '1')
            ->select(
                "realestate_customer.id",
                "realestate_customer.fullname",
                "realestate_customer.mobilenumber"
            )
            ->get();
        return view('realestate.callcustomer.allbusy', compact('busy'));
    }

    public function disconneted()
    {
        $disconneted = DB::table("callstatus")
            ->join('realestate_customer', 'callstatus.customerid', '=', 'realestate_customer.id')
            ->join('callstatusname', 'callstatus.callstatusnumber', '=', 'callstatusname.id')
            ->where('callstatus.callstatusnumber', '=', '1')
            ->select(
                "realestate_customer.id",
                "realestate_customer.fullname",
                "realestate_customer.mobilenumber",
                "callstatusname.statusname as status"                
            )
            ->get();
            dd($disconneted);
        return view('realestate.callcustomer.alldisconnected', compact('disconneted'));
    }


    public function allleads()
    {
        $userid = $userid = auth()->user()->id;
        $leadsustomerlist = DB::table("realestate_customer")
            ->join('status', 'realestate_customer.id', '=', 'status.customerid')
            ->join('callstatus', 'realestate_customer.id', '=', 'callstatus.customerid')
            // ->leftJoin("status", function ($join) {
            //     $join->on("realestate_customer.id", "=", "status.customerid");
            //     $join->on("realestate_customer.id", "=", "callstatus.customerid");
            // })
            ->where('realestate_customer.userid', '=', $userid)
            ->where('status.userid', '=', $userid)
            ->where('status.interest', '=', '1')
            ->where('status.flatsell', '=', '0')
            ->where('callstatus.callstatusnumber', '=', '7')
            ->select(
                "realestate_customer.id",
                "realestate_customer.fullname",
                "realestate_customer.mobilenumber",
                "realestate_customer.email",
                "realestate_customer.address",
                "status.interest"
            )
            ->get();
        $callbacklist = $this->callbackinfolist();
        return view('realestate.leadscustomer.leadscustomerlist')
        ->with('leadsustomerlist',$leadsustomerlist) ->with('callbacklist', $callbacklist);;
    }

    public function sendemail(Request $request)
    {
        $email = $request['email'];
        $message = $request['message'];
        $details = [
            'title' => $email,
            'body' => $message
        ];

        Mail::to($email)->send(new \App\Mail\StowrichMail($details));
        return response()->json([
            'message' => 'success'
        ], 200);

    }

    public function sendemailtocustomer()
    {
        echo " mail sent";
    }
    public function allnewcustomerlist()
    {
        $userid = auth()->user()->id;
        $newcustomerlist = RealEstateCustomer::where("createdbyuserid", $userid)->where("customertype", 'new')->where("callstatus", '0')->get();

        return view('realestate.customer.newcustomerlist', compact('newcustomerlist'));

    }

    public function newcustomercall(string $id)
    {
        $realestate_customer = RealEstateCustomer::where('id', $id)->where('customertype', 'new')->first();
        //->get();
        //  dd($realestate_customer);
        return view('realestate.callcustomer.customercallform', compact('realestate_customer'));
    }

    public function customercallback(string $id)
    {
        $realestate_customer = RealEstateCustomer::where('id', $id)->first();
        return view('realestate.callcustomer.customercallform', compact('realestate_customer'));
    }
    public function leadsupdate(string $id)
    {
        $customerinfo = RealEstateCustomer::find($id);
        $customerchoiceinfo = RealestateCustomerchoice::where("customerid", $id)->get();
        $customermeetinginfo = MeetingCustomer::where("customerid", $id)->get();
        $customercallinfo = CallCustomer::where('customerid', '=', $id)->get();
        $customerfollowupinfo = FollowupCustomer::where('customerid', '=', $id)->get();
        $customerstatusinfo = StatusCustomer::where('customerid', '=', $id)->get();
        $customersiteviewinfo = Siteviews::where('customerid', '=', $id)->get();
        $callbacklist = $this->callbackinfolist();
        return view('realestate.customer.updatecustomerinfo')->with('customerinfo', $customerinfo)->with('customerchoiceinfo', $customerchoiceinfo)->
            with('customermeetinginfo', $customermeetinginfo)->with("customersiteviewinfo", $customersiteviewinfo)
            ->with("customercallinfo", $customercallinfo)->with('customerfollowupinfo', $customerfollowupinfo)->
            with('customerstatusinfo', $customerstatusinfo)->with('customerfollowupinfo', $customerfollowupinfo)
            ->with('callbacklist', $callbacklist);
    }

    public function basicinfosubmit(Request $request)
    {
        $realEstateCustomer = RealEstateCustomer::find($request->customerid);
        $realEstateCustomer->fullname = $request->fullname;
        $realEstateCustomer->nationality = $request->nationality;
        $realEstateCustomer->country = $request->country;
        $realEstateCustomer->mobilenumber = $request->mobilenumber;
        $realEstateCustomer->landlinenumber = $request->landlinenumber;
        $realEstateCustomer->email = $request->email;
        $realEstateCustomer->address = $request->address;
        $realEstateCustomer->profession = $request->profession;
        $realEstateCustomer->salary = $request->salary;
        $realEstateCustomer->salaryrange = $request->salaryrange;
        $realEstateCustomer->save();
        return redirect('user/realestate/customer/allleads')->with('success', 'Customer information has been updated successfully');
    }

    public function propertychoiceinfoupdate(Request $request)
    {
        // echo "flat in uae" . $request->flatinuae . "prefer country" . $request->prefercountry;
        $data = array(
            'flatinuae' => $request->flatinuaeupdate,
            'prefercountry' => $request->prefercountryupdate,
            'propertytpe' => $request->prefercountryupdate,
            'cityname' => $request->citynameupdate,
            'areaname' => $request->areanameupdate,
            'paymenttype' => $request->paymenttypeupdate,
            'movingtime' => $request->movingtimeupdate,
            'developername' => $request->developernameupdate,
            'developernamebyus' => $request->developernamebyusupdate,
            'totalbudget' => $request->totalbudgetupdate,
            'userid' => $request->userid,
            'customerid' => $request->customerid,
        );

        RealestateCustomerchoice::where('customerid', $request->customerid)
            ->update($data);

        return redirect('user/realestate/customer/allleads')->with('success', 'Customer information has been updated successfully');
    }
    public function sellinginfosubmit(Request $request)
    {

        $sellingDate = date("Y-m-d", strtotime($request['sellingdate']));
        SellingtoCustomer::create([
            'sellingcityname' => $request['sellingcityname'],
            'sellingareaname' => $request['sellingareaname'],
            'sellingpaymenttype' => $request['sellingpaymenttype'],
            'totalprice' => $request['totalprice'],
            'sellingdate' => $sellingDate,
            'userid' => $request['userid'],
            'customerid' => $request['customerid'],
        ]);

        StatusCustomer::where('customerid', $request->customerid)
            ->update(['flatsell' => 1]);

        return redirect('/user/realestate/customer/allleads')->with('success', 'Flat sell information has been addes successfully');

    }

    public function siteviewsubmit(Request $request)
    {

        $siteviewDate = date("Y-m-d", strtotime($request['siteviewdatepickerupdate']));
        Siteviews::create([
            'siteview_date' => $siteviewDate,
            'userid' => $request['userid'],
            'customerid' => $request['customerid'],
        ]);
        $returnurl = '/user/realestate/customer/leadsupdate/' . $request['customerid'];
        return redirect($returnurl)->with('success', 'Flat sell information has been addes successfully');
    }

    public function referencesearch(Request $request)
    {
        $searchkey = $request['searchfield'];

        $referenceinfo = RealEstateCustomer::where(function ($query) use ($searchkey) {
            $query->where('fullname', 'like', '%' . $searchkey . '%')
                ->orWhere('id', 'like', '%' . $searchkey . '%')
                ->orWhere('mobilenumber', 'like', '%' . $searchkey . '%')
                ->orWhere('landlinenumber', 'like', '%' . $searchkey . '%')
                ->orWhere('organization', 'like', '%' . $searchkey . '%')
                ->orWhere('email', 'like', '%' . $searchkey . '%');
        })->distinct()->get(['fullname', 'id', 'mobilenumber', 'landlinenumber', 'organization', 'email']);
        return response()->json(array('referenceinfo' => $referenceinfo), 200);
    }


}