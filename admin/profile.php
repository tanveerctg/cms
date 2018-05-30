<?php include 'includes/header.php'; ?>


<?php ob_start();?>
<?php include 'includes/navigation.php'; ?>

<?php

    $edit_id= $_SESSION['user_id'];
    $query="SELECT * FROM users WHERE user_id=$edit_id";
    $query_run=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($query_run)){

      $inside_user_firstname=$row['user_firstname'];
      $inside_user_lastname=$row['user_lastname'];
      $inside_username=$row['username'];
      $inside_user_role=$row['user_role'];
      $inside_user_email=$row['user_email'];
      $inside_user_password=$row['user_password'];

    }


?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                        <form method="post" action="" enctype="multipart/form-data">


                          <?php
                          $msg1="";
                          if(isset($_POST['submit'])){



                          $user_firstname=$_POST['user_firstname'];
                          $user_lastname=$_POST['user_lastname'];
                          $username=$_POST['username'];
                          $user_role=$_POST['user_role'];
                         
                          $user_email=$_POST['user_email'];
                          $user_password=$_POST['user_password'];


                          $query="UPDATE users SET user_firstname='$user_firstname',user_lastname='$user_lastname',username='$username',user_role='$user_role',user_email='$user_email',user_password='$user_password' where user_id=$edit_id";
                          
                          $edit_user_run=mysqli_query($connection,$query);

                          if(!$edit_user_run){

                            die("Query failed".mysqli_error($connection));
                          }
                           $msg1= "User Updated &nbsp<a href='users.php'>View User</a>";
                          }

                          ?>

                          <?php if($msg1!=''): ?>
                          <div class="alert alert-success">
                          <?php echo $msg1 ;?>
                          </div>
                          <?php endif;?>

                          <div class="form-group">
                          Firstname:<input type="text" name='user_firstname' class="form-control " value="<?php echo $inside_user_firstname;?>">
                            </div>
                            

                            <div class="form-group">
                              Lastname:
                            <input type="text" name='user_lastname' class="form-control" value="<?php echo $inside_user_lastname;?>">
                              </div>
                              

                              <div class="form-group">
                              Username:<input type="text" name='username' class="form-control" value="<?php echo $inside_username;?>">
                                </div>

                                <div class="form-group">
                                  <select name="user_role"id="">
 
                                   <option value='<?php echo $inside_user_role;?>'><?php echo $inside_user_role;?></option>
                                   <?php

                                   if($inside_user_role=='admin'){

                                      echo "<option value='subscriber'>subscriber</option>";

                                   }else{

                                       echo "<option value='admin'>admin</option>";
                                   }

                                    ?>
                                  </select>
                              </div>

                                 <div class="form-group">
                              Email:<input type="email" name='user_email' class="form-control" value=" <?php echo $inside_user_email;?>">
                                </div>

                                    <div class="form-group">
                                  Password:<input type="password" name='user_password' class="form-control" value=" <?php echo $inside_user_password;?>">
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
