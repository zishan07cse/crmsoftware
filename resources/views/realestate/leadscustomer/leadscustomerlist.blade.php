<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
@extends('realestate.layouts.master')
<style>
    .btn-danger {
        padding: 8px !important;
        margin-left: 10px !important;
        width: 74px !important;
    }

    .btn-primary {
        padding: 8px !important;
    }

    @media only screen and (min-width : 20px) {
        .btn-primary {
            padding: 8px !important;
        }
    }
</style>
<script>
    $(function() {
        $("#sellingdate").datepicker();

    });
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
                            <div class="row mt-4">
                                <div class="col-12">
                                    @php
                                    $i = 0; @endphp
                                    <table id="leadscustomerlist" class="display" style="width:100%" class="table">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leadsustomerlist as $leads)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td> {{ $leads->fullname }}</td>
                                                    <td> {{ $leads->mobilenumber }}</td>
                                                    @if ($leads->email != '')
                                                        @php $email = $leads->email @endphp
                                                    @else
                                                        @php  $email = "Not found" @endphp
                                                    @endif

                                                    <td>
                                                        @php echo $email @endphp
                                                    </td>
                                                    @if ($leads->address != '')
                                                        @php $address = $leads->address @endphp
                                                    @else
                                                        @php  $address = "Not found" @endphp
                                                    @endif
                                                    <td>
                                                        @php echo $address @endphp
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a class="btn btn-primary update"
                                                                href="{{ url('user/realestate/customer/leadsupdate/' . $leads->id) }}">
                                                                Update</a>
                                                            <button type="submit" class="btn btn-danger sell"
                                                                onclick="sellingmodal({{ $leads->id }});">Sell</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-sellproperty" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" style="margin-top:30px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Flat Sell Information</h5>
                        <button type="button" class="close" onclick="closesellmodal();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/sellinginfosubmit"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="customerid" name="customerid">
                            </div>
                            <div class="form-group">
                                <input id="type" type="hidden" class="form-control" name="userid"
                                    value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Cityname</label>
                                    <input type="text" class="form-control" id="sellingcityname" name="sellingcityname"
                                        required />
                                </div>
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Selling Area Name:</label>
                                    <input class="form-control" id="sellingareaname" name="sellingareaname" required />
                                </div>
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Payment Type:</label>
                                    <select class="form-control form-control-lg" id="sellingpaymenttype"
                                        name="sellingpaymenttype">
                                        <option value="cash">Cash</option>
                                        <option value="mortgage">Mortgage</option>
                                        <option value="paymentplan">Payment plan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Total Price</label>
                                    <input type="number" class="form-control" id="totalprice" name="totalprice" required />
                                </div>
                                <div class="col-sm-4 sm-screen-mb">
                                    <label>Selling Date:</label>
                                    <input class="form-control" id="sellingdate" name="sellingdate" required />
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

        <!-- main-panel ends -->
    @endsection
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        function sellingmodal(customerid) {
            $("#customerid").empty();
            $('#modal-sellproperty').modal('show');
            $('#customerid').val(customerid);
            console.log(customerid);
        }

        function closesellmodal() {
            console.log('close');
            $('#modal-sellproperty').modal('hide');
            console.log('close');
        }

        $(document).ready(function() {
            var table = $('#leadscustomerlist').DataTable({
                "sScrollX": "100%"
            });
        });
    </script>
