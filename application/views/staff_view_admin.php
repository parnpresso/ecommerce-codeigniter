<!--div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
   <title>User</title>
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
    <form class="form-horizontal" action="<?php echo base_url('admin/edit_product_validation');?>" method="post" id="register-form">
      <fieldset>
        <!-- Form Name -->
        <legend style="text-align:center"><h2>ดูข้อมูลผู้ดูแลระบบ</h2></legend>
        <br />

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">ชื่อบัญชี</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $staff[0]->username_staff;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="firstname">ชื่อจริง</label>
              <div class="col-md-4">
                <label class="control-label" for="firstname"><?php echo $staff[0]->fname_staff;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="lasname">นามสกุล</label>
              <div class="col-md-4">
                <label class="control-label" for="lasname"><?php echo $staff[0]->lname_staff;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="Email">อีเมล</label>
              <div class="col-md-4">
                <label class="control-label" for="Email"><?php echo $staff[0]->email_staff;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="ID card">รหัสบัตรประชาชน</label>
              <div class="col-md-4">
                <label class="control-label" for="ID card"><?php echo $staff[0]->idcard_staff;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="address">ที่อยู่</label>
              <div class="col-md-4">
                <label class="control-label" for="address"><?php echo $staff[0]->address_staff;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="address">สิทธิ์การใช้งาน</label>
              <div class="col-md-4">
                <label class="control-label" for="address"><?php echo $staff[0]->Status;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="address">สร้างเมื่อ</label>
              <div class="col-md-4">
                <label class="control-label" for="address"><?php echo $staff[0]->createdate;?></label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <a href="<?php echo base_url('admin/staff');?>" class="btn btn-danger" style="float:left;">กลับ</a>
              </div>
            </div>

          </form>
          </html>
