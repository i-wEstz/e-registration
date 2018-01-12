<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.head')
</head>
<body>
    <!-- Views -->
    <div class="views">
      <!-- Your main view, should have "view-main" class -->
      <div class="view view-main">
        <!-- Top Navbar-->
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
          <div data-page="login" class="page">

             <!-- Top Navbar -->
          <div class="navbar">
              <div class="navbar-inner">
                <div class="title" style="padding-left:10px">STM 30th Anniversary</div>
                <div class="right">
                    <a href="{{ route('home') }}" data-panel="right" class="link open-panel">
                      <i class="material-icons">home</i>
                    </a>
                  </div>
              </div>
            </div>
  
            <!-- Scrollable page content -->
            <div class="page-content">
                <div class="content-block" style="margin-bottom:0px;">
                    <div class="row">
                      <div class="col-100">
                          <div class="card">
                              <div class="card-header"><b>Check-ins</b></div>
                              <div class="card-content">
                                <div class="card-content-inner text-center" style="color:green;">
                      
                                  <i class="material-icons" style="font-size:5em;">beenhere</i>
                                  <p><span data-progress="75" class="progressbar color-green"><span style="transform: translate3d(-25%, 0px, 0px);"></span></span></p>
                                  <h1 style="margin:0px">2436</h1>

                                  <p style="margin:0px">ATTENDEES CHECKED IN</p>
                                </div>
                              </div>
                          </div> 
                      </div> 
                    <div class="col-50"><div class="card">
                      <div class="card-header"><b>Count Down</b></div>
                      <div class="card-content">
                        <div class="card-content-inner text-center">
                          <p>Your Event on <b>11 Feb 2018</b></p>
                          <i class="material-icons" style="font-size:5em;">access_alarm</i>
                          <h1 style="margin:0px" id="countdown"></h1>
                          <p style="margin:0px">DAYS LEFT</p>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="col-50">
                      <div class="card">
                        <div class="card-header"><b>Total Attendees</b></div>
                        <div class="card-content">
                          <div class="card-content-inner text-center">
                              <p>We are here <b>JOIN US!</b></p>
                              <i class="material-icons" style="font-size:5em;">accessibility</i>
                              <h1 style="margin:0px">{!! $result["registered"] !!}</h1>
                              <p style="margin:0px">ATTENDEES</p>

                              <h1 style="margin:0px">{!! $result["follower"] !!}</h1>
                              <p style="margin:0px">FOLLOWER</p>

                              <h1 style="margin:0px">{!! $result["summary"] !!}</h1>
                              <p style="margin:0px">SUMMARY</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content-block" style="margin-top:0px;">
                  <div class="row">
                    <div class="title"><h1><i class="material-icons">subject</i>MENU</h1></div>
                  <div class="col-100">
                      <div class="card">
                          <div class="card-content" style="color:#2196f3;">
                            <div class="card-content-inner text-center">
                              <i class="material-icons" style="font-size:5em;">today</i>
                              <h3 style="margin:0px">ตารางกิจกรรม/Agenda</h3>
                            </div>
                          </div>
                        </div>
                  </div> 
                  <div class="col-100">
                      <div class="card">
                          <div class="card-content" style="color:#2196f3;">
                            <div class="card-content-inner text-center">
                              <i class="material-icons" style="font-size:5em;">card_giftcard</i>
                              <h3 style="margin:0px">ของรางวัล/Reward</h3>
                            </div>
                          </div>
                        </div>
                    </div> 
                    <div class="col-100">
                        <div class="card">
                            <div class="card-content" style="color:#2196f3;">
                              <div class="card-content-inner text-center">
                                <i class="material-icons" style="font-size:5em;">streetview</i>
                                <h3 style="margin:0px">ตำแหน่งที่ตั้งบูธ/Map</h3>
                              </div>
                            </div>
                          </div>
                      </div> 
                      <div class="col-100">
                          <div class="card">
                              <div class="card-content" style="color:#2196f3;">
                                <div class="card-content-inner text-center">
                                  <i class="material-icons" style="font-size:5em;">camera_enhance</i>
                                  <h3 style="margin:0px">บูธเช็คอิน/Booth QR</h3>
                                </div>
                              </div>
                            </div>
                        </div>   
                        <div class="col-100">
                            <div class="card">
                                <div class="card-content" style="color:#2196f3;">
                                  <div class="card-content-inner text-center">
                                    <i class="material-icons" style="font-size:5em;">comment</i>
                                    <h3 style="margin:0px">แบบสอบถาม/Survey</h3>
                                  </div>
                                </div>
                              </div>
                          </div> 
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
     @include('includes.script')
</body>
<footer>
    
</footer>   
</html>