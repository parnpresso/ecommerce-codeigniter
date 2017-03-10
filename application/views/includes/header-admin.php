<html>
<head>
   <meta charset="utf-8">
   <title>Admin Zone</title>

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

   <nav class="navbar navbar-inverse">
      <div class="container-fluid">
         <div class="navbar-header">
            <a class="navbar-brand" href=""><?php echo $this->session->userdata('username');?></a>
         </div>
         <ul class="nav navbar-nav">
            <li <?php if ($this->uri->rsegment(2) == "home") echo 'class="active"';?>><a href="<?php echo base_url() ."admin/home"; ?>">Home</a></li>
            <li <?php if ($this->uri->rsegment(2) == "product") echo 'class="active"';?>><a href="<?php echo base_url() ."admin/product"; ?>">Product</a></li>
            <li <?php if ($this->uri->rsegment(2) == "promotion") echo 'class="active"';?>><a href="<?php echo base_url() ."admin/promotion"; ?>">Promotion</a></li>
            <!--li <?php if ($this->uri->rsegment(2) == "email") echo 'class="active"';?>><a href="<?php echo base_url() ."admin/email"; ?>">Email</a></li-->
            <li <?php if ($this->uri->rsegment(2) == "order") echo 'class="active"';?>><a href="<?php echo base_url() ."admin/order"; ?>">Order</a></li>
            <?php
              if ($this->session->userdata('access') == 'ADMIN') {
                if ($this->uri->rsegment(2) == "staff") echo '<li class="active"><a href="'. base_url() .'admin/staff">Staff</a></li>';
                else echo '<li><a href="'. base_url() .'admin/staff">Staff</a></li>';
              }
            ?>
            <li <?php if ($this->uri->rsegment(2) == "user") echo 'class="active"';?>><a href="<?php echo base_url() ."admin/user"; ?>">User</a></li>
            <!--li <?php if ($this->uri->rsegment(2) == "contact") echo 'class="active"';?>><a href="<?php echo base_url() ."admin/contact"; ?>">Contact</a></li-->
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url() ."admin/editprofile"; ?>"><span class="glyphicon glyphicon-user"></span>Edit profile</a></li>
            <li><a href="<?php echo base_url() ."admin/logout"; ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
         </ul>
      </div>
   </nav>
