<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@extends('realestate.layouts.master')

<script></script>
</script>
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Added New Customer List
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($newcustomerlist as $customer)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td> {{ $customer->fullname }}</td>
                                                    <td> {{ $customer->mobilenumber }}</td>
                                                    <td> {{ $customer->email }}</td>
                                                    <td>

                                                        <a class="btn btn-primary" style="padding:8px;"
                                                            href="{{ url('user/realestate/customer/newcustomercall/' . $customer->id) }}">
                                                            Call Customer
                                                        </a>

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

        <!-- main-panel ends -->
    @endsection
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#leadscustomerlist').DataTable({
                "sScrollX": "100%"
            });
        });
    </script>
