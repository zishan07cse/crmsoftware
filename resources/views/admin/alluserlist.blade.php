<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
<style>
.no-padding{
    padding: 0px;
}
</style>

@extends('admin.layouts.master')

@section('content')
{{-- @if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> something we are problems with your input.<br><br>
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif --}}
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
        <h3 class="page-title">
            User List
        </h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif
        </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                @php
                $i=0 @endphp
                <table id="customerlist" class="display"  style="width:100%" class="table">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($userlist as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td> {{$user->name}}</td>
                            <td> {{$user->email}}</td>
                            <td>{{ucfirst($user->type)}}</td>
                            <td > 
                                <form action="{{ url('/delete', ['id' => $user->id]) }}" method="Post">
                                    <a class="btn btn-primary" style="padding:8px;" href="{{url('admin/user/edit/'.$user->id)}}">
                                        Update</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding:8px;">Delete</button>
                                </form>
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
<div>
    
    <!-- main-panel ends -->
@endsection
<script src="{{ asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
 $(document).ready(function () {
    var table = $('#customerlist').DataTable({
        "sScrollX": "100%"  
    });
});
</script>    