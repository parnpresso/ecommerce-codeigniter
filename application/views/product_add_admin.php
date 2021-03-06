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
    <fieldset>
      <legend style="text-align:center"><h2>เพิ่มสินค้า</h2></legend><br />
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
      <?php echo form_open_multipart('admin/add_product_validation',  array('class' => 'form-horizontal'));?>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">ชื่อสินค้า</label>
            <div class="col-md-4">
              <input id="name" name="name" value="<?php echo $this->input->post('name');?>" type="text" placeholder="Name" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">ประเภทสินค้า</label>
            <div class="col-md-4">
              <?php
                if (form_error('item_price_rate') != NULL){
                    echo '<div class="alert alert-danger alert-error">';
                    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'. form_error('item_price_rate');
                    echo '</div>';
                }
                echo form_dropdown('category', $categories);
                echo "</p>";
              ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="price">ราคาสินค้า</label>
            <div class="col-md-4">
              <input id="price" name="price" value="<?php echo $this->input->post('price');?>" type="text" placeholder="Price" class="form-control input-md" required="">
            </div>
          </div>
      
          <div class="form-group">
            <label class="col-md-4 control-label" for="detail">รายละเอียดสินค้า</label>
            <div class="col-md-4" >
              <textarea class="form-control" rows="5" id="detail" name="detail"><?php echo $this->input->post('detail');?></textarea>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="weight">น้ำหนัก</label>
            <div class="col-md-4" >
              <input id="weight" name="weight" value="<?php echo $this->input->post('weight');?>" type="text" placeholder="Weight" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="size">ขนาด</label>
            <div class="col-md-4" >
              <input id="size" name="size" value="<?php echo $this->input->post('size');?>" type="text" placeholder="Size" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="unit">หน่วย</label>
            <div class="col-md-4" >
              <input id="unit" name="unit" value="<?php echo $this->input->post('unit');?>" type="text" placeholder="Unit" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="image">รูปสินค้า</label>
            <div class="col-md-4">
              <!--input type="file" name="image" id="image"-->
              <input id="file-0" class="file" type="file" multiple data-min-file-count="1" name="userfile">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a href="<?php echo base_url('admin/product');?>" class="btn btn-danger" style="float:left;">กลับ</a>
              <button type="submit" class="btn btn-success" name="btn-signup" style="float:right;">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;เพิ่ม
              </button>
            </div>
          </div>
        </div>
      </div>
      </form>

    </fieldset>
  </div>
</body>
</html>
