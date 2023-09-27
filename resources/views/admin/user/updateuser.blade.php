@extends('admin.layouts.master')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
        <h3 class="page-title">
            Update User
        </h3>
        </div>
        <div class="row">
              @php
                  //var_dump($userlist);
              @endphp
              <div class="col-md-6 grid-margin stretch-card">
              
              <div class="card">
                <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  <h4 class="card-title">Create User</h4>
                  <form class="forms-sample" action="{{url('/admin/user/update',['id' => $userinfo->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input id="type" type="hidden" class="form-control" 
                            name="userid" value="{{$userinfo->id}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input id="username" type="text" class="form-control" 
                          name="name" value="{{$userinfo->name}}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input id="useremail" type="email" name="email" readonly class="form-control"  value="{{$userinfo->email}}"
                      required autocomplete="email" autofocus>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input id="userpassword" type="password" name="password" class="form-control" placeholder="Password"
                      required autocomplete="password" value="{{$userinfo->password}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation" id="userconfirmpass" placeholder="Password" 
                      required autocomplete="password" value="{{$userinfo->password}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1" required>User Type</label>
                    <select class="form-control form-control-lg" id="type"  name="type">
                        @if($userinfo->type =='Admin')   
                            <option value="1" selected>Admin</option>
                            <option value ="0" selected>User</option>
                        @else 
                            <option value="1">Admin</option>
                            <option value ="0" selected>User</option>
                        @endif    
                    </select>
                  </div>
                   <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div> 
          </div>        
        </div>
    <div>
</div>  
    <!-- main-panel ends -->
@endsection