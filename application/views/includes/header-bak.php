<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>เอเชีย การไฟฟ้า</title>
	<meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
	<meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/flexslider.css">
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/style.css">
	<?php
		if ($this->uri->rsegment(2) == "login" || $this->uri->rsegment(2) == "login_validation") {
			echo '<link rel="stylesheet" href="'.public_url().'css/login.css">';
		}
	?>
</head>
<body id="top" data-spy="scroll">

	<!-- BEGIN HEADER -->
	<header id="home">
		<!-- BEGIN LOGIN & REGSITER -->
		<section class="top-nav hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top-left">
							<ul>
								<li>

								<?php
									/*if ($this->session->userdata('is_logged_in')){
										// <li role="presentation"><a href="'.site_url("site/members").'"><h4>Hi, '. $this->session->userdata('username').'</h4></li>
										echo '<li role="presentation" ' .(($this->uri->rsegment(2) == "index")?'class="active"':""). '><a href="'. site_url(). '">หน้าหลัก</a></li>
													<li role="presentation" ' .(($this->uri->rsegment(2) == "members")?'class="active"':""). '><a href="'. site_url("site/members"). '">จัดการ</a></li>
													<li role="presentation" ><a href="' .site_url("logout"). '">ออกจากระบบ</a></li>  ' ;
									} else {*/
										if ($this->uri->rsegment(1) == "register") {
											echo '<li role="presentation" ' .(($this->uri->rsegment(2) == "login")?'class="active"':""). '><a href="'. site_url("site/login"). '">เข้าสู่ระบบ </a></li>';
										} else if ($this->uri->rsegment(1) == "login") {
											echo '<li role="presentation" ' .(($this->uri->rsegment(2) == "register")?'class="active"':""). '><a href="'. site_url("site/register"). '">สมัครสมาชิก</a></li>';
										} else {
											echo '<li role="presentation" ' .(($this->uri->rsegment(2) == "login")?'class="active"':""). '><a href="'. site_url("site/login"). '">เข้าสู่ระบบ </a></li>
														<li role="presentation" ' .(($this->uri->rsegment(2) == "register")?'class="active"':""). '><a href="'. site_url("site/register"). '">สมัครสมาชิก</a></li>';
										}
									//}
								?>

							</li>
						</ul>
					</div>
				</div>

					<div class="col-md-6">
						<div class="top-right">
							<p>Location:<span>158/1 ถนน ช้างเผือ ตำบล ศรีภูมิ อำเภอเมืองเชียงใหม่ จังหวัดเชียงใหม่ 50200</span></p>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- END LOGIN & REGSITER -->
    <!-- BEGIN MENU-->
		<div id="main-nav">

			<nav class="navbar">
				<div class="container">

					<div class="navbar-header">
						<a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="<?php echo public_url(); ?>image/logo/logo-ae.png" alt="" style="width:45px;height:35px;"></a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
							<span class="sr-only">Toggle</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<?php
						if ($this->uri->rsegment(2) == "register") {
							echo '<div><h1 style="text-align:right">สมัครสมาชิก</h1></div>';
						} else if ($this->uri->rsegment(2) == "login") {
							echo '<div><h1 style="text-align:right">เข้าสู่ระบบ</h1></div>';
						} else {
							echo '
								<div class="navbar-collapse collapse" id="ftheme">
									<ul class="nav navbar-nav navbar-right">
										<li><a href="#home">หน้าหลัก</a></li>
										<li><a href="#about">เกี่ยวกับ</a></li>
										<li><a href="#service">สินค้า</a></li>
										<li><a href="#contact">ติดต่อเรา</a></li>
										<!--li class="hidden-sm hidden-xs">
											<a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
										</li-->
									</ul>
								</div>
							';
						}


					?>


					<div class="search-form">
						<form>
							<input type="text" id="s" size="40" placeholder="Search..." />
						</form>
					</div>

				</div>
			</nav>
		</div>
		<!-- END MENU-->
	</header>
	<!-- END HEADER -->
