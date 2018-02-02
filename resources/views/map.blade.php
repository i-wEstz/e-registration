<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.head')
</head>
  <!-- Views -->
  <div class="views">
		<!-- Your main view, should have "view-main" class -->
		<div class="view view-main">
		  <!-- Top Navbar-->
		  <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
		  <div class="pages navbar-through toolbar-through">
			<!-- Page, "data-page" contains page name -->
			<div data-page="contact-us" class="page">
					<!-- Begin: Navbar -->
					<div class="navbar">
						<div class="navbar-inner">
							<div class="left">
								<a href="#" class="link icon-only back">
									<i class="icon icon-back"></i>
								</a>
							</div>
							<div class="center">ตำแหน่งที่ตั้งบูธ / Map</div>
						</div>
					</div>
					<!-- End: Navbar -->
				
					<!-- Begin: Page Content -->
				  <div class="page-content" style="background:white;">
						<iframe src="http://docs.google.com/gview?url=http://188.166.181.226/map2.pdf&embedded=true" 
						style="width:100%; height:100%;" frameborder="0"></iframe>
					</div>
					<!-- End: Page Content -->
				
					
				
				</div>
		  </div>
		</div>
	  </div>
   
	   @include('includes.script')
  </body>
