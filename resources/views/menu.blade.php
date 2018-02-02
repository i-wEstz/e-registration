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
                    {{--<a href="{{ route('home') }}" data-panel="right" class="link open-panel">--}}
                    <a href="home" data-panel="right" class="link open-panel">
                      <i class="material-icons">home</i>
                    </a>
                  </div>
              </div>
            </div>
  
            <!-- Scrollable page content -->
            <div class="page-content">
                <div class="content-block" style="margin-top:0px;">
                  <div class="row">
                    <div class="title"><h1><i class="material-icons">subject</i>MENU</h1></div>
                  <div class="col-100">
                      <a href="./agenda">
                      <div class="card" id="agenda">
                          <div class="card-content" style="color:#2196f3;">
                            <div class="card-content-inner text-center">
                              <i class="material-icons" style="font-size:5em;">today</i>
                              <h3 style="margin:0px">ตารางกิจกรรม/Agenda</h3>
                            </div>
                          </div>
                        </div>
                      </a>
                  </div> 
                  <div class="col-100">
                      <a href="./reward">
                      <div class="card">
                          <div class="card-content" style="color:#2196f3;">
                            <div class="card-content-inner text-center">
                              <i class="material-icons" style="font-size:5em;">card_giftcard</i>
                              <h3 style="margin:0px">ของรางวัล/Reward</h3>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div> 
                    <div class="col-100">
                      <a href="#">
                        <div class="card">
                            <div class="card-content" style="color:#353535;background: lightgrey;">
                              <div class="card-content-inner text-center">
                                <i class="material-icons" style="font-size:5em;">card_membership</i>
                                <h3 style="margin:0px">สรุปผู้รับรางวัล/Winners</h3>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    <div class="col-100">
                        <a href="./map">
                        <div class="card">
                            <div class="card-content" style="color:#2196f3;">
                              <div class="card-content-inner text-center">
                                <i class="material-icons" style="font-size:5em;">streetview</i>
                                <h3 style="margin:0px">ตำแหน่งที่ตั้งบูธ/Map</h3>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-100">
                        <a href="./bus">
                        <div class="card">
                            <div class="card-content" style="color:#2196f3;">
                              <div class="card-content-inner text-center">
                                <i class="material-icons" style="font-size:5em;">directions_bus</i>
                                <h3 style="margin:0px">ตารางเวลารถรับส่ง/Employee Bus</h3>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>  
                      <div class="col-100">
                        <a href="#">
                        <div class="card">
                            <div class="card-content" style="color:#353535;background: lightgrey;">
                              <div class="card-content-inner text-center">
                                <i class="material-icons" style="font-size:5em;">contact_phone</i>
                                <h3 style="margin:0px">ติดต่อคณะทำงาน/Contact</h3>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>  
                      <div class="col-100">
                        <a href="#">
                          <div class="card">
                              <div class="card-content" style="color:#353535;background: lightgrey;">
                                <div class="card-content-inner text-center">
                                  <i class="material-icons" style="font-size:5em;">camera_enhance</i>
                                  <h3 style="margin:0px">เช็คอิน/Check in</h3>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>   
                        <div class="col-100">
                            <a href="#">
                            <div class="card">
                                <div class="card-content" style="color:#353535;background: lightgrey;">
                                  <div class="card-content-inner text-center">
                                    <i class="material-icons" style="font-size:5em;">comment</i>
                                    <h3 style="margin:0px">แบบประเมิณกิจกรรม/Evalution form</h3>
                                  </div>
                                </div>
                              </div>
                            </a>
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