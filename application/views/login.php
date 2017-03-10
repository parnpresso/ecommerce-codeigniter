   <div class="container">
       <div class="row">
           <div class="col-sm-6 col-md-4 col-md-offset-4">
               <h1 class="text-center login-title">Sign in to continue to asia electronic</h1>
               <div class="account-wall">
                   <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                       alt="">

                       <?php
                        if (validation_errors() != NULL){

                               echo '<div class="col-md-12">';
                               echo '<div class="alert alert-danger alert-error">';
                               echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'. validation_errors() ;
                               echo '</div>';
                               echo '</div>';

                            }
                        ?>


                   <form class="form-signin" name="form1" method="post" action="<?php echo base_url(); ?>site/login_validation">
                      <?php
                      if(isset($msg)){
                        echo $msg;
                      }
                      ?>
                   <input type="text" class="form-control" placeholder="Username" name="username" id="username" required autofocus>
                   <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                   <button class="btn btn-lg btn-primary btn-block" type="submit" style="width:100%"> Sign in</button>
                   </form>
               </div>

           </div>
       </div>
   </div>
