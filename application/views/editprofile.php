   <div class="container-fluid">
      <form class="form-horizontal" method="post" action="<?php echo base_url('site/edit_profile_validation');?>">
         <fieldset>

            <!-- Form Name -->
            <legend style="text-align:center"><h2>สวัสดี, <?php echo $profile[0]->username_cus;?></h2></legend>
            <br />


            <div class="row">
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
               <div class="col-md-12">
                  <!-- Text input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="username_cus">ชื่อบัญชี</label>
                     <div class="col-md-4">
                        <input id="username_cus" name="username_cus"  placeholder="Username" class="form-control input-md" value="<?php echo $profile[0]->username_cus;?>">

                     </div>
                  </div>

                  <!-- Password input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="password_cus">รหัสผ่าน</label>
                     <div class="col-md-4">
                        <input id="password_cus" name="password_cus" type="password" placeholder="Password" class="form-control input-md" value="<?php echo $profile[0]->password_cus;?>">

                     </div>
                  </div>


                  <!-- Text input fname-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="fname_cus">ชื่อจริง</label>
                     <div class="col-md-4">
                        <input id="fname_cus" name="fname_cus" type="text" placeholder="ชื่อจริง" class="form-control input-md" value="<?php echo $profile[0]->fname_cus;?>">

                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="lname_cus">นามสกุล</label>
                     <div class="col-md-4">
                        <input id="lname_cus" name="lname_cus" type="text" placeholder="นามสกุล" class="form-control input-md" value="<?php echo $profile[0]->lname_cus;?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="email_cus">อีเมล</label>
                     <div class="col-md-4">
                        <input id="email_cus" name="email_cus" type="email" placeholder="E-Mail" class="form-control input-md" value="<?php echo $profile[0]->email_cus;?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="idcard_cus">รหัสบัตรประชาชน</label>
                     <div class="col-md-4">
                        <input id="idcard_cus" name="idcard_cus" type="text" placeholder="นามสกุล" class="form-control input-md" value="<?php echo $profile[0]->idcard_cus;?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="tel">เบอร์โทร</label>
                     <div class="col-md-4">
                        <input id="tel" name="tel" type="text" placeholder="นามสกุล" class="form-control input-md" value="<?php echo $profile[0]->tel;?>">
                     </div>
                  </div>
									<div class="form-group">
                     <label class="col-md-4 control-label" for="address">ที่อยู่</label>
                     <div class="col-md-4">
                        <input id="address" name="address" type="text" placeholder="ที่อยู่" class="form-control input-md" value="<?php echo $profile[0]->address;?>">
                     </div>
                  </div>
									<div class="form-group">
                     <label class="col-md-4 control-label" for="district">อำเภอ</label>
                     <div class="col-md-4">
                        <input id="district" name="district" type="text" placeholder="อำเภอ" class="form-control input-md" value="<?php echo $profile[0]->district;?>">
                     </div>
                  </div>
									<div class="form-group">
                     <label class="col-md-4 control-label" for="province">จังหวัด</label>
                     <div class="col-md-4">
                        <input id="province" name="province" type="text" placeholder="จังหวัด" class="form-control input-md" value="<?php echo $profile[0]->province;?>">
                     </div>
                  </div>
									<div class="form-group">
                     <label class="col-md-4 control-label" for="postcode">รหัสไปรษณีย์</label>
                     <div class="col-md-4">
                        <input id="postcode" name="postcode" type="text" placeholder="รหัสไปรษณีย์" class="form-control input-md" value="<?php echo $profile[0]->postcode;?>">
                     </div>
                  </div>
                  <br />
                  <!-- Button -->
                  <div class="form-group">
                     <div class="col-md-4"></div>
                     <div class="col-md-4">

                        <a href="<?php echo base_url('site');?>" class="btn btn-primary" style="float:left;">กลับ</a>
                        <button type="submit" class="btn btn-success" name="Submit" style="float:right;">
                           บันทึก
                        </button>
                     </div>
                  </div>

               </fieldset>
            </form>
         </div>
      </div>
   </div>
 </div>
