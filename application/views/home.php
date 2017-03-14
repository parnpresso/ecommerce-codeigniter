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

		<div class="item" style="background-image: url(<?php echo public_url();?>assets/images/ashop.jpg);">
			<div class="container-fluid">



			</div><!-- /.container-fluid -->
		</div><!-- /.item -->

		<div class="item" style="background-image: url(<?php echo public_url();?>assets/images/a2.jpg);">
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
<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="col-xs-12 col-lg-6 no-margin banner">
            <a href="category-grid-2.html">
                <div class="banner-text theblue">
                    <h1>Promotion1</h1>
                    <span class="tagline">-------</span>
                </div>
                <img class="banner-image" alt="" src="<?php echo public_url();?>assets/images/blank.gif" data-echo="<?php echo public_url();?>assets/images/banners/banner-narrow-01.jpg" />
            </a>
        </div>
        <div class="col-xs-12 col-lg-6 no-margin text-right banner">
            <a href="category-grid-2.html">
                <div class="banner-text right">
                    <h1>Promotion2</h1>
                    <span class="tagline">-----</span>
                </div>
                <img class="banner-image" alt="" src="<?php echo public_url();?>assets/images/blank.gif" data-echo="<?php echo public_url();?>assets/images/banners/banner-narrow-02.jpg" />
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
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="ribbon red"><span>sale</span></div>
                                <div class="image">
                                    <img alt="" src="<?php echo public_url();?>assets/images/blank.gif" data-echo="<?php echo public_url();?>assets/images/products/product-01.jpg" />
                                </div>
                                <div class="body">
                                    <div class="label-discount green">-50% sale</div>
                                    <div class="title">
                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                    </div>
                                    <div class="brand">sony</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">$1399.00</div>
                                    <div class="price-current pull-right">$1199.00</div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="ribbon blue"><span>new!</span></div>
                                <div class="image">
                                    <img alt="" src="<?php echo public_url();?>assets/images/blank.gif" data-echo="<?php echo public_url();?>assets/images/products/product-02.jpg" />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="single-product.html">White lumia 9001</a>
                                    </div>
                                    <div class="brand">nokia</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">$1399.00</div>
                                    <div class="price-current pull-right">$1199.00</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                            <div class="product-item">

                                <div class="image">
                                    <img alt="" src="<?php echo public_url();?>assets/images/blank.gif" data-echo="<?php echo public_url();?>assets/images/products/product-03.jpg" />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="single-product.html">POV Action Cam</a>
                                    </div>
                                    <div class="brand">sony</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">$1399.00</div>
                                    <div class="price-current pull-right">$1199.00</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="ribbon red"><span>sale</span></div>
                                <div class="ribbon green"><span>bestseller</span></div>
                                <div class="image">
                                    <img alt="" src="<?php echo public_url();?>assets/images/blank.gif" data-echo="<?php echo public_url();?>assets/images/products/product-04.jpg" />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="single-product.html">Netbook Acer TravelMate
                                            B113-E-10072</a>
                                    </div>
                                    <div class="brand">acer</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">$1399.00</div>
                                    <div class="price-current pull-right">$1199.00</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            load more products</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
