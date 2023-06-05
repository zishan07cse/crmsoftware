@extends('admin.layouts.master')

@section('content')
    <style>
        .btn-block {
            height: 100px;
        }
    </style>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Dashboard
                </h3>
            </div>
            <div class="row grid-margin">
                <div class="col-12">
                    <div class="row">

                        <div class="col-lg-4">
                            <button type="button" class="btn btn-info btn-lg btn-block">Real Estate</button>
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-info btn-lg btn-block">Invetment Service</button>
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-info btn-lg btn-block">It / Software Service</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- main-panel ends -->
@endsection
