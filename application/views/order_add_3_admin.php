<?php
//var_dump($this->session->all_userdata());
//var_dump($customer);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <title>Add new order</title>
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
      <legend style="text-align:center"><h2>เลือกลดราคาสำหรับ <?php echo $this->session->userdata('customer')[0]['customer_name']; ?></h2></legend><br />



  <div class="row">

    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
        </div>
        <div class="panel-body">

        <form action="<?php echo base_url('admin/add_order_validation');?>" id="subForm" method="post">
          <div class="form-group">
             <label class="col-md-3 control-label" for="username_cus">ลดราคา </label>
             <div class="col-md-9">
                <input id="discount" name="discount"  placeholder="(ใส่เป็นทศนิยม เช่น ลด 20% ก็ใส่ 0.2)" class="form-control input-md" value="">

             </div>
          </div>

        </div>

        <div class="panel-footer">

          <nav style="text-align:right">

          </nav>
        </div>
      </div>

    </div><!-- /.col-lg-6 -->
  </div>


  <div class="form-group">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">

        <a href="<?php echo base_url('admin/order');?>" class="btn btn-danger" style="float:left;">กลับ</a>
        <button type="submit" class="btn btn-success" style="float:right;" onclick="subForm()">
          <span class="glyphicon glyphicon-log-in"></span> &nbsp;เสร็จสิ้น
        </button>
      </form>
    </div>
  </div>
</div>
</div>


</fieldset>









</div>

<script>
function subForm() {
  document.getElementById("subForm").submit();
}
</script>
</body>
</html>
