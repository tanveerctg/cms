<?php  include "includes/db.php"; ?>
<?php include "includes/navbar.php";?>
 <?php  include "includes/header.php"; ?>


                         <?php
                         //sign up

                          $signup_err_msg="";
                          $successful_msg="";
                          if(isset($_POST['signup'])){
                          

                          $username=$_POST['username'];
                          $user_firstname=$_POST['user_firstname'];
                          $user_lastname=$_POST['user_lastname'];
                          $user_password=$_POST['user_password'];
                          $user_email=$_POST['user_email'];
                

                          $query="SELECT * FROM users";
                          $query_run=mysqli_query($connection,$query);

                          if(empty($username)||empty( $user_firstname)||empty($user_lastname)||empty($user_password)||empty( $user_email)){
                            
                            $signup_err_msg="Please fill in all fields";
                          }else{
                        
                          $query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role)";
                          $query.="VALUES('$username','$user_password','$user_firstname','$user_lastname','$user_email','subscriber')";
                          $new_post_run=mysqli_query($connection,$query);
                          $successful_msg="Registration done";
                      }
                          
                          }

                          ?>
                        
                       
                                

    
 
    <!-- Page Content -->
    <div class="container">
    
    <!-- Registration -->

                      <div class="container col-md-8">
                          <div class="row">
                              <div class="col-xs-8 col-xs-offset-3">
                                  <div class="form-wrap">
                                  <h1>Sign Up</h1>
                                      <form role="form" action="" method="post" >
                                          <div class="form-group">
                                              <label  >Firstname</label>
                                              <input type="text" name="user_firstname"  class="form-control" placeholder="Enter your firstname">
                                          </div>
                                          <div class="form-group">
                                              <label  >Lastname</label>
                                              <input type="text" name="user_lastname"  class="form-control" placeholder="Enter your lastname">
                                          </div>
                                          <div class="form-group">
                                              <label  >Username</label>
                                              <input type="text" name="username"  class="form-control" placeholder="Enter your name">
                                          </div>
                                          <div class="form-group">
                                              <label  >Email</label>
                                              <input type="email" name="user_email"  class="form-control" placeholder="Enter your email">
                                          </div>
                                           <div class="form-group">
                                              <label  >Password</label>
                                              <input type="password" name="user_password"  class="form-control" >
                                          </div>
                                           
                                           
                                           
                                          <input type="submit" name="signup" id="btn-login" class="btn btn-custom btn-lg btn-primary" value="Sign Up">
                                      </form>
                                      <br>
                                        <?php if($signup_err_msg!=''): ?>
                                        <div class="alert alert-danger">
                                        <?php echo $signup_err_msg ;?>
                                        </div>
                                        <?php endif;?>

                                        <?php if($successful_msg!=''): ?>
                                        <div class="alert alert-success">
                                        <?php echo $successful_msg;?>
                                        </div>
                                        <?php endif;?>

                                  </div>
                              </div> 
                                  </div>

                                


                        </div>      
         <!-- /.row -->
    <!-- /.container -->
  



   </div>      
         <!-- /.row -->

      



<?php include "includes/footer.php";?>
