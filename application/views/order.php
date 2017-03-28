<?php //var_dump($orders); ?>
<section id="cart-page">
    <div class="container">
        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-md-12 items-holder no-margin">

          <?php
            for ($x = 0; $x <= sizeof($orders)-1; $x++) {
              $totalprice = 0;
              for ($y = 0; $y <= sizeof($orders[$x])-1; $y++) {
                $totalprice += $orders[$x][$y]->product_quantity * $orders[$x][$y]->product_price;
              }
              echo '<div class="row no-margin cart-item">';
              echo '<div class="col-xs-12 col-sm-2 no-margin">';
              echo '<a href="#" class="thumb-holder">';
              echo '<img class="lazy" alt="" width="70px" src="'. public_url().'assets/images/blank.gif" data-echo="'. public_url().'image/order/receipt.png" />';
              echo '</a>';
              echo '</div>';
              echo '<div class="col-xs-12 col-sm-5 ">';
              echo '<div class="title">';
              echo '<a  target="_blank" href="'.base_url('site/view_order/').$orders[$x][0]->order_id.'">Bill #'.$orders[$x][0]->order_id.'</a>';
              echo '</div>';
              echo '<div class="brand">วันที่ '.$orders[$x][0]->date.'</div>';
              echo '</div>';
              echo '<div class="col-xs-12 col-sm-3 no-margin">';
              echo '<div class="quantity">';
              //echo '<div class="le-quantity">';
              //echo '<form>';
              //echo '<a class="minus" href="#reduce"></a>';
              //echo '<input name="quantity" readonly="readonly" type="text" value="'.$items[$x][1]['quan'].'" />';
              //echo '<a class="plus" href="#add"></a>';
              //echo '</form>';
              //echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="col-xs-12 col-sm-2 no-margin">';
              echo '<div class="price">฿'.$totalprice.'</div>';
              //echo '<a class="close-btn" href="'.base_url('site/view_order/').$orders[$x][0]->order_id.'"></a>';
              echo '</div>';
              echo '</div>';
            }
          ?>

        </div>
    </div>
</section>
