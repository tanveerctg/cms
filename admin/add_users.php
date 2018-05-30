<?php ob_start();?>
<?php include 'includes/header.php'; ?>



<?php include 'includes/navigation.php'; ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="page-header">
                            Welcome Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <form method="post" action="" enctype="multipart/form-data">


                          <?php
                          $msg1='';
                           $msg2='';
                          if(isset($_POST['submit'])){
 
                          $user_firstname=$_POST['user_firstname'];
                          $user_lastname=$_POST['user_lastname'];
                          $username=$_POST['username'];
                          $user_role=$_POST['user_role'];
                         
                          $user_email=$_POST['user_email'];
                          $user_password=$_POST['user_password'];

                          if(!empty($user_firstname)&&!empty($user_lastname)&&!empty($username)&&!empty($user_role)&&!empty($user_email)&&!empty($user_password)){


                          $query="INSERT INTO users(user_firstname,user_lastname,username,user_role,user_email,user_password)";
                          $query.="VALUES('$user_firstname','$user_lastname','$username','$user_role',' $user_email','$user_password')";
                          $new_user_run=mysqli_query($connection,$query);

                          $user_id=mysqli_insert_id($connection);
                          $msg1= "User included &nbsp<a href='users.php'>View Users</a><a href='edit_user.php?edit_id= $user_id'>&nbsp Edit User</a>";
                          }else{
                            $msg2= "Please fill in all fields";
                          }

                        }

                          ?>

                            <?php if($msg1!=''): ?>
                                <div class="alert alert-success">
                                <?php echo $msg1 ;?>
                                </div>
                                <?php endif;?>

                                 <?php if($msg2!=''): ?>
                                <div class="alert alert-danger">
                                <?php echo $msg2 ;?>
                                </div>
                                <?php endif;?>

                          <div class="form-group">
                          Firstname:<input type="text" name='user_firstname' class="form-control ">
                            </div>
                            

                            <div class="form-group">
                              Lastname:
                            <input type="text" name='user_lastname' class="form-control">
                              </div>
                              

                              <div class="form-group">
                              Username:<input type="text" name='username' class="form-control">
                                </div>

                                <div class="form-group">
                                  <select name="user_role" id="">

                                    <?php echo "<option value='subscriber'>Select option</option>";?>
                                    <?php echo "<option value='admin'>admin</option>";?>
                                    <?php echo "<option value='subscriber'>subscriber</option>";?>
                                  </select>
                              </div>

                                 <div class="form-group">
                              Email:<input type="email" name='user_email' class="form-control">
                                </div>

                                    <div class="form-group">
                                  Password:<input type="password" name='user_password' class="form-control">
                                    </div>

                            <input type="submit" name='submit' value="Submit" class="btn btn-primary">

                          </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>
