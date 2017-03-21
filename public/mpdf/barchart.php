<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BAR chart</title>
  </head>
  <body>

    <h1>Bar Chart</h1>

    <canvas id="myChart" width="400" height="400"></canvas>

    <script src="js/Chart.min.js"></script>
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
                            alert('dDD');
                        }, 2000);
                    }
                }
        }
    });
    </script>
  </body>
</html>
