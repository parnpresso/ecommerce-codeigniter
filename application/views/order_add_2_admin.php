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
      <legend style="text-align:center"><h2>เลือกสินค้าสำหรับ <?php echo $this->session->userdata('customer')[0]['customer_name']; ?></h2></legend><br />



  <div class="row">
    <div class="col-md-4 col-md-offset-3">
      <div class="input-group pull-right">
        <form class="navbar-form " action="<?php echo base_url('admin/search_product_order');?>" method="post">
          <input type="text" class="form-control" id="product" name="product" placeholder="ค้นหาสินค้า..." required="">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">ค้นหา</button>
          </span>
        </form>
      </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
        </div>
        <div class="panel-body">


          <table class="table" align="center" border="0">
            <thead class="thead-default">
              <tr style="text-align:center">
                <th class="col-md-6">ชื่อ</th>
                <th class="col-md-1"><center>ราคา/บาท</center></th>
                <th class="col-md-1"><center>หน่วย</center></th>
                <th class="col-md-3"><center>จำนวน</center></th>
                <th class="col-md-1"></th>
              </tr>
            </thead>
            <?php
            for ($x = 0; $x <= sizeof($productlist)-1; $x++) {
              echo '<form action="'.base_url('admin/').'choose_product_by_id/'.$productlist[$x]->id.'" id="thisForm"  method="post">';
              echo '<tr>';
              echo '<td><a href="'.base_url('admin/').'view_product/'. $productlist[$x]->id .'">'. $productlist[$x]->name .'</a></td>';
              echo '<td><center>'. $productlist[$x]->price .'</center></td>';
              echo '<td><center>'. $productlist[$x]->unit .'</center></td>';
              echo '<td><input id="amount" name="amount" type="text" placeholder="" class="form-control input-md" required=""></td>';
              echo '<td align="center">
              <button type="submit" class="btn">เพิ่ม</button>
              </td>';
              echo '</tr>';
              echo '<input type="hidden" id="productid" name="productid" value="'.$productlist[$x]->id.'">';
              echo '</form>';
              //'. base_url("admin/set_session_product/"). $productlist[$x]->id .'
            }

            ?>

          </table>

        </div>

        <div class="panel-footer">

          <nav style="text-align:right">
            <ul class="pagination">
              <?php
              if (isset($pagination)) echo $pagination;
              ?>
            </ul>
          </nav>
        </div>
      </div>

    </div><!-- /.col-lg-6 -->
  </div>


  <div class="form-group">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <form action="<?php echo base_url('admin/choose_discount');?>" id="subForm" mdthod="post">
        <a href="<?php echo base_url('admin/order');?>" class="btn btn-danger" style="float:left;">กลับ</a>
        <button type="submit" class="btn btn-success" style="float:right;" onclick="subForm()">
          <span class="glyphicon glyphicon-log-in"></span> &nbsp;ต่อไป
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
