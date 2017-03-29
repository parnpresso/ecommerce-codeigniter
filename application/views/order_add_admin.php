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
      <legend style="text-align:center"><h2>เพิ่มใบสั่งซื้อ</h2></legend><br />
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
      <?php echo form_open_multipart('admin/add_order_validation',  array('class' => 'form-horizontal'));?>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-md-4 control-label" for="fname">ชื่อผู้ติดต่อ</label>
            <div class="col-md-4">
              <input id="fname" name="fname" value="<?php echo $this->input->post('fname');?>" type="text" placeholder="ชื่อผู้ติดต่อ" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="lname">นามสกุลผู้ติดต่อ</label>
            <div class="col-md-4">
              <input id="lname" name="lname" value="<?php echo $this->input->post('lname');?>" type="text" placeholder="นามสกุลผู้ติดต่อ" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="discount">ส่วนลด</label>
            <div class="col-md-4">
              <input id="discount" name="discount" value="<?php echo $this->input->post('discount');?>" type="text" placeholder="(ใส่เป็นทศนิยม เช่น ลด 15% ให้ใส่เป็น 0.15)" class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="note">หมายเหตุ</label>
            <div class="col-md-4" >
              <textarea class="form-control" rows="5" id="note" name="note"><?php echo $this->input->post('note');?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a href="<?php echo base_url('admin/order');?>" class="btn btn-danger" style="float:left;">กลับ</a>
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
