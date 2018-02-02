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
          <div data-page="login" class="page no-navbar">
            <!-- Scrollable page content -->
            <div class="page-content">
                <div class="content-block">
                    <img class="logo" src="assets/custom/img/smt2_e.png" alt="logo" />
                </div>
              <h1 class="text-center">Let's Celebrate STM 30th Anniversary</h1>
              <div class="content-block" style="margin:0;">
              <!--<div class="buttons-row">
              <span class="fa-2x fa-stack text-center" title="Pin">
                   <span class="fa fa-circle fa-stack-2x color-youtube"></span>
                   <span class="fa fa-map-marker fa-stack-1x fa-inverse"></span>
               </span>
               <h2 class="text-center">สวนนงนุช exhibition hall | 11 กุมภาพันธ์ 2561<h2>
  
               </div>-->
               <img class="logo" src="assets/custom/img/icon_placesapi.svg" alt="Pin"  style="height:5em;"/>
               <h1 class="text-center" style="border-bottom: solid;border-width: 2px;">สวนนงนุช พัทยา <br>@ International Convention and Exhibition Center</h1>
              <h2 class="text-center">11 กุมภาพันธ์ 2561</h2>
              <h2 class="text-center">11 February 2561</h2>
              </div>
              
               <div class="content-block" style="margin:auto 0;">
                   <div class="col-100" style="padding-bottom: 10px;">
                      
                              <!--<a href="{{ route('register') }}" class="button button-big button-block
                              button-fill button-raised button-round button-linkedin text-center"
                            role="button" style="height: 6em;" >
                            <span style="font-size: xx-large;line-height: 2.5em;"><i class="fa fa-external-link-square" style="padding-right: 10px;">
                                </i>เช็คอิน / Check In</span></a>-->
                                <a href="#" id="checkin_home" class="button button-big button-block
                              button-fill button-raised button-round button-linkedin text-center"
                            role="button" style="height: 6em;" >
                            <span style="font-size: xx-large;line-height: 2.5em;"><i class="fa fa-external-link-square" style="padding-right: 10px;">
                                </i>เช็คอิน / Check In</span></a>
                      
                  </div>
                  <div class="col-100" style="padding-bottom: 10px;">

{{--                      <a href="{{ route('menu') }}" class="link external button button-big button-block --}}
                      <a href="menu" class="link external button button-big button-block
                      button-fill button-raised button-round button-linkedin text-center"
                    role="button" style="height: 6em;" >
                    <span style="font-size: xx-large;line-height: 2.5em;"><i class="fa fa-bars" style="padding-right: 10px;">
                        </i>เมนู / Menu</span></a>

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