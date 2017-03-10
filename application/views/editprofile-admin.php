<html>
<head>
	<meta http-equiv="Content-Language" content="th">
   <meta http-equiv="content-Type" content="text/html; charset=window-874">
   <meta http-equiv="content-Type" content="text/html; charset=tis-620">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Register admin</title>

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</head>

<body>
   <br />
   <br />

   <div class="container-fluid">
      <form class="form-horizontal" method="post" action="<?php echo base_url('admin/edit_profile_validation');?>">
         <fieldset>

            <!-- Form Name -->
            <legend style="text-align:center"><h2>Hello, <?php echo $profile[0]->username_staff;?></h2></legend>
            <br />


            <div class="row">
              <?php
              if (validation_errors() != NULL){
                echo '<div class="col-md-4 col-md-offset-4">
                <div class="alert alert-danger alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>'. validation_errors().'
                </div>
                </div>
                ';
              }
              ?>
               <div class="col-md-12">
                  <!-- Text input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="username_staff">Username</label>
                     <div class="col-md-4">
                        <input id="username_staff" name="username_staff"  placeholder="Username" class="form-control input-md" value="<?php echo $profile[0]->username_staff;?>">

                     </div>
                  </div>

                  <!-- Password input-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="password_staff">Password</label>
                     <div class="col-md-4">
                        <input id="password_staff" name="password_staff" type="password" placeholder="Password" class="form-control input-md" value="<?php echo $profile[0]->password_staff;?>">

                     </div>
                  </div>


                  <!-- Text input fname-->
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="fname_staff">First name</label>
                     <div class="col-md-4">
                        <input id="fname_staff" name="fname_staff" type="text" placeholder="ชื่อจริง" class="form-control input-md" value="<?php echo $profile[0]->fname_staff;?>">

                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="lname_staff">Last name</label>
                     <div class="col-md-4">
                        <input id="lname_staff" name="lname_staff" type="text" placeholder="นามสกุล" class="form-control input-md" value="<?php echo $profile[0]->lname_staff;?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="email_staff">E-Mail</label>
                     <div class="col-md-4">
                        <input id="email_staff" name="email_staff" type="email" placeholder="E-Mail" class="form-control input-md" value="<?php echo $profile[0]->email_staff;?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="idcard_staff">ID card</label>
                     <div class="col-md-4">
                        <input id="idcard_staff" name="idcard_staff" type="text" placeholder="นามสกุล" class="form-control input-md" value="<?php echo $profile[0]->idcard_staff;?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="tel_staff">Telephone</label>
                     <div class="col-md-4">
                        <input id="tel_staff" name="tel_staff" type="text" placeholder="นามสกุล" class="form-control input-md" value="<?php echo $profile[0]->tel_staff;?>">
                     </div>
                  </div>
                  <br />
                  <!-- Button -->
                  <div class="form-group">
                     <div class="col-md-4"></div>
                     <div class="col-md-4">

                        <a href="<?php echo base_url('admin/home');?>" class="btn btn-primary" style="float:left;">Back</a>
                        <button type="submit" class="btn btn-success" name="Submit" style="float:right;">
                           <span class="glyphicon glyphicon-log-in"></span> &nbsp; Save
                        </button>
                     </div>
                  </div>

               </fieldset>
            </form>
         </div>
      </div>
   </div>
 </div>


</body>
</html>
