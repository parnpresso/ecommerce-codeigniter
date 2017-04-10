<?php //var_dump($this->session->all_userdata());
//var_dump($contents); ?>
<div id="top-banner-and-menu">
	<div class="container">

		<div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
			<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown">
    <div class="head"><i class="fa fa-list"></i>ประเภทสินค้า</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
						<?php
							for ($x = 0; $x <= sizeof($categories)-1; $x++) {
								echo '<li class="dropdown menu-item"><a href="'.base_url('site/category/').$categories[$x]->id.'" >'.$categories[$x]->name.'</a></li>';
							}
						?>
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->		</div><!-- /.sidemenu-holder -->

		<div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
			<!-- ========================================== SECTION – HERO ========================================= -->

<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

		<div class="item" style="background-image: url(<?php echo public_url();?>image/contents/<?php echo $contents['slide1'];?>);">
			<div class="container-fluid">
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->

		<div class="item" style="background-image: url(<?php echo public_url();?>image/contents/<?php echo $contents['slide2'];?>);">
			<div class="container-fluid">
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->

		<div class="item" style="background-image: url(<?php echo public_url();?>image/contents/<?php echo $contents['slide3'];?>);">
			<div class="container-fluid">
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->

	</div><!-- /.owl-carousel -->
</div>

<!-- ========================================= SECTION – HERO : END ========================================= -->
		</div><!-- /.homebanner-holder -->

	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

<!-- ========================================= HOME BANNERS ========================================= -->
</br>
<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="col-xs-12 col-lg-6 no-margin banner">

            <a href="#">

                <div class="banner-text theblue">

                    <h1></h1>
                    <span class="tagline"></span>
                </div>
					<h3>สินค้ามาใหม่</h3>
                <img class="banner-image" alt="" src="<?php echo public_url();?>image/contents/<?php echo $contents['promotion1'];?>);" data-echo="<?php echo public_url();?>image/contents/<?php echo $contents['promotion1'];?>" />

						</a>
        </div>
        <div class="col-xs-12 col-lg-6 no-margin text-right banner">
            <a href="#">

                <div class="banner-text right">
                    <h1></h1>
                    <span class="tagline"></span>
                </div>
								<h3>สินค้าขายดี</h3>
                <img class="banner-image" alt="" src="<?php echo public_url();?>image/contents/<?php echo $contents['promotion2'];?>);" data-echo="<?php echo public_url();?>image/contents/<?php echo $contents['promotion2'];?>" />
            </a>
        </div>
    </div><!-- /.container -->
</section><!-- /#banner-holder -->
<!-- ========================================= HOME BANNERS : END ========================================= -->
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">


            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
											<?php
											for ($x = 0; $x <= sizeof($productlist)-1; $x++) {
												echo '<div class="col-sm-4 col-md-3 no-margin product-item-holder hover">';
												echo '<div class="product-item">';
												echo '<div class="image">';
												echo '<img alt="" height="160px" src="'. public_url().'assets/images/blank.gif" data-echo="'. public_url().'image/product/'.$productlist[$x]->image.'" />';
												echo '</div>';
												echo '<div class="body">';
												echo '<div class="label-discount clear"></div>';
												echo '<div class="title">';
												echo '<a href="'.base_url('site/single_product/').$productlist[$x]->id.'">'.$productlist[$x]->name.'</a>';
												echo '</div>';
												echo '<div class="brand">'.$productlist[$x]->detail.'</div>';
												echo '</div>';
												echo '<div class="prices">';
												echo '<div class="price-prev">'.$productlist[$x]->price.'</div>';
												echo '<div class="price-current pull-right">฿'.$productlist[$x]->price.'</div>';
												echo '</div>';
												echo '<div class="hover-area">';
												echo '<div class="add-cart-button">';
												echo '<a href="'.base_url('site/single_product/').$productlist[$x]->id.'" class="le-button">ดูรายละเอียด</a>';
												echo '</div>';
												echo '</div>';
												echo '</div>';
												echo '</div>';
											}
											?>


                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="<?php echo base_url('site/product');?>">
                            <i class="fa fa-plus"></i>
                            ดูสินค้าทั้งหมด</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
