<main id="contact-us" class="inner-bottom-md">
	<section class="google-map map-holder">
		<div id="map" class="map center"></div>
		<form role="form" class="get-direction">
			<!--div class="container">
				<div class="row">
					<div class="center-block col-lg-10">
						<div class="input-group">
							<input type="text" class="le-input input-lg form-control" placeholder="Enter Your Starting Point">
							<span class="input-group-btn">
								<button class="btn btn-lg le-button" type="button">Get Directions</button>
							</span>
						</div><!-- /input-group -->
					<!--/div><!-- /.col-lg-6 -->
				<!--/div><!-- /.row -->
			<!--/div-->
		</form>
	</section>

	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<section class="section leave-a-message">
					<h2 class="bordered">ติดต่อเรา</h2>
					<p>หากต้องการติดต่อสอบถามข้อมูลเพิ่มเติม สามารถกรอกข้อความที่สงสัยหรือข้อความที่ต้องการจะสอบถามพร้อมทั้งระบุ e-mail ไว้ได้เลยครับ</p>
					<form id="contact-form" class="contact-form cf-style-1 inner-top-xs" action="<?php echo base_url('site/send_contact');?>" method="post" >
						<div class="row field-row">
							<div class="col-xs-12 col-sm-6">
								<label>ชื่อ*</label>
								<input class="le-input" name="name">
							</div>
							<div class="col-xs-12 col-sm-6">
								<label>อิเมลล์*</label>
								<input class="le-input" name="email">
							</div>
						</div><!-- /.field-row -->

						<div class="field-row">
							<label>เรื่องที่ต้องการสอบถาม</label>
							<input type="text" class="le-input" name="topic">
						</div><!-- /.field-row -->

						<div class="field-row">
							<label>ข้อความ</label>
							<textarea rows="8" class="le-input" name="message"></textarea>
						</div><!-- /.field-row -->

						<div class="buttons-holder">
							<button type="submit" class="le-button huge">ส่งข้อความ</button>
						</div><!-- /.buttons-holder -->
					</form><!-- /.contact-form -->
				</section><!-- /.leave-a-message -->
			</div><!-- /.col -->

			<div class="col-md-4">
				<section class="our-store section inner-left-xs">
					<h2 class="bordered">เอเชียการไฟฟ้า</h2>
					<address>
						158/1 ถนน ช้างเผือก <br/>
						ตำบล ศรีภูมิ อำเภอเมืองเชียงใหม่<br/>
						จังหวัดเชียงใหม่
					</address>




				</section><!-- /.our-store -->
			</div><!-- /.col -->

		</div><!-- /.row -->
	</div><!-- /.container -->
</main>
<!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
