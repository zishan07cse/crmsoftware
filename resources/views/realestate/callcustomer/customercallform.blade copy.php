@extends('realestate.layouts.master')
<style>
.float-left{
    font-size:12px;
    font-weight:bold;
}
</style>
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
                                                <span class="float-left">
                                                    Status
                                                </span>
                                                <span class="float-right text-muted">
                                                    <a href="#">@davidgrey</a>
                                                </span>
                                                </p>
                                            </div>
                                        </div> 
                                    </div>      
                                </div>       
                            </div>     
                        </div>
                        <div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="http://www.urbanui.com/" alt="sample image">
                            <div class="media-body">
                              <p>I'm thinking two circus clowns dancing. You? Finding a needle in a haystack isn't hard when every straw is 
                                computerized. Tell him time is of the essence. 
                                Somehow, I doubt that. You have a good heart, Dexter.</p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/14.jpg" alt="sample image">
                            <div class="media-body">
                              <p>
                                  I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ, 
                                  I think we have a lot to discuss. After all, you are a client. You all right, Dexter?
                              </p>
                              <p>
                                  I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer. 
                                  I catch killers. Hello, Dexter Morgan.
                              </p>
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