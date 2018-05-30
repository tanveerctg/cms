<?php ob_start();?>
<?php include 'includes/header.php'; ?>



<?php include 'includes/navigation.php'; ?>



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
                          $msg1='';
                          $msg2='';
                          if(isset($_POST['submit'])){

                          $title=$_POST['title'];
                          $author=$_POST['author'];
                          $post_category=$_POST['post_category'];
                          $status=$_POST['status'];
                          $image=$_FILES['image']['name'];

                          $temp_image=$_FILES['image']['tmp_name'];
                          $content=$_POST['content'];
                          $tag=$_POST['post_tag'];
                          $post_comment_count=$_POST['post_comment_count'];
                          move_uploaded_file($temp_image,"../images/$image");

                          
                          if(!empty($title)&&!empty( $author)&&!empty($post_category)&&!empty( $status)&&!empty($image)&&!empty($content)&&!empty($tag)){                      
                        

                          $query="INSERT INTO posts(post_title,post_author,Status,post_date,post_image,post_content,post_category,post_tag,post_views,post_comment_count)";
                          $query.="VALUES('$title','$author','$status',now(),'$image','$content','$post_category','$tag',0,'$post_comment_count')";
                          $new_post_run=mysqli_query($connection,$query);

                          $post_id=mysqli_insert_id($connection);
                          $msg1= "Post included &nbsp<a href='../post.php?the_post_id=$post_id'>View Post</a><a href='edit_post.php?edit_id=$post_id'>&nbsp Edit Post</a>";
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
                          Post Title:<input type="text" name='title'class="form-control ">
                            </div>
                            <div class="form-group">
                                    <label>Categories:</label>
                                  <select name="post_category"id="">
                                    <?php
                                    $query="SELECT * FROM catagories";
                                    $query_catagory_run=mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($query_catagory_run)){
                                      $cat_title=$row['cat_title'];
                                      $cat_id=$row['cat_id'];

                                      echo "<option value='$cat_id'>$cat_title</option>";
                                    }
                                    ?>
                                  </select>

                                  
                              </div>
                            <div class="form-group">
                               <label>User:</label>
                           
                             
                              <select name="author"id="">
                                    <?php
                                    $query="SELECT * FROM users";
                                    $query_user_run=mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($query_user_run)){
                                      $username=$row['username'];
                                      

                                      echo "<option value='$username'>$username</option>";
                                    }
                                    ?>
                                  </select>

                              </div>
                         

                              <div class="form-group">
                                 <label>Post Status:</label>
                                  <select name="status"id="">

                                    
                                    <?php echo "<option value='draft'>Draft</option>";?>
                                    <?php echo "<option value='published'>Published</option>";?>
                                    
                                    
                                  </select>
                              </div>
                                <div class="form-group">
                                <label>Post Image::</label><input type="file" name='image'>
                                  </div>
                                <div class="form-group">
                               Content:<textarea type="text" name='content' rows=9 cols=9 class="form-control"></textarea>
                                </div>

                                  <div class="form-group">
                                  Post Tags:<input type="text" name='post_tag'class="form-control">
                                    </div>
                                    <div class="form-group">
                                  <input type="hidden" name='post_comment_count'class="form-control">
                                    </div>


                            <input type="submit" name='submit'value="Submit"class="btn btn-primary">

                          </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>
