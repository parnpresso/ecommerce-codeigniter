<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">

	<title>Asia Electric l เอเชียการไฟฟ้า</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/bootstrap.min.css">

	<!-- Customizable CSS -->
	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/green.css">
	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/owl.transitions.css">
	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/animate.min.css">

	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/blue.css">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="<?php echo public_url();?>assets/css/font-awesome.min.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo public_url();?>assets/images/logo_a.png">

	<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->


</head>
<body>

	<div class="wrapper">
		<!-- ============================================================= TOP NAVIGATION ============================================================= -->
		<nav class="top-bar animate-dropdown">
			<div class="container">
				<div class="col-xs-12 col-sm-6 no-margin">
					<ul>
						<li><a href="<?php echo base_url('site');?>">หน้าหลัก</a></li>
						<li><a href="<?php echo base_url('site/product');?>">สินค้า</a></li>
						<li><a href="<?php echo base_url('site/aboutus');?>">เกี่ยวกับเรา</a></li>
						<li><a href="<?php echo base_url('site/contact');?>">ติดต่อเรา</a></li>
						<?php
						if ($this->session->userdata('is_logged_in')) {
							echo '<li><a href="'. base_url('site/editprofile').'">ข้อมูลส่วนตัว</a></li>';
							echo '<li><a href="'. base_url('site/order').'">รายการสั่งซื้อสินค้า</a></li>';
						}
						?>
					</ul>
				</div><!-- /.col -->

				<div class="col-xs-12 col-sm-6 no-margin">
					<ul class="right">
						<?php
						if ($this->session->userdata('is_logged_in')) {
							echo 'สวัสดี, '. $this->session->userdata('username');
							echo '<li><a href="'. base_url('site/logout').'">ออกจากระบบ</a></li>';
						} else {
							echo '<li><a href="'.base_url('site/register').'">ลงทะเบียน</a></li>
							<li><a href="'.base_url('site/login').'">เข้าสู่ระบบ</a></li>';
						}
						?>
					</ul>
				</div><!-- /.col -->
			</div><!-- /.container -->
		</nav><!-- /.top-bar -->
		<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->		<!-- ============================================================= HEADER ============================================================= -->
		<header>
			<div class="container no-padding">

				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
					<div class="logo text-center">
						<a href="<?php echo base_url();?>">
							<img alt="logo" src="<?php echo public_url();?>assets/images/logo_a.png" width="40%"/>

						</a>
					</div><!-- /.logo -->
					<!-- ============================================================= LOGO : END ============================================================= -->		</div><!-- /.logo-holder -->

					<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">

						<!-- ============================================================= SEARCH AREA ============================================================= -->
						<div class="search-area">
							<form action="<?php echo base_url('site/search');?>" id="myform" method="post">
								<div class="control-group">
									<input name="text" class="search-field" placeholder="ค้นหาสินค้า" />

									<!--ul class="categories-filter animate-dropdown">
									<li class="dropdown">

									<a class="dropdown-toggle"  data-toggle="dropdown" href="category-grid.html">ค้นหา</a>

									<ul class="dropdown-menu" role="menu" >
									<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">laptops</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">tv & audio</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">gadgets</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">cameras</a></li>

								</ul>
							</li>
						</ul-->

						<a class="search-button" href="#" onclick="document.getElementById('myform').submit()"></a>

					</div>
				</form>
			</div><!-- /.search-area -->
			<!-- ============================================================= SEARCH AREA : END ============================================================= -->		</div><!-- /.top-search-holder -->

			<div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
				<div class="top-cart-row-container pull-right">


					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
					<div class="top-cart-holder dropdown animate-dropdown">

						<div class="basket">

							<?php

								if ($this->session->userdata('is_logged_in')) {
									echo '<a class="dropdown-toggle" data-toggle="dropdown" href="'.base_url('site/cart').'">
										<div class="basket-item-count">
											<span class="count">'.sizeof($this->session->userdata('cart')).'</span>
											<img src="'.public_url().'assets/images/icon-cart.png" alt="" />
										</div>

										<div class="total-price-basket">
											<span class="lbl">ตระกร้าของคุณ:</span>
											<span class="total-price">
												<span class="sign"></span><span class="value">มีสินค้า</span>
											</span>
										</div>
									</a>';
								} else {
									echo '<a class="dropdown-toggle" href="'.base_url('site/login').'">
										<div class="basket-item-count">
											<span class="count">0</span>
											<img src="'.public_url().'assets/images/icon-cart.png" alt="" />
										</div>

										<div class="total-price-basket">
											<span class="lbl">ตระกร้าของคุณ:</span>
											<span class="total-price">
												<span class="sign"></span><span class="value">มีสินค้า</span>
											</span>
										</div>
									</a>';
								}
							?>
								<font color=red>กรุณาสมัครสมาชิกเพื่อทำการสั่งซื้อสินค้า </font>

							<ul class="dropdown-menu">

								<!--li>
									<div class="basket-item">
										<div class="row">
											<div class="col-xs-4 col-sm-4 no-margin text-center">
												<div class="thumb">
													<img alt="" src="<?php echo public_url();?>assets/images/products/product-small-01.jpg" />
												</div>
											</div>
											<div class="col-xs-8 col-sm-8 no-margin">
												<div class="title">Blueberry</div>
												<div class="price">$270.00</div>
											</div>
										</div>
										<a class="close-btn" href="#"></a>
									</div>
								</li-->


								<li class="checkout">
									<div class="basket-item">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<a href="<?php echo base_url('site/cart'); ?>" class="le-button inverse">ไปยังตระกร้า</a>
											</div>
											<div class="col-xs-12 col-sm-6">
												<a href="<?php echo base_url('site/checkout'); ?>" class="le-button">สั่งซื้อสินค้า</a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div><!-- /.basket -->
					</div><!-- /.top-cart-holder -->
				</div><!-- /.top-cart-row-container -->
				<!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->		</div><!-- /.top-cart-row -->

			</div><!-- /.container -->
		</header>
