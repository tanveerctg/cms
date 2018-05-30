<?php include 'includes/header.php'; ?>



<?php include 'includes/navigation.php'; ?>

<?php
// DELETE Category
@$get_id=$_GET['delete_id'];

if(isset($get_id)){

  $query="DELETE FROM users WHERE user_id='$get_id'";
  $query_run=mysqli_query($connection,$query);
}
?>


                    <?php
                      // Approve Comment
                      @$get_id=$_GET['change_to_admin'];

                      if(isset($get_id)){

                        $query="UPDATE users SET user_role='admin' WHERE user_id='$get_id'";
                        $query_run=mysqli_query($connection,$query);
                      }
                      ?>

                      <?php
                      // Unpprove Comment
                      @$get_id=$_GET['change_to_subscriber'];

                      if(isset($get_id)){

                        $query="UPDATE users SET user_role='subscriber' WHERE user_id='$get_id'";
                        $query_run=mysqli_query($connection,$query);
                      }
                      ?>


                      <?php

                          if(isset($_POST['selectUserArray'])){

                            $selectUserArray=$_POST['selectUserArray'];
                            $selectOption=$_POST['selectOption'];

                            foreach($selectUserArray as $userid){

                           switch($selectOption){

                            case 'admin':
                            $query="UPDATE users SET user_role='{$selectOption}' WHERE user_id=$userid";
                            $updated_query_to_admin=mysqli_query($connection,$query);
                            break;

                            case 'subscriber':
                            $query="UPDATE users SET user_role='{$selectOption}' WHERE user_id=$userid";
                            $updated_query_to_subscriber=mysqli_query($connection,$query);
                            break;

                           case 'delete':
                           $query="DELETE FROM users WHERE user_id=$userid";
                           $delete_user=mysqli_query($connection,$query);
                           break;


                           }

                            }
                          }



                      ?>








        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-xs-12 ">
                        <h1 class="page-header">
                            Welcome Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                          <div> 

                            <form method="post" action="">

                              <div class="form-group">
                                  <select name="selectOption">
                                    

                                  <option value="admin">Admin</option>
                                  <option value="subscriber">Subscriber</option>   
                                  <option value="delete">Delete</option>

                                  </select>
                                </div>
                                  <input type="submit" name='apply' value="Apply" class="btn btn-success">
                                  <a href='add_users.php' class="btn btn-primary">Add New User</a>
                                   
                                  <br><br>

                            <table class="table table-hover table-striped table-bordered ">
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" name="selectAllUser"></th>
                                        <th> Id</th>
                                        <th> Username</th>
                                        <th> Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>image</th>
                                        <th> Role</th>
                                        <th> Admin</th>
                                        <th> Subscriber</th>
                                        <th>Edit</th>
                                        <th> Delete</th>
                                 
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                            <?php
                                            $query="SELECT * FROM users";
                                            $query_posts_run=mysqli_query($connection,$query);

                                            while($row=mysqli_fetch_assoc($query_posts_run)){
                                              $user_id=$row['user_id'];
                                              $username=$row['username'];
                                              $user_firstname=$row['user_firstname'];
                                              $user_lastname=$row['user_lastname'];
                                              $user_email=$row['user_email'];
                                              $user_image=$row['user_image'];
                                              $user_role=$row['user_role'];
                                              echo "<tr>";
                                        
                                        ?>
                                       <td><input type="checkbox" name="selectUserArray[]" value='<?php echo $user_id;?>' ></td>
                                              <?php
                                            

                                              echo "<td> $user_id </td>";
                                              echo "<td> $username </td>";
                                              echo "<td> $user_firstname </td>";
                                              echo "<td> $user_lastname </td>";
                                              echo "<td> $user_email </td>";
                                              echo "<td><img width='100' src='../images/$user_image'> </td>";
                                              echo "<td> $user_role </td>";
                                              echo "<td> <a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
                                              echo "<td> <a href='users.php?change_to_subscriber=$user_id'>Subscriber</a> </td>";
                                              echo "<td> <a href='edit_user.php?edit_id=$user_id'>Edit</a> </td>";
                                              echo "<td> <a href='users.php?delete_id=$user_id'>Delete</a></td>";
                                              
                                              echo "</tr>";
                                            }
                            ?>
                                   </tbody>

                                 </form>
                            </table>

                          </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>
