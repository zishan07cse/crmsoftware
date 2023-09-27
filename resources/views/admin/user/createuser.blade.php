@extends('admin.layouts.master')

@section('content')
<style>
  .mt4{
    margin-top:12px;
  }
</style>  
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
        <h3 class="page-title">
            Create User
        </h3>
        </div>
        <div class="row">
         
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
                  <form class="forms-sample" action="{{url('/')}}/admin/user/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fullname</label>
                      <input id="username" type="text" class="form-control @error('name') is-invalid
                          @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input id="useremail" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                    <div class="form-group">
                      <label for="e utPassword1">Password</label>
                      <input id="userpassword" type="password" name="password" class="form-control" placeholder="Password"
                      required autocomplete="password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation" id="userconfirmpass" placeholder="Password" 
                      required autocomplete="password">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1" required>User Type</label>
                    <select class="form-control form-control-lg" id="type"  name="type" onChange="selectType();">
                      <option value="1">Admin</option>
                      <option value ="0">User</option>
                    </select>
                    </div>
                    <div class="form-group" id="section" style="display:none" >
                      <label class="exampleFormControlSelect1">Section</label>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-check ">
                            <label class="form-check-label mt4">
                              <input type="checkbox" class="form-check-input" name="section[]" id="section1" value="1" checked>
                              Realestate
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label mt4">
                              <input type="checkbox" class="form-check-input" name="section[]" id="section2" value="2">
                              Investment
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label mt4">
                              <input type="checkbox" class="form-check-input" name="section[]" id="section3" value="3">
                              Software
                            </label>
                          </div>
                        </div>
                      </div>  
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
<script>

  function selectType(){
    var e = document.getElementById("type");
    var value = e.value;
    console.log(value);
    if(value==0){
      document.getElementById('section').style.display = 'block';
    }else{
      document.getElementById('section').style.display = 'none';
    }
    
  }

</script>  