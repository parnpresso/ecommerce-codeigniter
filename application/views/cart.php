<?php var_dump($items); var_dump($this->session->all_userdata()); var_dump($this->input->post());?>
<section id="cart-page">
    <div class="container">
        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">

          <?php
            for ($x = 0; $x <= sizeof($items)-1; $x++) {
              echo '<div class="row no-margin cart-item">';
              echo '<div class="col-xs-12 col-sm-2 no-margin">';
              echo '<a href="#" class="thumb-holder">';
              echo '<img class="lazy" alt="" src="'. public_url().'assets/images/blank.gif" data-echo="'. public_url().'image/product/'.$items[$x][0]->image.'" />';
              echo '</a>';
              echo '</div>';
              echo '<div class="col-xs-12 col-sm-5 ">';
              echo '<div class="title">';
              echo '<a href="'.base_url('site/single_product/').$items[$x][0]->id.'">'.$items[$x][0]->name.'</a>';
              echo '</div>';
              echo '<div class="brand">'.$items[$x][0]->detail.'</div>';
              echo '</div>';
              echo '<div class="col-xs-12 col-sm-3 no-margin">';
              echo '<div class="quantity">';
              echo '<div class="le-quantity">';
              echo '<form id="cartform">';
              echo '<a class="minus" href="#reduce" onclick="MinusItem('.$items[$x][0]->id.');"></a>';
              echo '<input name="quantity" id="quantity-'.$items[$x][0]->id.'" readonly="readonly" type="text" value="'.$items[$x][1]['quan'].'" />';
              echo '<a class="plus" href="#add" onclick="PlusItem('.$items[$x][0]->id.');"></a>';
              echo '<input type="hidden" id="quantity-'.$items[$x][0]->id.'" value="'.$items[$x][1]['quan'].'" >';
              echo '<input type="hidden" id="current-price-'.$items[$x][0]->id.'" value="'.$items[$x][0]->price* (int)$items[$x][1]['quan'].'" >';
              echo '</form>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="col-xs-12 col-sm-2 no-margin">';
              echo '<div class="price" id="show-'.$items[$x][0]->id.'">฿'.$items[$x][0]->price * (int)$items[$x][1]['quan'].'</br>(ชิ้นละ '.$items[$x][0]->price.')</div>';
              echo '<a class="close-btn" href="'.base_url('site/delete_item/').$items[$x][0]->id.'"></a>';
              echo '</div>';
              echo '</div>';
              echo '<input type="hidden" id="price-'.$items[$x][0]->id.'" value="'.$items[$x][0]->price.'" >';
            }
          ?>



        </div>
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->
        <?php
          $sum = 0;
          for ($x = 0; $x <= sizeof($items)-1; $x++) {
            $sum += $items[$x][0]->price * (int)$items[$x][1]['quan'];
          }
        ?>
        <div class="col-xs-12 col-md-3 no-margin sidebar ">
            <div class="widget cart-summary">
                <h1 class="border">ราคาสินค้าทั้งหมด</h1>
                <div class="body">
                    <ul class="tabled-data no-border inverse-bold">


                        <li>
                            <label>ภาษีมูลค่าเพิ่ม 7%</label>
                            <div class="value pull-right">฿<?php echo $sum*0.07;?></div>
                        </li>
                        <li>
                            <label>ค่าจัดส่ง</label>
                            <div class="value pull-right">฿0</div>
                        </li>
                        <li>
                            <label>จำนวนเงินทั้งสิ้น</label>
                            <div class="value pull-right">฿<?php echo $sum;?></div>
                        </li>
                        <!--li>
                            <label>shipping</label>
                            <div class="value pull-right">free shipping</div>
                        </li-->
                    </ul>
                    <ul id="total-price" class="tabled-data inverse-bold no-border">
                        <li>
                            <label>ราคารวม</label>
                            <div class="value pull-right">฿<?php echo $sum;?></div>
                        </li>
                    </ul>
                    <div class="buttons-holder">

                        <a class="le-button big" onclick='document.getElementById("cartform").submit()' href="<?php echo base_url('site/checkout');?>" >ยืนยันการสั่งซื้อ</a>
                        <a class="simple-link block" href="<?php echo base_url('site/product');?>" >เลือกสินค้าต่อ</a>

                        <!--a class="le-button big" href="<?php //echo base_url('site/checkout');?>" >ยืนยันการสั่งซื้อ</a>
                        <a class="simple-link block" href="<?php //echo base_url('site/product');?>" >เลือกสินค้าต่อ >></a-->

                    </div>
                </div>
            </div><!-- /.widget -->


        </div><!-- /.sidebar -->

        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>
</section>


<script>

  function MinusItem(id){
    var quantity = Number(document.getElementById("quantity-" + id).value);
    var price = Number(document.getElementById("price-" + id).value);
    //var currentprice = document.getElementById("current-price-" + id).value;
    //var finalprice = Number(currentprice)-Number(price);
    quantity = quantity - 1;
    //document.getElementById("current-price-" + id).value = finalprice;
    document.getElementById("show-" + id).innerHTML = "฿" + (price*quantity) + "<br>(ชิ้นละ " + price + ")";
    //alert("price:" + price + ", currentprice:" + currentprice + ",finalprice:" + finalprice + ", quantity:" + quantity);
    //alert(quantity);
  }
  function PlusItem(id){
    var quantity = Number(document.getElementById("quantity-" + id).value);
    var price = Number(document.getElementById("price-" + id).value);
    //var currentprice = document.getElementById("current-price-" + id).value;
    //var finalprice = Number(currentprice)+Number(price);
    quantity = quantity + 1;
    //document.getElementById("current-price-" + id).value = finalprice;
    document.getElementById("show-" + id).innerHTML = "฿" + (price*quantity) + "<br>(ชิ้นละ " + price + ")";
    //alert("price:" + price + ", currentprice:" + currentprice + ",finalprice:" + finalprice + ", quantity:" + quantity);
    //alert(quantity);
  }
</script>
