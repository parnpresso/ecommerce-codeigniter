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
   <link rel="stylesheet" href="<?php echo public_url(); ?>css/flexslider.css">
   <link rel="stylesheet" href="<?php echo public_url(); ?>css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo public_url(); ?>css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo public_url(); ?>css/style.css">
</head>

<body>

  <header id="home">

    <section class="top-nav hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-md-6 pull-right">
            <div class="top-left pull-right">
              <ul>
                <li>
                  <a href="login.php">Login</a>
                  |
                  <a href="register.php">Register</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>



    <div id="main-nav">

      <nav class="navbar">
        <div class="container">

          <div class="navbar-header">
            <a href="index.php" class="navbar-brand"><img src="<?php echo public_url(); ?>image/logo/logo-ae.png" alt="" style="width:45px;height:35px;"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
              <span class="sr-only">Toggle</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse" id="ftheme">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#home">หน้าหลัก</a></li>
              <li><a href="#about">เกี่ยวกับ</a></li>
              <li><a href="#service">สินค้า</a></li>
              <li><a href="#contact">ติดต่อเรา</a></li>
              <!--li class="hidden-sm hidden-xs">
                <a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
              </li-->
            </ul>
          </div>
          <div>
            <h1 style="text-align:right">สินค้าทั้งหมด</h1>
          </div>
        </div>
      </nav>
    </div>

  </header>
