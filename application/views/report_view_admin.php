<?php //var_dump($report); ?>

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
      <center><img alt="logo" src="<?php echo public_url();?>assets/images/logo_a.png" /></center>
      <center><h1>บริษัท เอเชียการไฟฟ้า จำกัด</h1></center><br>
      <center>ปี <?php echo $year; ?> ประจำเดือน <?php echo $month; ?></center>
    </div>
<br>
    <div class="col-md-6 col-md-offset-3">
      <center>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>รหัสสินค้า</th>
              <th>รายการ</th>
              <th>จำนวน</th>
              <th>หน่วย</th>
              <th>จำนวนเงิน</th>
            </tr>
          </thead>
          <tbody>
            <?php
              for ($x = 0; $x <= sizeof($report)-1; $x++) {
                echo '<tr>';
                $t = $x + 1;
                echo '<th>'.$t.'</th>';
                echo '<th>'.$report[$x]->product_name.'</th>';
                echo '<th>'.$report[$x]->product_quantity.'</th>';
                echo '<th>'.$report[$x]->product_unit.'</th>';
                echo '<th>'.(int)$report[$x]->product_price * (int)$report[$x]->product_quantity.'</th>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th class="col-md-6">
                 <br>
                <?php echo $report[0]->note; ?>
              </th>
              <th class="col-md-6">
                <?php
                  $sum = 0;
                  for ($x = 0; $x <= sizeof($report)-1; $x++) {
                    $sum += $report[$x]->product_price * (int)$report[$x]->product_quantity;
                  }
                  //echo '<th>';
                  //echo '<th>รวมเป็นเงิน</th>';
                  //echo '<th><center>'.$sum.' บาท </center></th>';
                  //echo '</th>';
                ?>
                <table class="table table-bordered">
                  <tbody>
                    <tr><th>ส่วนลด(เป็นเงิน)</th><th>฿0</th></tr>
                    <tr><th>เงินหลังหักส่วนลด</th><th>฿0</th></tr>
                    <tr><th>ภาษีมูลค่าเพิ่ม 7%</th><th>฿<?php echo $sum*0.07;?></th></tr>
                    <tr><th>จำนวนเงินทั้งสิ้น</th><th>฿<?php echo $sum;?></th></tr>
                  </tbody>
                </table>
              </th>
            </tr>
          </tbody>
        </table>

      </center>
    </div>
  </div>
</div>




</body>
</html>
