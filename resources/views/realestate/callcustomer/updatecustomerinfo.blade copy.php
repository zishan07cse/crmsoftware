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
<link rel="stylesheet" href="http://www.urbanui.com/" />
<link rel="stylesheet" href="http://www.urbanui.com/" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .loader {
        border: 16px solid #DEDEDE;
        border-top: 16px solid #F5A623;
        border-radius: 50%;
        width: 120px;
        height: 120px;
    }

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

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .sm-screen-mb {
        margin-bottom: 0px;
    }

    @media only screen and (min-width: 320px) {

        /* For mobile phones: */
        .sm-screen-mb {
            margin-bottom: 18px;
        }
    }
</style>
<script>
    $(function() {
        $("#updatedatepicker").datepicker();

    });
    if ($("#timepicker-example").length) {
        $('#timepicker-example').datetimepicker({
            format: 'LT'
        });
    }
    $(function() {
        $("#meetingdatepicker").datepicker();

    });

    $(function() {
        $("#followupdatepicker").datepicker();

    });
    @php $userid = Auth::user()->id  @endphp
</script>
</script>
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="col-lg-12">
                    <div class="loader" style="display:none;"></div>
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
                            <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/callinfosubmit"
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
                                            value="@php echo $customerinfo->mobilenumber @endphp " />
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
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success mr-2 ">Update</button>
                                </div>
                            </form>
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
                            <form class="forms-sample"
                                action="{{ url('/') }}/user/realestate/customer/callinfosubmit" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <div class="col-sm-3">
                                        <label>Customer Choice:</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1">
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
                                    <div class="col-sm-2">
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
                                    <button type="submit" class="btn btn-success mr-2 ">Update</button>
                                </div>
                            </form>
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
                                <button type="submit" class="btn btn-success mr-2 ">Update</button>
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
                            @csrf
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
                                <button type="submit" class="btn btn-success mr-2 ">Update</button>
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
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2 ">Update</button>
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
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mr-2 ">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- main-panel ends -->
@endsection


<script>
    function sendEmail() {
        var email = document.getElementById("recipient-name").value;
        var message = document.getElementById("message-text").value;
        $('#modal-email').modal('hide');
        $.ajax({
            type: 'POST',
            url: 'sendemail',
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
