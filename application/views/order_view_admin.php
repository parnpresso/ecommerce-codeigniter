<?php var_dump($order); ?>

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
    <form class="form-horizontal" action="<?php echo base_url('admin/edit_product_validation');?>" method="post" id="register-form">
      <fieldset>
        <!-- Form Name -->
        <legend style="text-align:center"><h2>ดูใบสั่งสินค้า</h2></legend>
        <br />

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">ชื่อสินค้า</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $product[0]->name;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">ประเภทสินค้า</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $product[0]->cate_name;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="price">ราคาสินค้า</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $product[0]->price;?></label>
              </div>
            </div>

            <!-- Text input fname-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="detail">รายละเอียดสินค้า</label>
              <div class="col-md-4" >
                <label class="control-label" for="name"><?php echo $product[0]->detail;?></label>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="weight">น้ำหนัก</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $product[0]->weight;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="size">ขนาด</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $product[0]->size;?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="unit">หน่วย</label>
              <div class="col-md-4">
                <label class="control-label" for="name"><?php echo $product[0]->unit;?></label>
              </div>
            </div>

            <!-- Text input lname-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="image">รูปสินค้า</label>
              <div class="col-md-4">
                <img style="width: 300px" src="<?php echo public_url().'image/product/'.$product[0]->image;?>"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <a href="<?php echo base_url('admin/product');?>" class="btn btn-danger" style="float:left;">กลับ</a>
              </div>
            </div>

          </form>
          </html>
