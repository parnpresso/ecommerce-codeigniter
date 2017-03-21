<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Bootstrap and Bootstrap Flat -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-flat.min.css" rel="stylesheet">

</head>
<body>

  <div class='row'>
    <canvas id="canvas"></canvas>
  </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script>
  var lineChartData = {
			labels : [\"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\"],
			datasets : [
				{
					fillColor : \"rgba(220,220,220,0.5)\",
					strokeColor : \"rgba(220,220,220,1)\",
					pointColor : \"rgba(220,220,220,1)\",
					pointStrokeColor : \"#fff\",
					data : [65,59,90,81,56,55,40],
					bezierCurve : false
				}
			]

		}
		var options = {
    		bezierCurve : false,
            onAnimationComplete: done
		};

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData,options);
function done() {
    console.log('done');
	var url=document.getElementById("canvas").toDataURL();
	document.getElementById("url").src=url;
}
  </script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
