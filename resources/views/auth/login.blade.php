@extends('layouts.master_login')
@section('content')
    @php
        $param = '1';
        $dashboardtype = '1';
    @endphp
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="logo">
                                <img src="{{ asset('/images/st_logo.png') }}" alt="logo">
                            </div>
                            <h4>Welcome !</h4>
                            <h6 class="font-weight-light">In our new CRM Software</h6>

                            <form class="pt-3" method="POST" action="{{ url('/') }}/login/loginsubmit">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fa fa-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="fa fa-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" required>Section</label>
                                    <select class="form-control form-control-lg" id="usersection" name="usersection">
                                        <option value="1">Realestate</option>
                                        <option value="2">Investment</option>
                                        <option value="3">Software</option>
                                    </select>
                                </div>

                                <div class="my-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy;
                            <?php echo date('Y'); ?> <a href="https://www.stowrichgroup.com/" target="_blank">Stowrich Group.</a>
                            All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
