<!--div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
   <title>Add new product</title>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
  <br/><br/>
  <div class="container-fluid">
    <!--form class="form-horizontal" action="<?php echo base_url('admin/add_product_validation');?>" method="post" id="register-form"-->
    <?php echo form_open_multipart(base_url('admin/add_user_validation'),  array('class' => 'form-horizontal'));?>
      <fieldset>
        <!-- Form Name -->
        <legend style="text-align:center"><h2>เพิ่มข้อมูลลูกค้าใหม่</h2></legend>
        <br />
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
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-4 control-label" for="username">ชื่อบัญชี</label>
              <div class="col-md-4">
                <input id="username" name="username" value="<?php echo $this->input->post('username');?>" type="text" placeholder="Username" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">รหัสผ่าน</label>
              <div class="col-md-4">
                <input id="password" name="password" value="<?php echo $this->input->post('password');?>" type="text" placeholder="Password" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="firstname">ชื่อจริง</label>
              <div class="col-md-4">
                <input id="firstname" name="firstname" value="<?php echo $this->input->post('firstname');?>" type="text" placeholder="Firstname" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="lastname">นามสกุล</label>
              <div class="col-md-4">
                <input id="lastname" name="lastname" value="<?php echo $this->input->post('lastname');?>" type="text" placeholder="Lastname" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idcard">รหัสบัตรประชาชน</label>
              <div class="col-md-4">
                <input id="idcard" name="idcard" value="<?php echo $this->input->post('idcard');?>" type="text" placeholder="ID card" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="email">อีเมล</label>
              <div class="col-md-4">
                <input id="email" name="email" value="<?php echo $this->input->post('email');?>" type="text" placeholder="Email" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="telephone">เบอร์โทร</label>
              <div class="col-md-4">
                <input id="telephone" name="telephone" value="<?php echo $this->input->post('telephone');?>" type="text" placeholder="Telephone" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="address">ที่อยู่</label>
              <div class="col-md-4" >
                <textarea class="form-control" rows="5" id="address" name="address" placeholder="Address"><?php echo $this->input->post('address');?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="district">อำเภอ</label>
              <div class="col-md-4">
                <input id="district" name="district" value="<?php echo $this->input->post('district');?>" type="text" placeholder="District" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="province">จังหวัด</label>
              <div class="col-md-4">
                <input id="province" name="province" value="<?php echo $this->input->post('province');?>" type="text" placeholder="Province" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="postcode">รหัสไปรษณีย์</label>
              <div class="col-md-4">
                <input id="postcode" name="postcode" value="<?php echo $this->input->post('postcode');?>" type="text" placeholder="Postcode" class="form-control input-md" required="">
              </div>
            </div>



            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <a href="<?php echo base_url('admin/user');?>" class="btn btn-danger" style="float:left;">กลับ</a>
                <button type="submit" class="btn btn-success" name="btn-signup" style="float:right;">
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp;เพิ่ม
                </button>
              </div>
            </div>

          </form>
          </html>
