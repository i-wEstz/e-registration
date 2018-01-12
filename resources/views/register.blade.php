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
       
       <div class="pages">
        <div data-page="login" class="page">

			<!-- Begin: Navbar -->
			<div class="navbar">
					<div class="navbar-inner">
						<div class="left">
							<a href="#" class="link icon-only back">
								<i class="icon icon-back"></i>
							</a>
						</div>
						<div class="center">เช็คอิน / Check In</div>
					</div>
				</div>
				<!-- End: Navbar -->

                <!-- Begin: Page Content -->
  <div class="page-content" style="display:block;">
		<div class="content-block">

      <div class="row">
		</div>
  </div>

		<form name="login" id="login" action="#" method="POST" enctype="multipart/form-data">
			<div class="list-block no-hairlines" style="margin:0px;">
				<ul>
					<li>
            <div class="text-center">
            <h1>กรุณาใส่รหัสพนักงาน<br>Fill your employee number here</h1>
            </div> 
						<div class="item-content" style="background:whitesmoke;">
							<div class="item-media">
								<i class="material-icons" style="font-size:2.5em;line-height:1.2;">loyalty</i>
							</div>
							<div class="item-inner">
								<div class="item-title floating-label">รหัสพนักงาน/Employee ID</div>
								<div class="item-input">
									<input type="text" name="id" placeholder="รหัสพนักงาน/Employee ID" required />
								</div>
								<div class="item-text input-error"></div>
							</div>
							<!--<div class="item-inner">
								<div class="item-input">
									<input type="text" name="id" placeholder="รหัสพนักงาน/Employee ID" required />
								</div>
								<div class="item-text input-error"></div>
							</div>-->
						</div>
					</li>
					<li>
					<!--	<div class="item-content">
							<div class="item-media">
								<i class="material-icons">loyalty</i>
							</div>
							<div class="item-inner">
								<div class="item-input">
									<input type="text" name="text" placeholder="ชื่อ-นามสกุล/Name" />
								</div>
								<div class="item-text input-error"></div>
							</div>
						</div> -->
					</li>
				</ul>
      </div>
      <!--<div class="content-block text-center" style="margin-top:1em;margin-bottom:1em;">-->
          <!--<i class="material-icons" style="font-size:5em;">face</i>-->
          <!--<p style="margin:0px"><i class="material-icons">face</i> ชื่อ-นามสกุล/Name-Surname</p>
          <h1 style="margin:0px">สมชาย ทำดี</h1>
      </div>-->
     <!-- <div class="content-block-title"><b>จำนวนผู้ติดตาม/Number of Attendees</b></div> -->
      <div class="list-block" style="background:whitesmoke;">
		<ul>
			<!-- Open In Sheet -->
			<li>
				<a href="#" class="item-link smart-select" data-open-in="popover" data-searchbar="false"
				data-back-on-select="true">
					<select name="attendees">
						<option value="0" selected>0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
					<div class="item-content">
						<div class="item-inner">
							<div class="item-title">จำนวนผู้ติดตาม/Number of Attendees</div>
						</div>
					</div>
				</a>
			</li>
		</ul>
        </div>
			<div class="content-block" style="margin-top:1em;margin-bottom:1em;">
					<meta name="csrf-token" content="{{ csrf_token() }}">
        <button 
        type="submit" class="button button-big button-block button-fill link external" style="font-size:2em;">เช็คอิน/Check In</button>
			</div>
		</form>      
	</div>
	<!-- End: Page Content -->
            </div>
				</div>
				</div>
			</div>
			@include('includes.script')
		</body>
		<footer>
				
		</footer>   
		</html>