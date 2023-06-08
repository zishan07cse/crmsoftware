@extends('realestate.layouts.master')
<style>
.float-left{
    font-size:12px;
    font-weight:bold;
}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
 $( function() {
    $( "#datepicker" ).datepicker();
   
  } );
  $('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
@php $userid = Auth::user()->id  @endphp 
  </script>
</script>   
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
        <h3 class="page-title">
            Realestate  Customer
        </h3>
        </div>
        <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10 mx-auto">
                      <ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" 
                          aria-selected="true">
                            Customer Informantion
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Call Details
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Status
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content tab-content-custom-pill" id="pills-tabContent-custom">
                        <div class="tab-pane fade show active" id="pills-health" role="tabpanel" aria-labelledby="pills-home-tab-custom">
                            <div class="row">
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                             <div class="py-4">
                                                <p class="clearfix">
                                                <span class="float-left">
                                                    Name
                                                </span>
                                                <span class="float-right text-muted">
                                                @php  echo $realestate_customer->fullname @endphp 
                                                </span>
                                                </p>
                                                <p class="clearfix">
                                                <span class="float-left">
                                                    Phone
                                                </span>
                                                <span class="float-right text-muted">
                                                @php  echo $realestate_customer->moblienumber	 @endphp 
                                                </span>
                                                </p>
                                                <p class="clearfix">
                                                <span class="float-left">
                                                    Nationality
                                                </span>
                                                <span class="float-right text-muted">
                                                    @php  echo $realestate_customer->nationality	 @endphp 
                                                </span>
                                                </p>
                                                <p class="clearfix">
                                                <span class="float-left">
                                                     Profession
                                                </span>
                                                <span class="float-right text-muted">
                                                  @php  echo $realestate_customer->profession	 @endphp
                                                </span>
                                                </p>
                                                <p class="clearfix">
                                                <!-- <span class="float-left">
                                                    Status
                                                </span>
                                                <span class="float-right text-muted">
                                                    <a href="#">@davidgrey</a>
                                                </span> -->
                                                </p>
                                            </div>
                                        </div> 
                                    </div>      
                                </div>       
                            </div>     
                        </div>
                        <div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Call</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Meeting</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" 
                                        aria-controls="contact-1" aria-selected="false">Followup</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" 
                                        aria-controls="contact-1" aria-selected="false">Email/Whats app</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                                                <form class="forms-sample" action="{{url('/')}}/user/realestate/customer/callinfosubmit" method="POST" 
                                                 enctype="multipart/form-data">
                                                 @csrf
                                                    <div class="form-group">
                                                        <input id="type" type="hidden" class="form-control" 
                                                            name="customerid" value=" @php  echo $realestate_customer->id @endphp ">
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="type" type="hidden" class="form-control" 
                                                            name="userid" value="{{ Auth::user()->id }}">
                                                    </div> 
                                                    <div class="form-group">
                                                        <input id="type" type="hidden" class="form-control" 
                                                            name="sectiontype" value="1">
                                                    </div>
                                                    <label for="exampleInputName1">Select Called Date</label>
                                                    <div class="form-group">
                                                        <div class='input-group date' id="datepicker">
                                                        <input type='text' class="form-control" name ="date" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="exampleInputName1">Select Called Time</label>
                                                    
                                                        <div class='input-group date' id="datepicker">
                                                        <input type='text' class="form-control"  name="time"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" required>Call</label>
                                                        <select class="form-control form-control-lg" id="totalcalled"  name="totalcalled">
                                                        <option value="1">First time</option>
                                                        <option value ="2">Second time</option>
                                                        <option value="3">Third time</option>
                                                        <option value ="4">Fourth time</option>
                                                        <option value="5">Fifth time</option>
                                                        <option value ="6">Last Call</option>
                                                        </select>
                                                    </div>    
                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                </form>  
                                            </div>
                                            <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                                            <form class="forms-sample">
                                                <div class="form-group">
                                                    <input id="type" type="hidden" class="form-control" 
                                                        name="customerid" value=" @php  echo $realestate_customer->id @endphp ">
                                                </div>
                                                <div class="form-group">
                                                    <input id="type" type="hidden" class="form-control" 
                                                        name="userrid" value="{{ Auth::user()->id }}">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Select Meeting Date</label>
                                                    <div class='input-group date' id="datepicker">
                                                    <input type='text' class="form-control" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputName1">Select Meeting Time</label>
                                                    <div class='input-group date' id="datepicker">
                                                    <input type='text' class="form-control" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1" required>Select Meeting </label>
                                                    <select class="form-control form-control-lg" id="type"  name="type">
                                                    <option value="1">First time</option>
                                                    <option value ="2">Second time</option>
                                                    <option value="3">Third time</option>
                                                    <option value ="4">Fourth time</option>
                                                    <option value="5">Fifth time</option>
                                                    <option value ="6">Last Call</option>
                                                    </select>
                                                </div>    
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button class="btn btn-light">Cancel</button>
                                            </form>
                                            </div>
                                            <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                                            <form class="forms-sample">
                                                <div class="form-group">
                                                    <input id="type" type="hidden" class="form-control" 
                                                        name="customerid" value=" @php  echo $realestate_customer->id @endphp ">
                                                </div>
                                                <div class="form-group">
                                                    <input id="type" type="hidden" class="form-control" 
                                                        name="userrid" value="{{ $userid}}">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Select Follow up Date</label>
                                                    <div class='input-group date' id="datepicker">
                                                    <input type='text' class="form-control" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputName1">Select Follow up Time</label>
                                                    <div class='input-group date' id="datepicker">
                                                    <input type='text' class="form-control" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputName1">Follow up Text</label>
                                                    <div class='input-group date' id="datepicker">
                                                    <input type='text-area' class="form-control" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1" required>Select Followup</label>
                                                    <select class="form-control form-control-lg" id="type"  name="type">
                                                    <option value="1">First time</option>
                                                    <option value ="2">Second time</option>
                                                    <option value="3">Third time</option>
                                                    <option value ="4">Fourth time</option>
                                                    <option value="5">Fifth time</option>
                                                    <option value ="6">Last Call</option>
                                                    </select>
                                                </div>    
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button class="btn btn-light">Cancel</button>
                                            </form>
                                            </div>
                                        </div>
                                </div>
                            </div>    
                        </div>
                        <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                          <div class="form-group" id="section" >
                            <label class="exampleFormControlSelect1">Customer Choice</label>
                            <div class="row mt-2">
                                <div class="col-sm-1">
                                <div class="form-check ">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                                    Interested
                                    </label>
                                </div>
                                </div>
                                <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label mt4">
                                    <input type="checkbox" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                                    Not Interested
                                    </label>
                                </div>
                                </div>
                                  
                                </div>
                            </div>  
                            </div>
                          </div>
                          
                        </div>
                        <div class="tab-pane fade" id="pills-vibes" role="tabpanel" aria-labelledby="pills-vibes-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/15.jpg" alt="sample image">
                            <div class="media-body">
                              <p>
                                  This man is a knight in shining armor. I feel like a jigsaw puzzle missing a piece. And I'm not 
                                  even sure what the picture should be. Somehow, I doubt that. You have a good heart, Dexter. Keep your mind limber.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="pills-energy" role="tabpanel" aria-labelledby="pills-energy-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/11.jpg" alt="sample image">
                            <div class="media-body">
                              <p>
                                  Finding a needle in a haystack isn't hard when every straw is computerized. You're a killer. I catch killers. 
                                  I will not kill my sister. I will not kill my sister. I will not kill my sister. Rorschach would say you have a hard time relating to others.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
        @php //echo $realestate_customer->fullname @endphp 
    </div> 
</div>  
  
    <!-- main-panel ends -->
@endsection
<script>
    
</script>
