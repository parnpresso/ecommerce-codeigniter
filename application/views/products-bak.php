<?php
session_start();
include_once "db_connect.php";
$strSQL = "SELECT * FROM customer WHERE id = '".$_SESSION['id']."' ";
$objQuery = mysqli_query($DBcon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
$data = "Logout";


?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>สินค้า</title>

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <!-- Latest compiled and minified JavaScript -->

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
   <link rel="stylesheet" href="css/flexslider.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <link rel="stylesheet" href="css/style.css">


</head>

<body>


   <header id="home">

      <section class="top-nav hidden-xs">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="top-left">
                     <ul>
                        <li>
                        <?php
                        if($_SESSION['id'] == "")
                        {

                           echo '<a href="login.php">'. $post['Login']. '</a>';
                           echo "|";
                           echo '<a href="register.php">'. $post['Register']. '</a>';

                        }
                        else{
                           echo '<a href="profileuser.php">'. $objResult["username_cus"]. '</a>';
                           echo "&nbsp;";
                           echo "&nbsp;";
                           echo "|";
                           echo "&nbsp;";
                           echo "&nbsp;";
                           echo '<a href="logout.php">'. $data. '</a>';
                        }
                        ?>
                     </li>
                     </ul>
               </div>
            </div>

            <div class="col-md-6">
               <div class="top-right">
                  <p>Location:<span>158/1 ถนน ช้างเผือ ตำบล ศรีภูมิ อำเภอเมืองเชียงใหม่ จังหวัดเชียงใหม่ 50200</span></p>
               </div>
            </div>

         </div>
      </div>
   </section>

   <!--main-nav-->

   <div id="main-nav">

      <nav class="navbar">
         <div class="container">

            <div class="navbar-header">
               <a href="index.php" class="navbar-brand"><img src="image/logo/logo-ae.png" alt="" style="width:45px;height:35px;"></a>
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
                  <span class="sr-only">Toggle</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
            </div>

            <div>

               <h1 style="text-align:right">สินค้าทั้งหมด</h1>

            </div>
         </div>
      </nav>
   </div>

</header>

<!-- Page Content -->
<div class="container">

   <div class="row">

      <div class="col-md-3">
         <p class="lead">Shop Name</p>

         <!-- <div class="search-form col-md-3">
         <form>
         <input type="text" id="s" size="40" placeholder="Search..." />
      </form>
   </div> -->

   <div class="list-group">
      <a href="#" class="list-group-item">Category 1</a>
      <a href="#" class="list-group-item">Category 2</a>
      <a href="#" class="list-group-item">Category 3</a>
   </div>
</div>

<div class="col-md-9">

   <div class="row carousel-holder">

      <div class="col-md-12">
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="item active">
                  <img class="slide-image" src="http://placehold.it/800x300" alt="">
               </div>
               <div class="item">
                  <img class="slide-image" src="http://placehold.it/800x300" alt="">
               </div>
               <div class="item">
                  <img class="slide-image" src="http://placehold.it/800x300" alt="">
               </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
         </div>
      </div>

   </div>

   <div class="row">

      <div class="col-sm-4 col-lg-4 col-md-4">
         <div class="thumbnail">
            <img src="http://placehold.it/320x150" alt="">
            <div class="caption">
               <h4 class="pull-right">$24.99</h4>
               <h4><a href="#">First Product</a>
               </h4>
               <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
            </div>
            <div class="ratings">
               <p class="pull-right">15 reviews</p>
               <p>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
               </p>
            </div>
         </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
         <div class="thumbnail">
            <img src="http://placehold.it/320x150" alt="">
            <div class="caption">
               <h4 class="pull-right">$64.99</h4>
               <h4><a href="#">Second Product</a>
               </h4>
               <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="ratings">
               <p class="pull-right">12 reviews</p>
               <p>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
               </p>
            </div>
         </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
         <div class="thumbnail">
            <img src="http://placehold.it/320x150" alt="">
            <div class="caption">
               <h4 class="pull-right">$74.99</h4>
               <h4><a href="#">Third Product</a>
               </h4>
               <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="ratings">
               <p class="pull-right">31 reviews</p>
               <p>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
               </p>
            </div>
         </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
         <div class="thumbnail">
            <img src="http://placehold.it/320x150" alt="">
            <div class="caption">
               <h4 class="pull-right">$84.99</h4>
               <h4><a href="#">Fourth Product</a>
               </h4>
               <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="ratings">
               <p class="pull-right">6 reviews</p>
               <p>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
               </p>
            </div>
         </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
         <div class="thumbnail">
            <img src="http://placehold.it/320x150" alt="">
            <div class="caption">
               <h4 class="pull-right">$94.99</h4>
               <h4><a href="#">Fifth Product</a>
               </h4>
               <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="ratings">
               <p class="pull-right">18 reviews</p>
               <p>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
               </p>
            </div>
         </div>
      </div>

      <div class="col-sm-4 col-lg-4 col-md-4">
         <h4><a href="#">Like this template?</a>
         </h4>
         <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
         <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
      </div>

   </div>

</div>

</div>

</div>
<!-- /.container -->



<hr>
<!--footer-->
<div id="footer" style="text-align:right">
   <div class="container">
      <div class="row">
         <div class="col-md-1" style="text-align:left"><a href="#"><span class="glyphicon glyphicon-chevron-up"></a></div>
            <div class="col-md-11" style="text-align:right">
               <div class="footer-heading">
                  © 2015 Asia Electric Co.,Ltd. All Rights Reserved.

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /.container -->

   <!-- jQuery -->
   <script src="js/jquery.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.flexslider.js"></script>
   <script src="js/jquery.inview.js"></script>
   <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
   <script src="js/script.js"></script>
   <script src="contactform/contactform.js"></script>


</body>

</html>
<?php
mysqli_close($DBcon);
?>
