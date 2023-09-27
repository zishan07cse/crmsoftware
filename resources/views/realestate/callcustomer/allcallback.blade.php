<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
@extends('realestate.layouts.master')

<script>
    $(function() {
        $("#sellingdate").datepicker();

    });
</script>s
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Callback List
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
                                    <table id="calldate" class="display" style="width:100%" class="table">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Full Name </th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($callbacklist as $callbacklist)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td> {{ $callbacklist->fullname }}</td>
                                                    <td> {{ $callbacklist->called_date }}</td>
                                                    <td> {{ $callbacklist->called_date }}</td>
                                                    <td>
                                                        <a class="btn btn-primary" style="padding:8px;"
                                                            href="{{ url('user/realestate/customer/customercallback/' . $callbacklist->id) }}">
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
            var table = $('#calldate').DataTable({
                "sScrollX": "100%"
            });
        });
    </script>
