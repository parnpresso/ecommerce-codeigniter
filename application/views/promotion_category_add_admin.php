<!--div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
   <title>AdminZone</title>
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
    <form class="form-horizontal" action="<?php echo base_url('admin/add_promotion_category_validation');?>" method="post" id="register-form">
      <fieldset>
        <!-- Form Name -->
        <legend style="text-align:center"><h2>เพิ่มประเภทโปรโมชั่น</h2></legend>
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
              <label class="col-md-4 control-label" for="name">รหัสโปรโมชั่น</label>
              <div class="col-md-4">
                <input id="codename" name="codename" value="<?php echo $this->input->post('codename');?>" type="text" placeholder="Codename" class="form-control input-md" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="price">ชื่อโปรโมชั่น</label>
              <div class="col-md-4">
                <input id="name" name="name" value="<?php echo $this->input->post('name');?>" type="text" placeholder="Name" class="form-control input-md" required="">

              </div>
            </div>


            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <a href="<?php echo base_url('admin/promotion_category');?>" class="btn btn-danger" style="float:left;">กลับ</a>
                <button type="submit" class="btn btn-success" name="btn-signup" style="float:right;">
                  <span class="glyphicon glyphicon-log-in"></span> &nbsp;เพิ่ม
                </button>
              </div>
            </div>

          </form>
          </html>
