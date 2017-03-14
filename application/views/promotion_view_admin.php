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
    <form class="form-horizontal" action="<?php echo base_url('admin/edit_promotion_validation');?>" method="post" id="register-form">
      <fieldset>
        <!-- Form Name -->
        <legend style="text-align:center"><h2>ดูโปรโมชั่น</h2></legend>
        <br />

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">ชื่อโปรโมชั่น</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $promotion[0]->pro_name;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">ประเภทโปรโมชั่น</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $promotion[0]->cate_name;?></label>
              </div>
            </div>



            <!-- Text input fname-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="detail">รายละเอียดโปรโมชั่น</label>
              <div class="col-md-4" >
                <label class="control-label" for="name"><?php echo $promotion[0]->pro_detail;?></label>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="detail">วันประกาศโปรโมชั่น</label>
              <div class="col-md-4" >
                <label class="control-label" for="name"><?php echo $promotion[0]->pro_date;?></label>

              </div>
            </div>

            <!-- Text input lname-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="image">รูปสินค้า</label>
              <div class="col-md-4">
                <img style="width: 300px" src="<?php echo public_url().'image/promotion/'.$promotion[0]->pro_image;?>"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <a href="<?php echo base_url('admin/promotion');?>" class="btn btn-danger" style="float:left;">กลับ</a>
              </div>
            </div>

          </form>
          </html>
