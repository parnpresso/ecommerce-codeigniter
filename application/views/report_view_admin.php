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
      <center><h2>บริษัท เอเชียการไฟฟ้า จำกัด</h2></center><br>
      <center><h4>รายงานสรุปยอดขายประจำเดือน</h4></center><br>
      <center >ปี <?php echo $year; ?> ประจำเดือน <?php echo $month; ?></center>
    </div></br>
<br>
    <div class="col-md-6 col-md-offset-3">
      <center>
        <?php
          $sum = 0;
          $sum_each_cate = 0;
          for ($x = 0; $x < sizeof($report); $x++) {
            echo '<table class="table table-bordered" style="margin-bottom: 0px">';
            echo '<thead>';
            echo '<tr>';
            echo '<th><center>';
            echo $report[$x]['category'];
            echo '</center></th>';
            echo '</tr>';
            echo '</thead>';
            echo '</table>';
            echo '<table class="table table-bordered" style="margin-bottom: 0px">';
            echo '<thead>';
            echo '<tr>';
            //echo '<th bgcolor="#8dbbbf">รหัสสินค้า</th>';
            echo '<th bgcolor="#8dbbbf">รายการ</th>';
            echo '<th bgcolor="#8dbbbf">จำนวน</th>';
            echo '<th bgcolor="#8dbbbf">หน่วย</th>';
            echo '<th bgcolor="#8dbbbf">จำนวนเงิน</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            for ($y = 0; $y < sizeof($report[$x]['product']); $y++) {
              echo '<tr>';
              //echo '<th>'.$report[$x]['product'][$y]->id.'</th>';
              echo '<th>'.$report[$x]['product'][$y]->product_name.'</th>';
              echo '<th>'.$report[$x]['product'][$y]->product_quantity.'</th>';
              echo '<th>'.$report[$x]['product'][$y]->product_unit.'</th>';
              echo '<th>'.(int)$report[$x]['product'][$y]->product_price * (int)$report[$x]['product'][$y]->product_quantity.'</th>';
              echo '</tr>';
              //echo $sum_each_cate.',';
              $sum_each_cate = $sum_each_cate + ((int)$report[$x]['product'][$y]->product_price * (int)$report[$x]['product'][$y]->product_quantity);
              //echo "--------------". $x.$y;
            }
            echo '</tbody>';
            echo '</table>';
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th><center>';
            echo 'ราคารวม (บาท)';
            echo '</center></th>';
            echo '<th><center>';
            echo sprintf("%.2f",$sum_each_cate);
            echo '</center></th>';
            echo '</tr>';
            echo '</thead>';
            echo '</table>';
            $sum = $sum + $sum_each_cate;
            $sum_each_cate = 0;
          }

        ?>
        <!--table class="table table-bordered">
          <thead>
            <tr>
              <th bgcolor="#8dbbbf">รหัสสินค้า</th>
              <th bgcolor="#8dbbbf">รายการ</th>
              <th bgcolor="#8dbbbf">จำนวน</th>
              <th bgcolor="#8dbbbf">หน่วย</th>
              <th bgcolor="#8dbbbf">จำนวนเงิน</th>
            </tr>
          </thead>
          <tbody>
            <?php
              /*for ($x = 0; $x <= sizeof($report)-1; $x++) {
                echo '<tr>';
                //$t = $x + 1;
                echo '<th>'.$report[$x]->id.'</th>';
                echo '<th>'.$report[$x]->product_name.'</th>';
                echo '<th>'.$report[$x]->product_quantity.'</th>';
                echo '<th>'.$report[$x]->product_unit.'</th>';
                echo '<th>'.(int)$report[$x]->product_price * (int)$report[$x]->product_quantity.'</th>';
                echo '</tr>';
              }*/
            ?>
          </tbody>
        </table-->
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th class="col-md-6">
                 <br>
                <?php //echo $report[0]->note; ?>
              </th>
              <th class="col-md-6">
                <?php
                  /*$sum = 0;
                  for ($x = 0; $x <= sizeof($report)-1; $x++) {
                    $sum += $report[$x]->product_price * (int)$report[$x]->product_quantity;
                  }*/
                  //echo '<th>';
                  //echo '<th>รวมเป็นเงิน</th>';
                  //echo '<th><center>'.$sum.' บาท </center></th>';
                  //echo '</th>';
                ?>
                <table class="table table-bordered">
                  <tbody>
                    <tr><th>ภาษีมูลค่าเพิ่ม 7%</th><th>฿<?php echo sprintf("%.2f", $sum*0.07);?></th></tr>
                    <tr><th>ยอดขายรวม (บาท)</th><th>฿<?php echo sprintf("%.2f", $sum);?></th></tr>
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
