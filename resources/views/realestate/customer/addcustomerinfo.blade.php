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
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .ml-10 {
        margin-left: 10px;
    }
</style>
<script></script>
</script>
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Add Customer Information
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (session('success'))
                                        <div class="alert alert-success mb-1 mt-1">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="addnewcustomerradio"
                                                id="singleinfo" value="1" checked="checked">
                                            Single Customer Information
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="addnewcustomerradio"
                                                id="multipleinfo" value="0" required>
                                            Mulitple Customer Information
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="singlecustomerinfo">
                                <h4 class="card-title mt-4">Customer Basic Information</h4>
                                <form class="forms-sample"
                                    action="{{ url('/') }}/user/realestate/customer/newcustomerinfosubmit"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input id="type" type="hidden" class="form-control" name="customerid">
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
                                            <input class="form-control" type="text" name="fullnamenew"
                                                placeholder="Full Name" required>
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Phone No.:</label>
                                            <input class="form-control" name="mobilenumbernew" type="number"
                                                placeholder="Mobie Number" required />
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Landline No.:</label>
                                            <input class="form-control" type="number" name="landlinenumbernew"
                                                placeholder="Landline Number" required />
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Email:</label>
                                            <input class="form-control" name="emailnew" type="email" placeholder="Email"
                                                required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Address:</label>
                                            <input class="form-control" name="addressnew" type="text"
                                                placeholder="Address" required />
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Profession:</label>
                                            <input class="form-control" name="professionnew" type="text"
                                                placeholder="Profession" required />
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>organisation:</label>
                                            <input class="form-control" name="organizationnew" type="text"
                                                placeholder="Organization" required />
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Salary:</label>
                                            <input class="form-control" name="salarynew" type="text"
                                                placeholder="Salary" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Salary range:</label>
                                            <input class="form-control" name="salaryrangenew" type="text"
                                                placeholder="Salary Range" required />
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Country of origin:</label>
                                            <input class="form-control" name="nationalitynew" type="text"
                                                placeholder="Nationality" required />
                                        </div>
                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Current resident city:</label>
                                            <input class="form-control" name="countrynew" type="text"
                                                placeholder="Country" required />
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <div class="col-sm-3">
                                            <label>Customer has reference:</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="hasreference"
                                                        id="has_reference" value="yes">
                                                    Has reference
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="hasreference"
                                                        id="hasno_reference" value="no">
                                                    No reference
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="referenceview" style="display:none;">
                                        <div class="col-sm-3 sm-screen-mb">
                                            <div class="form-group">
                                                <label>Search Referance (by
                                                    name/mobile/landline/email/organization):</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="referenceinfo"
                                                        placeholder="Search reference" aria-label="reference">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm btn-primary" type="button"
                                                            onclick="searchreference();">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="referencedetailview" class="ml-10" style="display:none;">
                                            <div class="form-group row ">
                                                <div class="col-sm-2 sm-screen-mb" style="display:none;">
                                                    <input class="form-control" id="referenceid" name="referenceid"
                                                        type="text" />

                                                </div>
                                                <div class="col-sm-2 sm-screen-mb">
                                                    <label>Full Name:</label>
                                                    <div id="referencename">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 sm-screen-mb">
                                                    <label>Phone No.:</label>
                                                    <div id="referenphone">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="referencedetailviewnodata" class="ml-10" style="display:none;">
                                            <h5> No data found </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-5">
                                        <button type="submit" class="btn btn-success mr-2 ">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div id="uploadcustomerlist" style="display:none;">
                                <div class="row">
                                    <div class="col-sm-3 sm-screen-mb">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" required>File Type</label>
                                            <select class="form-control form-control-lg" id="totalcalled"
                                                name="totalcalled" required>
                                                <option value="1">CSV/EXCEL File</option>
                                                <option value="2">SQL File</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <form class="forms-sample"
                                    action="{{ url('/') }}/user/realestate/customer/realestatecustomerimport"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-sm-3 sm-screen-mb">
                                            <label>Upload File:</label>
                                            <input class="form-control" name="file" type="file" required />
                                        </div>

                                    </div>
                                    <div class="col-sm-6 mt-5">
                                        <button type="submit" class="btn btn-success mr-2 ">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main-panel ends -->
    @endsection

    <script>
        $(document).ready(function() {
            var hasreference = document.getElementById('has_reference');
            var hasnoreference = document.getElementById('hasno_reference');
            $("input[type='radio']").click(function() {
                var radioinfoValue = $("input[name='addnewcustomerradio']:checked").val();
                if (radioinfoValue) {
                    if (radioinfoValue == 1) {
                        document.getElementById("uploadcustomerlist").style.display = "none";
                        document.getElementById("singlecustomerinfo").style.display = "block";
                    } else {
                        document.getElementById("uploadcustomerlist").style.display = "block";
                        document.getElementById("singlecustomerinfo").style.display = "none";
                    }
                }
            });
            $("input[type='checkbox']").click(function() {
                var checkedValue;
                $('input[type="checkbox"]').not(this).prop('checked', false);
                if ($('#has_reference').is(":checked")) {
                    $("#referenceid").empty();
                    $("#referencename").empty();
                    $("#referenphone").empty();
                    document.getElementById("referenceview").style.display = "block";
                    document.getElementById("referencedetailviewnodata").style.display = "none";
                }
                if ($('#hasno_reference').is(":checked")) {
                    $("#referenceid").empty();
                    $("#referencename").empty();
                    $("#referenphone").empty();
                    document.getElementById("referenceview").style.display = "none";
                    document.getElementById("referencedetailviewnodata").style.display = "none";
                }
            });

        });

        function searchreference() {
            var searchval = document.getElementById("referenceinfo").value;
            console.log(searchval);
            // return;
            if (searchval == null || searchval === 'undefined') {
                alert('Please enter the reference value');
                // variable is undefined or null
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'referencesearch',
                    data: {
                        searchfield: searchval,
                        _token: '{!! csrf_token() !!}'
                    },
                    success: function(data) {

                        if (data.referenceinfo.length > 0) {
                            document.getElementById("referencedetailviewnodata").style.display = "none";
                            $("#referenceid").empty();
                            $("#referencename").empty();
                            $("#referenphone").empty();
                            var referenceid = data.referenceinfo[0].id;
                            var fullname = data.referenceinfo[0].fullname;
                            var mobile = data.referenceinfo[0].mobilenumber;
                            console.log(fullname + mobile + referenceid);
                            document.getElementById("referencedetailview").style.display = "block";
                            $('#referenceid').val(referenceid);
                            $('#referencename').text(fullname);
                            $('#referenphone').text(mobile);
                            document.getElementById("referenphone").innerHTML = mobile;
                        } else {
                            $("#referenceid").empty();
                            $("#referencename").empty();
                            $("#referenphone").empty();
                            document.getElementById("referencedetailview").style.display = "none";
                            document.getElementById("referencedetailviewnodata").style.display = "block";
                        }

                    }
                });
            }
        }
    </script>
