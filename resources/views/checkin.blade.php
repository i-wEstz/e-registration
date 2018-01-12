
       <div class="pages">




        <div data-page="login" class="page no-navbar">
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
            <h1 style="margin:0px">35</h1>
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
                <h1 style="margin:0px">2658a</h1>
                <p style="margin:0px">ATTENDEES</p>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

		<form name="login" action="#" method="POST" enctype="multipart/form-data">
			<div class="list-block no-hairlines" style="margin:0px;">
				<ul>
					<li>
						<div class="item-content" style="background:whitesmoke;">
							<div class="item-media">
								<i class="material-icons">loyalty</i>
							</div>
							<div class="item-inner">
								<div class="item-input">
									<input type="text" name="id" placeholder="รหัสพนักงาน/Employee ID" required />
								</div>
								<div class="item-text input-error"></div>
							</div>
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
      <div class="content-block text-center" style="margin-top:1em;margin-bottom:1em;">
          <!--<i class="material-icons" style="font-size:5em;">face</i>-->
          <p style="margin:0px"><i class="material-icons">face</i> ชื่อ-นามสกุล/Name-Surname</p>
          <h1 style="margin:0px">สมชาย ทำดี</h1>
      </div>
      <div class="content-block-title"><b>จำนวนผู้ติดตาม</b></div>
      <div class="list-block" style="background:whitesmoke;">
          <ul>
            <li>
              <label class="label-radio item-content">
                <input type="radio" name="radio" value="books">
                <span class="item-media">
                  <i class="icon icon-form-radio"></i>
                </span>
                <span class="item-inner">
                  <span class="item-title">0</span>
                </span>
              </label>
            </li>
            <li>
              <label class="label-radio item-content">
                <input type="radio" name="radio" value="food">
                <span class="item-media">
                  <i class="icon icon-form-radio"></i>
                </span>
                <span class="item-inner">
                  <span class="item-title">1</span>
                </span>
              </label>
            </li>
            <li>
              <label class="label-radio item-content">
                <input type="radio" name="radio" value="games" checked="">
                <span class="item-media">
                  <i class="icon icon-form-radio"></i>
                </span>
                <span class="item-inner">
                  <span class="item-title">2</span>
                </span>
              </label>
            </li>
            <li>
              <label class="label-radio item-content">
                <input type="radio" name="radio" value="movies">
                <span class="item-media">
                  <i class="icon icon-form-radio"></i>
                </span>
                <span class="item-inner">
                  <span class="item-title">3</span>
                </span>
              </label>
            </li>
          </ul>
        </div>
			<div class="content-block" style="margin-top:1em;margin-bottom:1em;">
        <button 
        href="{{ route('menu') }}"
        type="submit" class="button button-big button-block button-fill link external" style="font-size:2em;">บันทึกการลงทะเบียน</button>
			</div>
		</form>

	</div>
	<!-- End: Page Content -->
            </div>
        </div>