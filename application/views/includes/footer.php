
<footer id="footer" class="color-bg">



    <div class="sub-form-row">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                <form role="form" action="<?php echo base_url('site/subscribe');?>"  method="post">


                </br>
                    <input type="email" placeholder="กรอกอีเมลล์เพื่อรับข้อมูลข่าวสารจากทางร้าน" name="email" required>
                    <button class="le-button" type="submit">สมัคร</button>
                </form>
            </div>
        </div><!-- /.container -->
    </div><!-- /.sub-form-row -->

    <div class="link-list-row">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">


                <!-- ============================================================= CONTACT INFO ============================================================= -->
<div class="contact-info">
    <div class="footer-logo">
    	<img alt="logo" src="<?php echo public_url();?>image/logo/logo2.png"  />
    </div><!-- /.footer-logo -->

    <p class="regular-bold"> Feel free to contact us via phone,email or just send us mail.</p>

    <p>
      158/1 ถนน ช้างเผือก ตำบล ศรีภูมิ อำเภอเมืองเชียงใหม่ จังหวัดเชียงใหม่ (โทร.053-214683) (แฟ๊กซ์.053-214717) (Email:info@citilights.com)
    </p>





</div>
<!-- ============================================================= CONTACT INFO : END ============================================================= -->            </div>

  <div class="col-xs-12 col-md-8 no-margin">

<!-- ============================================================= LINKS FOOTER ============================================================= -->

<div class="link-widget">
    <div class="widget">
    <img src="<?php echo public_url(). "assets/images/bitcino.png";?>">
    </div>
</div>

<div class="link-widget">
    <div class="widget">
    <img src="<?php echo public_url(). "assets/images/footer22.png";?>">
    </div>
</div>

<div class="link-widget">
    <div class="widget">
      <img src="<?php echo public_url(). "assets/images/footer3.3.png";?>">
    </div>
</div>

<div class="link-widget">
    <div class="widget">
    <img src="<?php echo public_url(). "assets/images/footer1.jpg";?>">
    </div>
</div>

<div class="link-widget">
    <div class="widget">
    <img src="<?php echo public_url(). "assets/images/JKL.png";?>">
    </div>
</div>

<div class="link-widget">
    <div class="widget">
    <img src="<?php echo public_url(). "assets/images/thai.png";?>">
    </div>
</div>

<!-- ============================================================= LINKS FOOTER : END ============================================================= -->            </div>
    </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    &copy; <a href="<?php echo base_url();?>">Asia Electric</a> 2015 Asia Electric Co.,Ltd. All Rights Reserved.
                </div><!-- /.copyright -->
            </div>




            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->

</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->	</div><!-- /.wrapper -->


	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="<?php echo public_url();?>assets/js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/jquery-migrate-1.2.1.js"></script>
	<script src="<?php echo public_url();?>assets/js/bootstrap.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=th&key=AIzaSyD8kgqw56omH5xKj9lQTYMN02FByMNtZT4"></script>
  <script>
      var map;
      function initialize() {
        var mapOptions = {
          zoom: 15,
          center: {lat: 18.8021575, lng: 98.9859011},
          sensor: false
        };
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);

        var marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
          position: {lat: 18.8021575, lng: 98.9859011},
          map: map
        });

        var infowindow = new google.maps.InfoWindow({
          content: '<p>Marker Location:' + marker.getPosition() + '</p>'
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<script src="<?php echo public_url();?>assets/js/gmap3.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/css_browser_selector.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/echo.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/jquery.easing-1.3.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/bootstrap-slider.min.js"></script>
    <script src="<?php echo public_url();?>assets/js/jquery.raty.min.js"></script>
    <script src="<?php echo public_url();?>assets/js/jquery.prettyPhoto.min.js"></script>
    <script src="<?php echo public_url();?>assets/js/jquery.customSelect.min.js"></script>
    <script src="<?php echo public_url();?>assets/js/wow.min.js"></script>
	<script src="<?php echo public_url();?>assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->

	<script src="<?php echo public_url();?>switchstylesheet/switchstylesheet.js"></script>

	<script>
		$(document).ready(function(){
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	<script src="http://w.sharethis.com/button/buttons.js"></script>

</body>
</html>
