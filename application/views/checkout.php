<?php //var_dump($this->session->all_userdata());?>
<?php //var_dump($customer);?>
<script type="text/javascript">
  function clearField() {
    document.getElementById("password2").reset();
  };
</script>
<section id="checkout-page">
    <div class="container">
        <div class="col-xs-12 no-margin">

            <div class="billing-address">
                <h2 class="border h1">ที่อยู่</h2>
                <form action="<?php echo base_url('site/checkout_validation'); ?>" id="checkoutform" method="post">
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>ชื่อจริง*</label>
                            <input class="le-input" value="<?php echo $customer[0]->fname_cus;?>">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>นามสกุล*</label>
                            <input class="le-input" value="<?php echo $customer[0]->lname_cus;?>">
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12">
                            <label>รหัสบัตรประชาชน</label>
                            <input class="le-input" value="<?php echo $customer[0]->idcard_cus;?>">
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>ที่อยู่*</label>
                            <input class="le-input" data-placeholder="ที่อยู่" value="<?php echo $customer[0]->address;?>">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>&nbsp;</label>
                            <input class="le-input" data-placeholder="จังหวัด" value="<?php echo $customer[0]->province;?>">
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-4">
                            <label>รหัสไปรษณีย์*</label>
                            <input class="le-input" value="<?php echo $customer[0]->postcode;?>" >
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <label>อีเมล*</label>
                            <input class="le-input" value="<?php echo $customer[0]->email_cus;?>">
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <label>เบอร์โทร*</label>
                            <input class="le-input" id="signup-password2" name="password2" value="<?php echo $customer[0]->tel;?>">
                        </div>
                    </div><!-- /.field-row -->

                    <!--div class="row field-row">
                        <div id="create-account" class="col-xs-12">
                            <input  class="le-checkbox big" type="checkbox"  />
                            <button type="reset" value="Reset">Reset</button>
                            <a class="simple-link bold" href="#" onclick="clearField();">ส่งไปที่อยู่อื่น</a> - จะทำการเคลียร์ฟอร์มให้กรอกข้อมูลใหม่
                        </div>
                    </div--><!-- /.field-row -->

                </form>
            </div><!-- /.billing-address -->



            <section id="your-order">
                <h2 class="border h1">สินค้าของคุณ</h2>
                <form>
                  <?php
                    for ($x = 0; $x <= sizeof($items)-1; $x++) {
                      echo '<div class="row no-margin order-item">';
                      echo '<div class="col-xs-12 col-sm-1 no-margin">';
                      echo '<a href="#" class="qty">'.$items[$x][1]['quan'].' x</a>';
                      echo '</div>';
                      echo '<div class="col-xs-12 col-sm-9 ">';
                      echo '<div class="title"><a href="#">'.$items[$x][0]->name.'</a></div>';
                      echo '<div class="brand">'.$items[$x][0]->detail.'</div>';
                      echo '</div>';
                      echo '<div class="col-xs-12 col-sm-2 no-margin">';
                      echo '<div class="price">฿'.$items[$x][0]->price * (int)$items[$x][1]['quan'].'</div>';
                      echo '</div>';
                      echo '</div>';
                    }
                  ?>
                </form>
            </section><!-- /#your-order -->

            <?php
              $sum = 0;
              for ($x = 0; $x <= sizeof($items)-1; $x++) {
                $sum += $items[$x][0]->price * (int)$items[$x][1]['quan'];
              }
            ?>
            <div id="total-area" class="row no-margin">
                <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                    <div id="subtotal-holder">
                        <ul class="tabled-data inverse-bold no-border">
                            <li>
                                <label>ค่าสินค้าทั้งหมด</label>
                                <div class="value ">฿<?php echo $sum;?></div>
                            </li>
                            <li>
                                <label>ค่าขนส่ง</label>
                                <div class="value">
                                    <div class="radio-group">
                                        <input class="le-radio" type="radio" name="group1" value="free" checked> <div class="radio-label bold">ส่งฟรี</div><br>
                                        <!--input class="le-radio" type="radio" name="group1" value="local">  <div class="radio-label">local delivery<br><span class="bold">$15</span></div-->
                                    </div>
                                </div>
                            </li>
                        </ul><!-- /.tabled-data -->

                        <ul id="total-field" class="tabled-data inverse-bold ">
                            <li>
                                <label>ราคารวม</label>
                                <div class="value">฿<?php echo $sum;?></div>
                            </li>
                        </ul><!-- /.tabled-data -->

                    </div><!-- /#subtotal-holder -->
                </div><!-- /.col -->
            </div><!-- /#total-area -->


            <div class="place-order-button">
                <button class="le-button big" onclick="document.getElementById('checkoutform').submit()">สั่งซื้อ</button>
            </div><!-- /.place-order-button -->

        </div><!-- /.col -->
    </div><!-- /.container -->
</section><!-- /#checkout-page -->
