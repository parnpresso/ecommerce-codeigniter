<div id="top-banner-and-menu">

<?php
 if (validation_errors() != NULL){
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-md-4 col-md-offset-4">';
        echo '<div class="alert alert-danger alert-error">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'. validation_errors() ;
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
     }
 ?>

   <div class="container-fluid">
      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>site/register_validation" id="register-form">
         <fieldset>
            <div class="row">
               <div class="col-md-12">
                  <!-- Text input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="username_staff">Username</label>
                     <div class="col-md-4">
                        <input id="username_cus" name="username_cus" type="text" placeholder="Username" value="<?php echo $this->input->post('username_cus');?>" class="form-control input-md" required="">

                     </div>
                  </div>

                  <!-- Password input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="password_staff">Password</label>
                     <div class="col-md-4">
                        <input id="password_cus" name="password_cus" type="password" placeholder="Password" class="form-control input-md" required="">

                     </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="email_cus">E-Mail</label>
                     <div class="col-md-4">
                        <input id="email_cus" name="email_cus" type="email" placeholder="E-Mail" class="form-control input-md" value="<?php echo $this->input->post('email_cus');?>" required="">

                     </div>
                  </div>


                  <!-- Text input fname-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="fname_cus">ชื่อ</label>
                     <div class="col-md-4">
                        <input id="fname_cus" name="fname_cus" type="text" placeholder="ชื่อจริง" class="form-control input-md" value="<?php echo $this->input->post('fname_cus');?>" required="">

                     </div>
                  </div>

                  <!-- Text input lname-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="lname_cus">นามสกุล</label>
                     <div class="col-md-4">
                        <input id="lname_cus" name="lname_cus" type="text" placeholder="นามสกุล" class="form-control input-md" value="<?php echo $this->input->post('lname_cus');?>" required="">

                     </div>
                  </div>


                  <div class="form-group">
                     <label class="col-md-4 control-label" for="address">ที่อยู่</label>
                     <div class="col-md-4">
                        <textarea class="form-control" id="address" name="address" rows="5" ><?php echo $this->input->post('address');?></textarea>
                     </div>
                  </div>




                  <div class="form-group">
                     <label class="col-md-4 control-label" for="com_add">ที่อยู่บริษัท</label>
                     <div class="col-md-4">
                        <textarea class="form-control" id="com_add" name="com_add" rows="5" ><?php echo $this->input->post('com_add');?></textarea>
                     </div>
                  </div>



                  <div class="form-group">
                     <label class="col-md-4 control-label" for="idcard_cus">รหัสบัตรประชาชน</label>
                     <div class="col-md-4">
                        <input id="idcard_cus" name="idcard_cus" type="text" placeholder="ID CARD" class="form-control input-md" value="<?php echo $this->input->post('idcard_cus');?>"  required="">

                     </div>
                  </div>

                  <div class="form-group">
                     <label class="col-md-4 control-label" for="tel">โทร</label>
                     <div class="col-md-4">
                        <input id="tel" name="tel" type="text" placeholder="Tel" class="form-control input-md" value="<?php echo $this->input->post('tel');?>"  required="">

                     </div>
                  </div>


                  <br />
                  <!-- Button -->
                  <div class="form-group">
                     <div class="col-md-12" style="text-align:center">
                        <button type="submit" class="btn btn-success" name="btn-signup" >
                            สมัครสมาชิก
                        </button>
                     </div>
                  </div>
               </fieldset>
            </form>

         </div>
      </div>
   </div>
</div>
