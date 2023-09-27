@extends('realestate.layouts.master')
<style>
    .float-left {
        font-size: 12px;
        font-weight: bold;
    }
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $(function() {
        $("#calleddatepickerupdate").datepicker();

    });

    $(function() {
        $("#meetingdatepickerupdate").datepicker();

    });

    $(function() {
        $("#followupdatepickerupdate").datepicker();

    });
    @php $userid = Auth::user()->id  @endphp
</script>
<style>
    .input-box {
        position: relative;
    }

    #recipient-number {
        display: block;
        border: 1px solid #d7d6d6;
        background: #fff;
        padding: 10px 10px 10px 40px;
        font-size: 15px;
        color: #000;
    }

    .unit {
        position: absolute;
        display: block;
        left: 5px;
        top: 10px;
        z-index: 9;
    }
</style>
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="page-title">
                                Customer called detail form
                            </h3>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                        data-target="#modal-whatsapp" data-whatever="@getbootstrap"
                                        style="float:right;">What's app</button>

                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                        data-target="#modal-email" data-whatever="@getbootstrap">
                                        Email
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">

                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-4">Customer Basic Information</h4>

                            <div class="form-group">
                                <input id="type" type="hidden" class="form-control" name="customerid"
                                    value=" @php echo $customerinfo->id @endphp ">
                            </div>
                            <div class="form-group">
                                <input id="type" type="hidden" class="form-control" name="userid"
                                    value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group">
                                <input id="type" type="hidden" class="form-control" name="sectiontype" value="1">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Full Name:</label>
                                    <input class="form-control" name="fullname"
                                        value="@php echo $customerinfo->fullname @endphp " disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Phone No.:</label>
                                    <input class="form-control" name="mobilenumber"
                                        value="@php echo $customerinfo->mobilenumber @endphp " disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Landline No.:</label>
                                    <input class="form-control" name="landlinenumber"
                                        value="@php echo
                                             $customerinfo->landlinenumber==0  ? '':$customerinfo->landlinenumber @endphp"
                                        disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Email:</label>
                                    <input class="form-control" name="email"
                                        value="@php echo $customerinfo->email @endphp " disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Address:</label>
                                    <input class="form-control" name="address"
                                        value="@php echo $customerinfo->address @endphp " disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Profession:</label>
                                    <input class="form-control" name="profession"
                                        value="@php echo $customerinfo->profession @endphp " disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>organisation:</label>
                                    <input class="form-control" name="organization"
                                        value="@php echo $customerinfo->organization @endphp" disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Salary:</label>
                                    <input class="form-control" name="salary"
                                        value="@php echo $customerinfo->salary== 0 ? '':$customerinfo->salary @endphp"
                                        disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Salary range:</label>
                                    <input class="form-control" name="salaryrange"
                                        value="@php echo $customerinfo->salaryrange== 0 ? '':
                                            $customerinfo->salaryrange @endphp"
                                        disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Country of origin:</label>
                                    <input class="form-control" name="nationality"
                                        value="@php echo $customerinfo->nationality @endphp" disabled />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Current resident city:</label>
                                    <input class="form-control" name="country"
                                        value="@php echo $customerinfo->country @endphp " disabled />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#modal-updateinfo" data-whatever="@getbootstrap">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-4">Customer Property Choice </h4>
                            <div class="form-group row" style="margin-bottom:0px;">
                                <div class="col-sm-3">
                                    <label>Customer Choice:</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="radio"
                                                id="interestedrdbtn" value="1"
                                                @php if ($customerstatusinfo[0]['interest']== '1') {echo ' checked 
                                                        ';} @endphp
                                                disabled>
                                            Interested
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="radio"
                                                id="noninterestedrdbtn" value="0"
                                                @php if ($customerstatusinfo[0]['interest']== '0') {echo ' checked 
                                                        ';} @endphp
                                                disabled>
                                            Not Interested
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#modal-updateinterest" data-whatever="@getbootstrap">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            @php
                                $i = 0;
                            @endphp
                            <h4 class="card-title mt-4">Customer Called Information</h4>
                            <table id="customercalllist" class="display" style="width:100%" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($customercallinfo as $calllist)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td> {{ $calllist->called_date }}</td>
                                            <td> {{ $calllist->called_time }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#modal-calllist" data-whatever="@getbootstrap">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-4">Customer Property Requriement </h4>

                            <div class="form-group row">
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Do uou have flat in UAE:</label>
                                    <select class="form-control form-control-lg" id="flatinuae" name="flatinuae">
                                        <option value="yes"
                                            @php if  ($customerchoiceinfo[0]['flatinuae']=='yes') echo ' selected="selected"' @endphp>
                                            Yes</option>
                                        <option value="no"
                                            @php if  ($customerchoiceinfo[0]['flatinuae']=='no') echo ' selected="selected"' @endphp>
                                            No</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Do uou want to buy flat in UAE/India:</label>
                                    <select class="form-control form-control-lg" id="prefercountry" name="prefercountry">
                                        <option value="uae"
                                            @php if  ($customerchoiceinfo[0]['prefercountry']=='uae') echo ' selected="selected"' @endphp>
                                            UAE</option>
                                        <option value="india"
                                            @php if  ($customerchoiceinfo[0]['prefercountry']=='india') echo ' selected="selected"' @endphp>
                                            India</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Which types property do you prefer?:</label>
                                    <select class="form-control form-control-lg" id="propertytype" name="propertytype">
                                        <option value="residential"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='residential') echo ' selected="selected"' @endphp>
                                            Residential Building</option>
                                        <option value="commercial"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='commercial') echo ' selected="selected"' @endphp>
                                            Commercial Building</option>
                                        <option value="flat"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='flat') echo ' selected="selected"' @endphp>
                                            Flat</option>
                                        <option value="appartments"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='appartments') echo ' selected="selected"' @endphp>
                                            Appartment</option>
                                        <option value="duplex">
                                            Duplex</option>
                                        <option value="villas"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='villas') echo ' selected="selected"' @endphp>
                                            Villa
                                        </option>
                                        <option value="showroom"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='showroom') echo ' selected="selected"' @endphp>
                                            Showroom</option>
                                        <option value="office"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='office') echo ' selected="selected"' @endphp>
                                            Office</option>
                                        <option value="factory"
                                            @php if  ($customerchoiceinfo[0]['propertytpe']=='factory')
                                             echo ' selected="selected"' @endphp>
                                            Factory</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Any Specific city do you want buy property:</label>
                                    <input type="text" class="form-control" name="cityname" id="cityname"
                                        value="@php echo $customerchoiceinfo[0]['cityname'] @endphp" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Any Specific area do you want buy property:</label>
                                    <input type="text" class="form-control" name="areaname" id="areaname"
                                        value="@php echo $customerchoiceinfo[0]['areaname'] @endphp"
                                        placeholder="Area name">
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Which type of payment do you like:</label>
                                    <select class="form-control form-control-lg" id="paymenttype" name="paymenttype">
                                        <option value="cash"
                                            @php if  ($customerchoiceinfo[0]['paymenttype']=='cash') echo ' selected="selected"' @endphp>
                                            Cash</option>
                                        <option value="mortgage"
                                            @php if  ($customerchoiceinfo[0]['paymenttype']=='mortgage') echo ' selected="selected"' @endphp>
                                            Mortgage</option>
                                        <option value="paymentplan"
                                            @php if  ($customerchoiceinfo[0]['paymenttype']=='paymentplan') echo ' selected="selected"' @endphp>
                                            Payment plan</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>when you want to move?:</label>
                                    <select class="form-control form-control-lg" id="movingtime" name="movingtime">
                                        <option value="readytomove"
                                            @php if  ($customerchoiceinfo[0]['movingtime']=='readytomove') echo ' selected="selected"' @endphp>
                                            Ready to move </option>
                                        <option value="offplan"
                                            @php if  ($customerchoiceinfo[0]['movingtime']=='offplan') echo ' selected="selected"' @endphp>
                                            Off plan</option>
                                        <option value="sixmonths"
                                            @php if  ($customerchoiceinfo[0]['movingtime']=='sixmonths') echo ' selected="selected"' @endphp>
                                            6 months</option>
                                        <option value="twelvemonths"
                                            @php if  ($customerchoiceinfo[0]['movingtime']=='twelvemonths') echo ' selected="selected"' @endphp>
                                            12 months</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Any developer do you prefer that want to buy:</label>
                                    <select class="form-control form-control-lg" id="developername" name="developername">
                                        <option value="emaar"
                                            @php if  ($customerchoiceinfo[0]['developername']=='emaar') echo ' selected="selected"' @endphp>
                                            EMAAR Properties</option>
                                        <option value="nakheel"
                                            @php if  ($customerchoiceinfo[0]['developername']=='nakheel') echo ' selected="selected"' @endphp>
                                            NAKHEEL Properties</option>
                                        <option value="sobha"
                                            @php if  ($customerchoiceinfo[0]['developername']=='sobha') echo ' selected="selected"' @endphp>
                                            Sobha Properties</option>
                                        <option value="nochoice"
                                            @php if  ($customerchoiceinfo[0]['developername']=='nochoice') echo ' selected="selected"' @endphp>
                                            No Choice</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>If customer has no choice :</label>
                                    <input type="text" class="form-control"
                                        value="@php echo $customerchoiceinfo[0]['developernamebyus'] @endphp"
                                        name="developernamebyus" id="developernamebyus" placeholder="Developer name" />
                                </div>
                                <div class="col-sm-3 sm-screen-mb">
                                    <label>Any budget range for property? :</label>
                                    <input type="text" class="form-control"
                                        value="@php echo $customerchoiceinfo[0]['totalbudget'] @endphp"
                                        name="totalbudget" id="totalbudget" placeholder="Budget" />
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#modal-updatechoice" data-whatever="@getbootstrap">Update</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-4">Customer Meeting Information</h4>
                            @php
                                $i = 0;
                            @endphp
                            @if (count($customermeetinginfo) == 0)
                                <h4> No record found </h4>
                            @else
                                <table id="customermeetinglist" class="display" style="width:100%" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($customermeetinginfo as $meetinglist)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td> {{ $meetinglist->meeting_date }}</td>
                                                <td> {{ $meetinglist->meeting_time }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#modal-meetinglist" data-whatever="@getbootstrap">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-4">Customer Followup Information</h4>
                            @if (count($customerfollowupinfo) == 0)
                                <h4> No record found </h4>
                            @else
                                <table id="customerfollowuplist" class="display" style="width:100%" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customerfollowupinfo as $followuplist)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td> {{ $followuplist->followup_date }}</td>
                                                <td> {{ $followuplist->followup_time }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#modal-followuplist" data-whatever="@getbootstrap">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-updateinfo" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="margin-top:30px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Customer Basic Information</h5>
                    <button type="button" class="close" onclick="closeinfomodal();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/basicinfosubmit"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="customerid"
                                value=" @php echo $customerinfo->id @endphp ">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="userid"
                                value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="sectiontype"
                                value="1">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Full Name:</label>
                                <input class="form-control" name="fullname"
                                    value="@php echo $customerinfo->fullname @endphp " />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Phone No.:</label>
                                <input class="form-control" name="mobilenumber"
                                    value="@php echo $customerinfo->mobilenumber @endphp" />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Landline No.:</label>
                                <input class="form-control" name="landlinenumber"
                                    value="@php echo $customerinfo->landlinenumber==0  ? '':$customerinfo->landlinenumber @endphp " />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Email:</label>
                                <input class="form-control" name="email"
                                    value="@php echo $customerinfo->email @endphp " />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Address:</label>
                                <input class="form-control" name="address"
                                    value="@php echo $customerinfo->address @endphp " />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Profession:</label>
                                <input class="form-control" name="profession"
                                    value="@php echo $customerinfo->profession @endphp " />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>organisation:</label>
                                <input class="form-control" name="organization"
                                    value="@php echo $customerinfo->organization @endphp" />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Salary:</label>
                                <input class="form-control" name="salary"
                                    value="@php echo $customerinfo->salary== 0 ? '':$customerinfo->salary @endphp" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Salary range:</label>
                                <input class="form-control" name="salaryrange"
                                    value="@php echo $customerinfo->salaryrange== 0 ? '':$customerinfo->salaryrange @endphp" />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Country of origin:</label>
                                <input class="form-control" name="nationality"
                                    value="@php echo $customerinfo->nationality @endphp" />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Current resident city:</label>
                                <input class="form-control" name="country"
                                    value="@php echo $customerinfo->country @endphp " />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success mr-2 ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-updatechoice" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="margin-top:30px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Customer Property Choice</h5>
                    <button type="button" class="close" onclick="closeinterestmodal();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample"
                        action="{{ url('/') }}/user/realestate/customer/propertychoiceinfoupdate" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Do uou have flat in UAE:</label>
                                <select class="form-control form-control-lg" id="flatinuae" name="flatinuaeupdate">
                                    <option value="yes"
                                        @php if  ($customerchoiceinfo[0]['flatinuae']=='yes') echo ' selected="selected"' @endphp>
                                        Yes</option>
                                    <option value="no"
                                        @php if  ($customerchoiceinfo[0]['flatinuae']=='no') echo ' selected="selected"' @endphp>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Do uou want to buy flat in UAE/India:</label>
                                <select class="form-control form-control-lg" id="prefercountry"
                                    name="prefercountryupdate">
                                    <option value="uae"
                                        @php if  ($customerchoiceinfo[0]['prefercountry']=='uae') echo ' selected="selected"' @endphp>
                                        UAE</option>
                                    <option value="india"
                                        @php if  ($customerchoiceinfo[0]['prefercountry']=='india') echo ' selected="selected"' @endphp>
                                        India</option>
                                </select>
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Which types property do you prefer?:</label>
                                <select class="form-control form-control-lg" id="propertytype" name="propertytypeupdate">
                                    <option value="residential"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='residential') echo ' selected="selected"' @endphp>
                                        Residential Building</option>
                                    <option value="commercial"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='commercial') echo ' selected="selected"' @endphp>
                                        Commercial Building</option>
                                    <option value="flat"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='flat') echo ' selected="selected"' @endphp>
                                        Flat</option>
                                    <option value="appartments"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='appartments') echo ' selected="selected"' @endphp>
                                        Appartment</option>
                                    <option value="duplex">
                                        Duplex</option>
                                    <option value="villas"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='villas') echo ' selected="selected"' @endphp>
                                        Villa
                                    </option>
                                    <option value="showroom"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='showroom') echo ' selected="selected"' @endphp>
                                        Showroom</option>
                                    <option value="office"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='office') echo ' selected="selected"' @endphp>
                                        Office</option>
                                    <option value="factory"
                                        @php if  ($customerchoiceinfo[0]['propertytpe']=='factory')
                                             echo ' selected="selected"' @endphp>
                                        Factory</option>
                                </select>
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Any Specific city do you want buy property:</label>
                                <input type="text" class="form-control" name="citynameupdate" id="cityname"
                                    value="@php echo $customerchoiceinfo[0]['cityname'] @endphp" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Any Specific area do you want buy property:</label>
                                <input type="text" class="form-control" name="areanameupdate" id="areaname"
                                    value="@php echo $customerchoiceinfo[0]['areaname'] @endphp" placeholder="Area name">
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Which type of payment do you like:</label>
                                <select class="form-control form-control-lg" id="paymenttype" name="paymenttypeupdate">
                                    <option value="cash"
                                        @php if  ($customerchoiceinfo[0]['paymenttype']=='cash') echo ' selected="selected"' @endphp>
                                        Cash</option>
                                    <option value="mortgage"
                                        @php if  ($customerchoiceinfo[0]['paymenttype']=='mortgage') echo ' selected="selected"' @endphp>
                                        Mortgage</option>
                                    <option value="paymentplan"
                                        @php if  ($customerchoiceinfo[0]['paymenttype']=='paymentplan') echo ' selected="selected"' @endphp>
                                        Payment plan</option>
                                </select>
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>when you want to move?:</label>
                                <select class="form-control form-control-lg" id="movingtime" name="movingtimeupdate">
                                    <option value="readytomove"
                                        @php if  ($customerchoiceinfo[0]['movingtime']=='readytomove') echo ' selected="selected"' @endphp>
                                        Ready to move </option>
                                    <option value="offplan"
                                        @php if  ($customerchoiceinfo[0]['movingtime']=='offplan') echo ' selected="selected"' @endphp>
                                        Off plan</option>
                                    <option value="sixmonths"
                                        @php if  ($customerchoiceinfo[0]['movingtime']=='sixmonths') echo ' selected="selected"' @endphp>
                                        6 months</option>
                                    <option value="twelvemonths"
                                        @php if  ($customerchoiceinfo[0]['movingtime']=='twelvemonths') echo ' selected="selected"' @endphp>
                                        12 months</option>
                                </select>
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Any developer do you prefer that want to buy:</label>
                                <select class="form-control form-control-lg" id="developername"
                                    name="developernameupdate">
                                    <option value="emaar"
                                        @php if  ($customerchoiceinfo[0]['developername']=='emaar') echo ' selected="selected"' @endphp>
                                        EMAAR Properties</option>
                                    <option value="nakheel"
                                        @php if  ($customerchoiceinfo[0]['developername']=='nakheel') echo ' selected="selected"' @endphp>
                                        NAKHEEL Properties</option>
                                    <option value="sobha"
                                        @php if  ($customerchoiceinfo[0]['developername']=='sobha') echo ' selected="selected"' @endphp>
                                        Sobha Properties</option>
                                    <option value="nochoice"
                                        @php if  ($customerchoiceinfo[0]['developername']=='nochoice') echo ' selected="selected"' @endphp>
                                        No Choice</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 sm-screen-mb">
                                <label>If customer has no choice :</label>
                                <input type="text" class="form-control"
                                    value="@php echo $customerchoiceinfo[0]['developernamebyus'] @endphp"
                                    name="developernamebyusupdate" id="developernamebyus" placeholder="Developer name" />
                            </div>
                            <div class="col-sm-3 sm-screen-mb">
                                <label>Any budget range for property? :</label>
                                <input type="text" class="form-control"
                                    value="@php echo $customerchoiceinfo[0]['totalbudget'] @endphp"
                                    name="totalbudgetupdate" id="totalbudget" placeholder="Budget" />
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success mr-2" data-toggle="modal"
                                data-target="#modal-updatechoice" data-whatever="@getbootstrap">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-updateinterest" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Choice</h5>
                    <button type="button" class="close" onclick="closefollowupmodal();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/statussubmit"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="customerid"
                                value=" @php echo $customerinfo->id @endphp ">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="userid"
                                value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="sectiontype"
                                value="1">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="radio"
                                            id="interestedrdbtn" value="1"
                                            @php if ($customerstatusinfo[0]['interest']== '1') {echo ' checked 
                                                        ';} @endphp>
                                        Interested
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="radio"
                                            id="noninterestedrdbtn" value="0"
                                            @php if ($customerstatusinfo[0]['interest']== '0') {echo ' checked 
                                                        ';} @endphp>
                                        Not Interested
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-calllist" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Customer Meeting</h5>
                    <button type="button" class="close" onclick="closecaklledgmodal();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/callinfoupdatesubmit"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="card-title">Customer Called Information</h4>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="customerid"
                                value=" @php echo $customerinfo->id @endphp ">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="userid"
                                value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="sectiontype"
                                value="1">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 sm-screen-mb">
                                <label>Select Meeting Date:</label>
                                <input class="form-control" id="calleddatepickerupdate" name="calleddatepickerupdate" />
                            </div>
                            <div class="col-sm-4 sm-screen-mb">
                                <label>Select Meeting Time:</label>
                                <input class="form-control" type="time" name="calledtimeupdate">
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Total Called </label>
                                    <select class="form-control form-control-lg" id="totalcalled"
                                        name="totalcalledupdate">
                                        <option value="1">First time</option>
                                        <option value="2">Second time</option>
                                        <option value="3">Third time</option>
                                        <option value="4">Fourth time</option>
                                        <option value="5">Fifth time</option>
                                        <option value="6">Last Call</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 sm-screen-mb">
                                <label>Any Remarks:</label>
                                <input class="form-control" type="texarea" name="calledremarkupdate">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-meetinglist" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Meeting Information</h5>
                    <button type="button" class="close" onclick="closemeetingmodal();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/meetingsubmit"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="customerid"
                                value=" @php echo $customerinfo->id @endphp ">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="userid"
                                value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="sectiontype"
                                value="1">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 sm-screen-mb">
                                <label>Select Meeting Date:</label>
                                <input class="form-control" id="meetingdatepickerupdate"
                                    name="meetingdatepickerupdate" />
                            </div>
                            <div class="col-sm-4 sm-screen-mb">
                                <label>Select Meeting Time:</label>
                                <input class="form-control" type="time" name="meetingtimeupdate">
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Total Called </label>
                                    <select class="form-control form-control-lg" id="totalmeeting" name="totalmeeting">
                                        <option value="1">First time</option>
                                        <option value="2">Second time</option>
                                        <option value="3">Third time</option>
                                        <option value="4">Fourth time</option>
                                        <option value="5">Fifth time</option>
                                        <option value="6">Last Call</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 sm-screen-mb">
                                <label>Any Remarks:</label>
                                <input class="form-control" type="texarea" name="meetingremarkupdate">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-followuplist" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Followup Information</h5>
                    <button type="button" class="close" onclick="closefollowupmodal();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/followupsubmit"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="customerid"
                                value=" @php echo $customerinfo->id @endphp ">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="userid"
                                value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <input id="type" type="hidden" class="form-control" name="sectiontype"
                                value="1">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 sm-screen-mb">
                                <label>Select Followup Date:</label>
                                <input class="form-control" id="followupdatepickerupdate"
                                    name="followupdatepickerupdate" />
                            </div>
                            <div class="col-sm-4 sm-screen-mb">
                                <label>Select Followup Time:</label>
                                <input class="form-control" type="time" name="followuptimeupdate">
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Total Called </label>
                                    <select class="form-control form-control-lg" id="totalfollowup" name="totalfollowup">
                                        <option value="1">First time</option>
                                        <option value="2">Second time</option>
                                        <option value="3">Third time</option>
                                        <option value="4">Fourth time</option>
                                        <option value="5">Fifth time</option>
                                        <option value="6">Last Call</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 sm-screen-mb">
                                <label>Any Remarks:</label>
                                <input class="form-control" type="texarea" name="followupremarkupdate">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-email" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="mail" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="sendEmail();">Send
                        Email</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-whatsapp" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">What's App</h5>
                    <button type="button" class="close" onclick="closemodal();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Clinet Number:</label>
                        <div class="input-box">
                            <input type="number" class="form-control" id="recipient-number">
                            <span class="unit">+971</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="submitwhatsapp();">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->


@endsection


<script>
    $(document).ready(function() {
        var table = $('#customercalllist').DataTable({
            "sScrollX": "100%"
        });
        var table = $('#customermeetinglist').DataTable({
            "sScrollX": "100%"
        });
        var table = $('#customerfollowuplist').DataTable({
            "sScrollX": "100%"
        });
    });

    function sendEmail() {
        var email = document.getElementById("recipient-name").value;
        var message = document.getElementById("message-text").value;
        // console.log(email + message);
        var url = 'user/realestate/customer/sendemailtocustomer';
        $('#modal-email').modal('hide');
        $.ajax({
            type: 'POST',
            url: '/sendemail',
            data: {
                email: email,
                message: message,
                _token: '{!! csrf_token() !!}'
            },
            success: function(data) {
                console.log(data.message);

                if (data.message == 'success') {

                    swal({
                        text: 'Email sent successfully',
                        button: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "btn btn-primary"
                        }
                    })
                }

            }
        });
    }

    function closemodal() {
        $('#modal-whatsapp').modal('hide');
        console.log('close');

    }

    function closeinfomodal() {
        $('#modal-whatsapp').modal('hide');
        console.log('close');

    }

    function closechoicemodal() {
        $('#modal-whatsapp').modal('hide');
        console.log('close');

    }

    function closeinterestmodal() {
        $('#modal-whatsapp').modal('hide');
        console.log('close');

    }

    function closefollowupmodal() {
        $('#modal-whatsapp').modal('hide');
        console.log('close');

    }

    function closemeetingmodal() {
        $('#modal-whatsapp').modal('hide');
        console.log('close');

    }

    function closecaklledgmodal() {
        $('#modal-whatsapp').modal('hide');
        console.log('close');

    }


    function submitwhatsapp() {
        var number = document.getElementById("recipient-number").value;
        var mainnumber = '971' + number;
        var url = 'https://api.whatsapp.com/send?phone=' + mainnumber;
        window.open(url, "_blank");
        //  location.href = url;

    }
    $(document).ready(function() {
        $("input[type='radio']").click(function() {
            var radioValue = $("input[name='radio']:checked").val();
            if (radioValue) {
                if (radioValue == 1) {
                    document.getElementById("customerflatpreferance").style.display = "block";
                    document.getElementById("meeting").style.display = "block";
                    document.getElementById("followup").style.display = "block";
                } else {
                    document.getElementById("customerflatpreferance").style.display = "none";
                    document.getElementById("meeting").style.display = "none";
                    document.getElementById("followup").style.display = "none";
                }
            }
        });
    });
</script>
