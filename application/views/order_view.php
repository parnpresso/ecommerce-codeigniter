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
   <style>
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
   </style>
</head>

<body>
<br/><br/>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-md-offset-10">
      <button onclick="myFunction()" class='no-print'>ปริ้นใบสั่งซื้อ</button>
    </div>
    <div class="col-md-12">
      <center><img alt="logo" src="<?php echo public_url();?>assets/images/logo_a.png" /></center>
      <center><h1>บริษัท เอเชียการไฟฟ้า จำกัด</h1></center><br>
      <center>158/1 ถนน ช้างเผือก ตำบล ศรีภูมิ อำเภอเมืองเชียงใหม่ จังหวัดเชียงใหม่ (โทร.053-214683) (แฟ๊กซ์.053-214717) </center>
    </div>


    <div class="col-md-6 col-md-offset-3">
    </br></br><center><h2>รายการสั่งซื้อสินค้า</h2></center><br>
      <div class="col-md-6 panel panel-default">
        <div class="col-md-4">
        <br>
          ผู้ขาย : <br>
          สถานที่จัดส่ง:<br>

          <br>
        </div>
        <div class="col-md-8">
          <br>
          บริษัท เอเชียการไฟฟ้า จำกัด<br>
          <?php echo $order[0]->address.', '.$order[0]->district.', '.$order[0]->province.', '.$order[0]->postcode?><br>

          <br>
        </div>
      </div>
      <div class="col-md-6 panel panel-default">
        <div class="col-md-5">
          <br>
          เลขที่ใบสั่งซื้อ:<br>
          ผู้ติดต่อ:<br>
          วันที่สั่ง:<br>
          วันกำหนดส่ง:<br>
          <br>
        </div>
        <div class="col-md-7">
          <br>
          <?php
            $date = substr($order[0]->date, 0, 10);
            $dateOrder = date('Y-m-d', strtotime($date. ' + 3 days'));
          ?>
          <?php echo $order[0]->order_id;?><br>
          <?php echo $order[0]->fname.' '.$order[0]->lname;?><br>
          <?php echo $date;?><br>
          <?php echo $dateOrder;?><br>
            <br>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-md-offset-3">
      <center>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>รหัสสินค้า</th>
              <th>รายการ</th>
              <th>จำนวน</th>
              <th>หน่วย</th>
              <th>ราคา/หน่วย</th>
              <th>จำนวนเงิน</th>
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
                echo '<th>'.(int)$order[$x]->product_price * (int)$order[$x]->product_quantity.'</th>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th class="col-md-7">
                หมายเหตุ : <br>
                <?php echo $order[0]->note; ?>
              </th>
              <th class="col-md-5">
                <?php
                  $sum = 0;
                  for ($x = 0; $x <= sizeof($order)-1; $x++) {
                    $sum += $order[$x]->product_price * (int)$order[$x]->product_quantity;
                  }
                  //echo '<th>';
                  //echo '<th>รวมเป็นเงิน</th>';
                  //echo '<th><center>'.$sum.' บาท </center></th>';
                  //echo '</th>';
                ?>
                <table class="table table-bordered">
                  <tbody>
                    <tr><th>ลดราคา</th><th>฿0</th></tr>
                    <tr><th>ลดไป</th><th>0%</th></tr>
                    <tr><th>ภาษีมูลค่าเพิ่ม 7%</th><th>฿<?php echo $sum*0.07;?></th></tr>
                    <tr><th>ค่าจัดส่ง</th><th>฿0</th></tr>
                    <tr><th>ราคารวม</th><th>฿<?php echo $sum*0.93;?></th></tr>
                    <tr><th>รวมสุทธิ</th><th>฿<?php echo $sum;?></th></tr>
                  </tbody>
                </table>
              </th>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th>
                เงื่อนไขอื่นๆ : <br>
                1) หากเกิดข้อผิดพลาด ให้โทรแจ้งพนักงานหรือติดต่อผ่านหน้าเว็บไซต์<br>
              </th>
            </tr>
          </tbody>
        </table>
      </center>
    </div>
  </div>
</div>


<script>
function myFunction() {
    window.print();
}
</script>

</body>
</html>
