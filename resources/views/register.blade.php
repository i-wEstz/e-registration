    
       
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
  <div class="page-content">
		<div class="content-block">
      <div class="row">
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


				{{--{!! $result["registered"] . $result["follower"] . $result["summary"] !!}--}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

		<form name="login" id="login" action="#" method="POST" enctype="multipart/form-data">
			<div class="list-block no-hairlines" style="margin:0px;">
				<ul>
					<li>
            <div class="text-center">
            <h1>กรุณาใส่รหัสพนักงาน/Put your employee number here</h1>
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
			<li>
				<a href="#" class="item-link smart-select" data-open-in="popup" data-searchbar="true">
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
        <button 
        type="submit" class="button button-big button-block button-fill link external" style="font-size:2em;">เช็คอิน/Check In</button>
			</div>
		</form>      
	</div>
	<!-- End: Page Content -->
            </div>
        </div>