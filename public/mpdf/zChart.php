<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-flat.min.css" rel="stylesheet">
</head>
<body>
  <!-- BEGIN CONTAINER -->
  <div class='container'>

    <!-- BEGIN HEADER -->
    <div class='row'>
      <div class='col-xs-1'>
        <img src="img/app-icon.png" width=65px hight=65px />
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
    <!-- END HEADER -->

    <!-- BEGIN TABLE -->
    <div class='row'>
      <div class='row' style='background: #95A5A6;'></div>
      <br>
      <table class="table table-bordered" width='80%' >
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
    <!-- END TABLE -->

    <!-- BEGIN CHART -->
    <div class='row'>
      <canvas id="myChart" ></canvas>
      <img id='imgChart' src=''/>

    </div>
    <!-- END CHART -->

    <!-- BEGINHIDDEN POST FORM-->
    <form action="zHandlerPost.php" method="post" name="HiddenData" />
    <!-- END HIDDEN POST FORM-->

    <!-- BEGIN FOOTER -->
    <div class='row'>
      FOOTER
    </div>
    <!-- END FOOTER -->

  </div>
  <!-- END CONTAINER -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script>


  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          },
          animation: {
                  duration: 0,
                  onProgress: function(animation) {
                      ctx.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                  },
                  onComplete: function(animation) {
                      window.setTimeout(function() {
                          ctx.value = 0;
                          var canvas = document.getElementById("myChart");
                          document.getElementById("imgChart").src = canvas.toDataURL();


                          var theForm = document.forms['HiddenData'];
                          function addHidden(theForm, key, value) {
                              // Create a hidden input element, and append it to the form:
                              var input = document.createElement('input');
                              input.type = 'hidden';
                              input.name = key;'name-as-seen-at-the-server';
                              input.value = value;
                              theForm.appendChild(input);
                          }
                          // Form reference:
                          var theForm = document.forms['HiddenData'];
                          // Add data:
                          addHidden(theForm, 'image', document.getElementById("imgChart").src);
                          // Submit the form:
                          theForm.submit();


                      }, 2000);
                  }
              }
      }
  });





  </script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
