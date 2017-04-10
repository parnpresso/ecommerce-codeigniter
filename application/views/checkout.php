<?php //var_dump($this->session->all_userdata());?>
<?php //var_dump($this->input->post());?>
<?php //var_dump($customer);?>

<section id="checkout-page">
    <div class="container">
        <div class="col-xs-12 no-margin">

            <div class="billing-address">
                <h2 class="border h1">ที่อยู่จัดส่งสินค้า</h2><font color=red>กรุณาตรวจสอบข้อมูลให้ถูกต้อง </font>

                <?php
                  if (validation_errors() != NULL){
                    echo '<div class="col-md-4 col-md-offset-4">
                    <div class="alert alert-danger alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>'. validation_errors().'
                    </div>
                    </div>
                    ';
                  }
                ?>

                <form action="<?php echo base_url('site/checkout_validation'); ?>" id="checkoutform" method="post">
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>ชื่อจริง</label>
                            <input class="le-input" name="fname_cus"  value="<?php echo $customer[0]->fname_cus;?>" readonly >
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>นามสกุล</label>
                            <input class="le-input" name="lname_cus"  value="<?php echo $customer[0]->lname_cus;?>" readonly >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-4">
                            <label>รหัสบัตรประชาชน</label>
                            <input class="le-input" name="idcard_cus"  value="<?php echo $customer[0]->idcard_cus;?>" readonly >
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <label>อีเมล</label>
                            <input class="le-input" name="email_cus"  value="<?php echo $customer[0]->email_cus;?>" readonly >
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <label>เบอร์โทร</label>
                            <input class="le-input" name="tel"  value="<?php echo $customer[0]->tel;?>" readonly >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>ที่อยู่</label>
                            <input class="le-input" data-placeholder="ที่อยู่" name="address" id="address" value="<?php echo $customer[0]->address;?>" required>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label>อำเภอ</label>
                            <input class="le-input" data-placeholder="อำเภอ" name="district" id="district"  value="<?php echo $customer[0]->district;?>">
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label>จังหวัด</label>
                            <input class="le-input" data-placeholder="จังหวัด" name="province" id="province"  value="<?php echo $customer[0]->province;?>">
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-4">
                            <label>รหัสไปรษณีย์</label>
                            <input class="le-input" name="postcode" id="postcode"  value="<?php echo $customer[0]->postcode;?>" >
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <label>หมายเหตุ</label>
                            <input class="le-input" name="note" id="note"  >
                        </div>
                    </div><!-- /.field-row -->


                    <div class="row field-row">
                        <div id="create-account" class="col-xs-12">
                            <!--input  class="le-checkbox big" type="checkbox"  /-->
                            <button type="button" onclick="clearField()" value="Reset">เปลี่ยนที่อยู่จัดส่ง</button>
                            <!--a class="simple-link bold" href="#" onclick="clearField()"--></a><font color="red"> ท่านสามารถกรอกข้อมูลที่อยู่ในการจัดส่งใหม่</font>
                        </div>
                    </div><!-- /.field-row -->

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
                              <label>ส่วนลด(เป็นเงิน)</label>
                              <div class="value pull-right">฿<?php echo $sum;?></div>
                          </li>
                          <li>
                              <label>เงินหลังหักส่วนลด</label>
                              <div class="value pull-right">฿0</div>
                          </li>
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
                                <label>ค่าสินค้าทั้งหมด</label>
                                <div class="value ">฿<?php echo $sum;?></div>
                            </li>
                            <li>
                                <label>ค่าขนส่ง</label>
                                <div class="value">
                                    <div class="radio-group">
                                        <input class="le-radio" type="radio" name="group1" value="free" checked> <div class="radio-label bold">ส่งฟรี</div><br>
                                        <input class="le-radio" type="radio" name="group1" value="local">  <div class="radio-label">local delivery<br><span class="bold">$15</span></div>
                                    </div>
                                </div>
                            </li-->
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
                <button class="le-button big" onclick="document.getElementById('checkoutform').submit()">ยืนยันการสั่งซื้อ</button>
            </div><!-- /.place-order-button -->

        </div><!-- /.col -->
    </div><!-- /.container -->
</section><!-- /#checkout-page -->

<script>
  function clearField() {
    document.getElementById("address").value = "";
    document.getElementById("district").value = "";
    document.getElementById("province").value = "";
    document.getElementById("postcode").value = "";
    document.getElementById("note").value = "";
  }
</script>
