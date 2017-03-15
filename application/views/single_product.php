<div class="container">

     <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
<div class="product-item-holder size-big single-product-gallery small-gallery">

    <div id="owl-single-product">
        <div class="single-product-gallery-item" id="slide1">
            <a data-rel="prettyphoto" href="<?php echo public_url().'image/product/'. $product[0]->image;?>">
                <img class="img-responsive" alt="" src="<?php echo public_url().'image/product/'. $product[0]->image;?>" data-echo="<?php echo public_url().'image/product/'. $product[0]->image;?>" />
            </a>
        </div><!-- /.single-product-gallery-item -->
    </div><!-- /.single-product-slider -->




</div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->


<!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
<section id="single-product-tab">
<div class="container">
    <div class="tab-holder">
  <div class="no-margin col-xs-12 col-sm-7 body-holder">
        <ul class="nav nav-tabs simple" >
            <li class="active"><a href="#description" data-toggle="tab">คำอธิบายสินค้า</a></li>
            <li><a href="#additional-info" data-toggle="tab">รายละเอียดสินค้า</a></li>

        </ul><!-- /.nav-tabs -->

        <div class="tab-content">
            <div class="tab-pane active" id="description">
                <p><?php echo $product[0]->name;?></p>
                <p><?php echo $product[0]->detail;?></p>





                <div class="meta-row">
                    <div class="inline">
                        <label>SKU:</label>
                        <span><?php echo $product[0]->id;?></span>
                    </div><!-- /.inline -->

                    <span class="seperator">/</span>

                    <div class="inline">
                        <label>ประเภทสินค้า:</label>
                        <span><a href="#"><?php echo $product[0]->cate_name;?></a></span>
                    </div><!-- /.inline -->

                    <span class="seperator"></span>

                    <!--div class="inline">
                        <label>tag:</label>
                        <span><a href="#">fast</a>,</span>
                        <span><a href="#">gaming</a>,</span>
                        <span><a href="#">strong</a></span>
                    </div--><!-- /.inline -->
                </div><!-- /.meta-row -->
            </div><!-- /.tab-pane #description -->

            <div class="tab-pane" id="additional-info">
                <ul class="tabled-data">
                    <li>
                        <label>น้ำหนัก</label>
                        <div class="value">7.25 kg</div>
                    </li>
                    <li>
                        <label>ขนาด</label>
                        <div class="value">one size fits all</div>
                    </li>
                    <li>
                        <label>หน่วย</label>
                        <div class="value">UNIT</div>
                    </li>
                    <li>
                        <label>ราคา</label>
                        <div class="value">฿<?php echo $product[0]->price;?></div>
                    </li>
                </ul><!-- /.tabled-data -->


              </br>


                    <?php
        						if ($this->session->userdata('is_logged_in')) {
                      echo '<div class="le-quantity">
                          <form>
                              <a class="minus" href="#reduce"></a>
                              <input name="quantity" readonly="readonly" type="text" value="1" />
                              <a class="plus" href="#add"></a>
                          </form>
                      </div>';
        							echo '<a id="addto-cart" href="'.base_url('site/add_cart/'. $product[0]->id).'" class="le-button huge">เพิ่มลงตระกร้า</a>';
        						} else {
                      echo '<p><b>กรุณาเข้าสู่ระบบเพื่อเลือกของลงตระกร้า</b></p>';
                    }
        						?>


                <div class="meta-row">
                  <div class="inline">
                      <label>SKU:</label>
                      <span><?php echo $product[0]->id;?></span>
                  </div><!-- /.inline -->

                  <span class="seperator">/</span>

                  <div class="inline">
                      <label>ประเภทสินค้า:</label>
                      <span><a href="#"><?php echo $product[0]->cate_name;?></a></span>
                  </div><!-- /.inline -->

                </div><!-- /.meta-row -->
            </div><!-- /.tab-pane #additional-info -->


            </div><!-- /.qnt-holder -->
        </div><!-- /.tab-content -->
</div><!-- /.body -->
</div><!-- /.body-holder -->
</div><!-- /.container -->
</div><!-- /.single-product -->


<!-- ========================================= RECENTLY VIEWED ========================================= -->
<section id="recently-reviewd" class="wow fadeInUp">
<div class="container">
<div class="carousel-holder hover">

  <div class="title-nav">
    <h2 class="h1">สินค้าอื่นๆ</h2>
    <div class="nav-holder">
      <!--a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
      <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a-->
    </div>
  </div><!-- /.title-nav -->

  <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">

    <?php
      for ($x = 0; $x <= sizeof($productlist)-1; $x++) {
        echo '<div class=" no-margin carousel-item product-item-holder size-small hover">';
        echo '<div class="product-item">';
        echo '<div class="image">';
        echo '<img alt="" width="200px" src="'. public_url().'assets/images/blank.gif" data-echo="'. public_url().'image/product/'.$productlist[$x]->image.'" />';
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



  </div><!-- /#recently-carousel -->

</div><!-- /.carousel-holder -->
</div><!-- /.container -->
</section><!-- /#recently-reviewd -->
