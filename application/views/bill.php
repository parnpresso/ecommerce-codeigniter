<?php

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$html_test = "
<html>
<head>
<style>
  body {font-family: thsarabunnew;
      font-size: 18pt;
  }
  td { vertical-align: top;
      border-left: 0.6mm solid #000000;
      border-right: 0.6mm solid #000000;
  	align: center;
  }
  table thead td { background-color: #EEEEEE;
      text-align: center;
      border: 0.6mm solid #000000;
  }
  td.lastrow {
      background-color: #FFFFFF;
      border: 0mm none #000000;
      border-bottom: 0.6mm solid #000000;
      border-left: 0.6mm solid #000000;
  	border-right: 0.6mm solid #000000;
  }
</style>
</head>
<body>

  <!--mpdf
  <htmlpagefooter name='myfooter'>
  <div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; '>
  Page {PAGENO} of {nb}
  </div>
  </htmlpagefooter>

  <sethtmlpageheader name='myheader' value='on' show-this-page='1' />
  <sethtmlpagefooter name='myfooter' value='on' />
  mpdf-->

  <div>
  </div>
  <div style='text-align:center;'>
    <img src=\"app-icon.png\" width=100px hight=100px /> <br>
    ใบแจ้งค่าเช่าห้องพัก
  </div><br>
  <table class='items' width='100%' style='font-size: 18pt; border-collapse: collapse;' cellpadding='8'>
    <thead>
      <tr>
        <td width='15%'>รายการ</td>
        <td width='15%'>จำนวน</td>
        <td width='15%'>ราคา</td>
        <td width='15%'>เงินรวม</td>
      </tr>
    </thead>
    <tbody>
      <tr><td>ค่าห้อง</td><td>4200</td></tr>
      <tr><td>ค่าน้ำ</td><td>ddd</td></tr>
      <tr><td class='lastrow'>ค่าไฟ</td><td class='lastrow'>555555</td></tr>
    </tbody>
  </table>
</body>
</html>
";


$html = "
<html>
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Horganice Billing</title>
  <style>
    body {
      font-family: thsarabunnew;
      font-size: 12pt;
    }
    header {
      font-family: thsarabunnew;
      font-size: 12pt;
    }
    h1.header {
      display: block;
      font-size: 1.4em;
      margin-top: 0em;
      margin-bottom: 0.1em;
      margin-left: 0;
      margin-right: 0;
      font-weight: bold;
      display: inline;
    }
    h2.header {
      display: block;
      font-size: 1.2em;
      margin-top: 0em;
      margin-bottom: 0.1em;
      margin-left: 0;
      margin-right: 0;
      font-weight: bold;
      display: inline;
      float: right;
    }
    table, th, td {
      border: 3px solid black;
      font-family: 1.6;
    }
  </style>
  <!-- Bootstrap and Bootstrap Flat -->
  <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">
  <link href=\"css/bootstrap-flat.min.css\" rel=\"stylesheet\">
