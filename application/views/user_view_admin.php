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
        <legend style="text-align:center"><h2>View user</h2></legend>
        <br />

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Username</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $user[0]->username_cus;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="firstname">Firstname</label>
              <div class="col-md-4">
                <label class="control-label" for="firstname"><?php echo $user[0]->fname_cus;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="lasname">Lasname</label>
              <div class="col-md-4">
                <label class="control-label" for="lasname"><?php echo $user[0]->lname_cus;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="Email">Email</label>
              <div class="col-md-4">
                <label class="control-label" for="Email"><?php echo $user[0]->email_cus;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="ID card">ID card</label>
              <div class="col-md-4">
                <label class="control-label" for="ID card"><?php echo $user[0]->idcard_cus;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="address">Address</label>
              <div class="col-md-4">
                <label class="control-label" for="address"><?php echo $user[0]->address;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="district">District</label>
              <div class="col-md-4">
                <label class="control-label" for="district"><?php echo $user[0]->district;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="province">Province</label>
              <div class="col-md-4">
                <label class="control-label" for="province"><?php echo $user[0]->province;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="postcode">postcode</label>
              <div class="col-md-4">
                <label class="control-label" for="postcode"><?php echo $user[0]->postcode;?></label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <a href="<?php echo base_url('admin/user');?>" class="btn btn-danger" style="float:left;">Back</a>
              </div>
            </div>

          </form>
          </html>
