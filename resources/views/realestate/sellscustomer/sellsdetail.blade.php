@extends('realestate.layouts.master')
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
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
                    Flat Sell Information
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Full Name:</label>
                                    <input class="form-control" name="fullname" value="@php echo $fullname @endphp " />
                                </div>
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Selling Date:</label>
                                    <input class="form-control" name="sellingdate"
                                        value="@php echo $sellsdetail[0]['sellingdate'] @endphp " />
                                </div>
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Area Name:</label>
                                    <input class="form-control" name="sellingareaname"
                                        value="@php echo $sellsdetail[0]['sellingareaname'] @endphp " />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>City Name:</label>
                                    <input class="form-control" name="sellingcityname"
                                        value="@php echo  $sellsdetail[0]['sellingcityname'] @endphp " />
                                </div>
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Payment Type:</label>
                                    <input class="form-control" name="sellingpaymenttype"
                                        value="@php echo $sellsdetail[0]['sellingpaymenttype'] @endphp " />
                                </div>
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Total Price:</label>
                                    <input class="form-control" name="totalprice"
                                        value="@php echo $sellsdetail[0]['totalprice'] @endphp " />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main-panel ends -->
@endsection