</head>
<body>

  <!--mpdf

    <htmlpageheader name='myheader'>
      <div class='container'>
        <div class='row'>
          <div class='col-xs-1'>
            <img src=\"img/app-icon.png\" width=65px hight=65px />
          </div>
          <div class='col-xs-6'>
            <h1 class='header'>หอพักเชิงดอย</h1>
            <p class='header'>9 หมู่ 14 ซ.วัดอุโมงค์ ต.สุเทพ อ.เมืองเชียงใหม่ เชียงใหม่ 50200 <br>
            โทร 085-4003304</p>
          </div>
          <div class='col-xs-3 col-md-offset-3'>
            <h1 align='right' class='header'>ตึก A ห้อง 406</h1>
            <p align='right'>วันที่ 16/12/2559</p>
          </div>
        </div>

    </htmlpageheader>


      <div class='row'>
        <br><br>
        <div class='row' style='background: #95A5A6;'></div>
        <br>
        <table class=\"table table-bordered\" width='80%' >
          <thead>
            <tr>
              <td width='3%'><center>#</center></td>
              <td width='53%'>&nbsp;&nbsp;&nbsp; รายการ</td>
              <td width='15%'><center>จำนวน</center></td>
              <td width='15%'><center>ราคา</center></td>
              <td width='15%'><center>เงินรวม</center></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><center>1</center></td>
              <td>&nbsp;&nbsp;&nbsp; ค่าห้อง</td>
              <td><center>1</center></td>
              <td><center>4200</center></td>
              <td><center>4200</center></td>
            </tr>
            <tr>
              <td><center>2</center></td>
              <td>&nbsp;&nbsp;&nbsp; ค่าน้ำ</td>
              <td><center>3</center></td>
              <td><center>25</center></td>
              <td><center>75</center></td>
            </tr>
            <tr>
              <td class='lastrow'><center>3</center></td>
              <td class='lastrow'>&nbsp;&nbsp;&nbsp; ค่าไฟ</td>
              <td class='lastrow'><center>50</center></td>
              <td class='lastrow'><center>7</center></td>
              <td class='lastrow'><center>350</center></td>
            </tr>
          </tbody>
        </table>

      </div>
      <div class='row'>
        <canvas id=\"myChart\"></canvas>
      </div>


    <htmlpagefooter name='myfooter'>
      <div class='container'>
        <div class='row'>
          <div class='col-xs-7'>
            Copyright-----------------
          </div>

          <div class='col-xs-3 col-md-offset-2'>
            <p align='right'>
              Horganice Coperation
              <img align='right' src=\"img/app-icon.png\" width=45px hight=45px />
            </p>
          </div>
        </div>
      </div>
    </htmlpagefooter>

    <sethtmlpageheader name='myheader' value='on' show-this-page='1' />
    <sethtmlpagefooter name='myfooter' value='on' />
  mpdf-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js\"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
      datasets: [{
        label: 'apples',
        data: [12, 19, 3, 17, 6, 3, 7],
        backgroundColor: \"rgba(153,255,51,0.4)\"
      }, {
        label: 'oranges',
        data: [2, 29, 5, 5, 2, 3, 10],
        backgroundColor: \"rgba(255,153,0,0.4)\"
      }]
    }
    });
  </script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src=\"js/bootstrap.min.js\"></script>
</body>
</html>
";


$html_pure = "
<html>
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Horganice Billing</title>
  <style>
    body {
      font-family: thsarabunnew;
      font-size: 12pt;
    }
    header {
      font-family: thsarabunnew;
      font-size: 12pt;
    }
    h1.header {
      display: block;
      font-size: 1.4em;
      margin-top: 0em;
      margin-bottom: 0.1em;
      margin-left: 0;
      margin-right: 0;
      font-weight: bold;
      display: inline;
    }
    p.header {
      margin-top: 0em;
      margin-bottom: 0.1em;
    }
  </style>
  <!-- Bootstrap and Bootstrap Flat -->
  <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">
  <link href=\"css/bootstrap-flat.min.css\" rel=\"stylesheet\">
</head>
<body>

      <div class='container'>
        <div class='row'>
          <div class='col-xs-1'>
            <img src=\"img/app-icon.png\" width=65px hight=65px />
          </div>
          <div class='col-xs-6'>
            <h1 class='header'>หอพักเชิงดอย </h1>
            ตึก A ห้อง 406
            <p class='header'>9 หมู่ 14 ซ.วัดอุโมงค์ ต.สุเทพ อ.เมืองเชียงใหม่ เชียงใหม่ 50200</p>
            <p class='header'>โทร 085-4003304</p>
          </div>
          <div class='col-xs-3 col-md-offset-2'>
            วันที่ 16/12/2559sssssssssssssssssssssss
          </div>
        </div>
      </div>

      <canvas id=\"myChart\"></canvas>

      <div class='container'>
        <div class='row'>
          <div class='col-xs-7'>
            Copyright
          </div>

          <div class='col-xs-3 col-md-offset-2'>
            <p align='right'>
              asddsa
              <img align='right' src=\"img/app-icon.png\" width=45px hight=45px />
            </p>
          </div>
        </div>

</div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
  <script src=\"js/Chart.min.js\"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
      datasets: [{
        label: 'apples',
        data: [12, 19, 3, 17, 6, 3, 7],
        backgroundColor: \"rgba(153,255,51,0.4)\"
      }, {
        label: 'oranges',
        data: [2, 29, 5, 5, 2, 3, 10],
        backgroundColor: \"rgba(255,153,0,0.4)\"
      }]
    }
    });
  </script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src=\"js/bootstrap.min.js\"></script>
</body>
</html>
";

$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();
echo $html_pure;
?>
