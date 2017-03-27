<?php //var_dump($order); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
   <title>Report</title>
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
  <div class="row">
    <div class="col-md-12">
      <center><h1>บริษัท AE</h1></center><br>
      <center>ที่อยู่ที่อยู่ที่อยู่ที่อยู่ที่อยู่ที่อยู่ที่อยู่ที่อยู่ที่อยู่ที่อยู่ที่อยู่</center>
    </div>

    <div class="col-md-6 col-md-offset-3">
      <center><h2>อนุมัติใบสั่งซื้อ</h2></center><br>
      <div class="col-md-6 panel panel-default">
        <div class="col-md-3">
          <br>
          ATTR1:<br>
          ATTR2:<br>
          ATTR3:<br>
          <br>
        </div>
        <div class="col-md-9">
          <br>
          ANSWER1<br>
          ANSWER2<br>
          ANSWER3<br>
          <br>
        </div>
      </div>
      <div class="col-md-6 panel panel-default">
        <div class="col-md-3">
          <br>
          ATTR1:<br>
          ATTR2:<br>
          ATTR3:<br>
          <br>
        </div>
        <div class="col-md-9">
          <br>
          ANSWER1<br>
          ANSWER2<br>
          ANSWER3<br>
          <br>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-md-offset-3">
      <center>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>สินค้า</th>
              <th>จำนวน</th>
              <th>หน่วย</th>
              <th>ราคา</th>
            </tr>
          </thead>
          <tbody>
            <?php
              for ($x = 0; $x <= sizeof($order)-1; $x++) {
                echo '<tr>';
                $t = $x + 1;
                echo '<th>'.$t.'</th>';
                echo '<th>'.$order[$x]->product_name.'</th>';
                echo '<th>'.$order[$x]->product_quantity.'</th>';
                echo '<th>'.$order[$x]->product_unit.'</th>';
                echo '<th>'.$order[$x]->product_price.'</th>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
        <table class="table table-bordered">
          <tbody>
            <?php
              $sum = 0;
              for ($x = 0; $x <= sizeof($order)-1; $x++) {
                $sum += $order[$x]->product_price * (int)$order[$x]->product_quantity;
              }
              echo '<tr>';
              echo '<th>ราคารวม</th>';
              echo '<th><center>'.$sum.' บาท </center></th>';
              echo '</tr>';
            ?>
          </tbody>
        </table>
      </center>
    </div>
  </div>
</div>




</body>
</html>
