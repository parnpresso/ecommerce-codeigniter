<div class="container">

    <!-- ========================================= SIDEBAR ========================================= -->
    <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">


        <!-- ========================================= CATEGORY TREE ========================================= -->
</br>

<div class="widget accordion-widget category-accordions">
<h1 class="border">ประเภทสินค้า</h1>
<div class="accordion">
  <?php
    for ($x = 0; $x <= sizeof($categories)-1; $x++) {
      echo '<div class="accordion-group">';
      echo '<div class="accordion-heading">';
      echo '<a href="'.base_url('site/category/').$categories[$x]->id.'" >'.$categories[$x]->name.'</a>';
      echo '</div>';
      echo '</div>';
    }
  ?>
</div><!-- /.accordion -->
</div><!-- /.category-accordions -->
<!-- ========================================= CATEGORY TREE : END ========================================= -->
        <!-- ========================================= LINKS ========================================= -->







<!-- ========================================= LINKS : END ========================================= -->
<div class="widget">
<div class="simple-banner">



</div>
</div>
</div>
    <!-- ========================================= SIDEBAR : END ========================================= -->

    <!-- ========================================= CONTENT ========================================= -->

    <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

        <!--div id="grid-page-banner">
            <a href="#">
                <img src="<?php echo public_url();?>assets/images/banners/banner-gamer.jpg" alt="" />
            </a>
        </div-->

        <section id="gaming">
<div class="grid-list-products">


    <div class="tab-content">
        <div id="grid-view" class="products-grid fade tab-pane in active">

            <div class="product-grid-holder">
                <div class="row no-margin">

                  <?php
      							for ($x = 0; $x <= sizeof($productlist)-1; $x++) {
      								echo '<div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">';
                      echo '<div class="product-item">';
                      //if ($productlist[$x]->discount != 0) echo '<div class="ribbon red"><span>ลดราคา</span></div>';
                      echo '<div class="image">';
                      echo '<img alt="" height="160px" src="'. public_url().'assets/images/blank.gif" data-echo="'. public_url().'image/product/'.$productlist[$x]->image.'" />';
                      echo '</div>';
                      echo '<div class="body">';
                      //if ($productlist[$x]->discount != 0) echo '<div class="label-discount green">ลด '.$productlist[$x]->discount * 100 .'%</div>';
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
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->



            </div><!-- /.products-list -->
            <div class="pagination-holder">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 text-left">
                        <ul class="pagination">
                          <?php echo $pagination;?>

                        </ul><!-- /.pagination -->
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <!--div class="result-counter">
                            Showing <span>1-9</span> of <span>11</span> results
                        </div--><!-- /.result-counter -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.pagination-holder -->

        </div><!-- /.products-grid #list-view -->

    </div><!-- /.tab-content -->
</div><!-- /.grid-list-products -->

</section><!-- /#gaming -->
    </div><!-- /.col -->
    <!-- ========================================= CONTENT : END ========================================= -->
</div><!-- /.container -->
</section><!-- /#category-grid -->		<!-- ============================================================= FOOTER ============================================================= -->
