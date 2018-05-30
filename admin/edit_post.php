<?php include 'includes/header.php'; ?>


<?php ob_start();?>
<?php include 'includes/navigation.php'; ?>

<?php

    $edit_id=$_GET['edit_id'];
    $query="SELECT * FROM posts WHERE post_id=$edit_id";
    $query_run=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($query_run)){
        
      $inside_id=$row['post_id'];
      $inside_title=$row['post_title'];
      $inside_author=$row['post_author'];
      $inside_post_category=$row['post_category'];
      $inside_status=$row['Status'];
      $inside_content=$row['post_content'];
      $inside_post_tag=$row['post_tag'];
      $inside_post_content=$row['post_content'];
      $inside_post_image=$row['post_image'];

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
                          $msg1='';
                          $get_id=$_GET['edit_id'];
                          if(isset($_POST['submit'])){

                          $title=$_POST['title'];
                          $author=$_POST['author'];
                          @$post_cat_id=$_POST['post_cat_id'];
                          $post_category=$_POST['post_category'];
                          $status=$_POST['status'];
                          $image=$_FILES['image']['name'];
                          $temp_image=$_FILES['image']['tmp_name'];
                          $content=$_POST['content'];
                          $tag=$_POST['post_tag'];
                          
                          move_uploaded_file($temp_image,"../images/$image");
                          if(empty($image)){

                            $query="SELECT * FROM posts WHERE post_id=$get_id";
                            $query_run=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($query_run)){

                              $image=$row['post_image'];
                            }

                          }
                          $query="UPDATE posts SET post_title='$title',post_author='$author',post_category='$post_category',Status='$status',
                          post_content='$content',post_tag='$tag',post_image='$image' WHERE post_id='$get_id'";
                          $edit_post_run=mysqli_query($connection,$query);
                          $msg1= "Post Updated &nbsp<a href='../post.php?the_post_id=$get_id'>View Post</a>";

                          }

                          ?>
                          <?php if($msg1!=''): ?>
                          <div class="alert alert-success">
                          <?php echo $msg1 ;?>
                          </div>
                          <?php endif;?>

                          <div class="form-group">
                          Post Title:<input type="text" name='title'class="form-control" value="<?php echo $inside_title;?>">
                            </div>

                            <div class="form-group">
                                  <select name="post_category"id="">
                                    <?php
                                    $previous_catagory="SELECT * FROM catagories WHERE cat_id=$inside_post_category";
                                    $previous_catagory_run=mysqli_query($connection,$previous_catagory);
                                    while($row=mysqli_fetch_assoc($previous_catagory_run)){
                                      $cat_title=$row['cat_title'];
                                      $cat_id=$row['cat_id'];

                                      echo "<option value=$cat_id>{$cat_title}</option>";
                                    }
                                    
                                      
                                    $query="SELECT * FROM catagories ";
                                    $query_catagory_run=mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($query_catagory_run)){
                                        
                                      $cat_title=$row['cat_title'];
                                      $cat_id=$row['cat_id'];
                                        if($cat_id!=$inside_post_category){
                                      echo "<option value=$cat_id>{$cat_title}</option>";
                                    }
                                    }
                                    ?>
                                  </select>
                              </div>



                             <div class="form-group">
                               <label>Post Author:</label>
                           
                             
                              <select name="author"id="">
                                   
                                    <?php echo "<option value='$inside_author'>$inside_author</option>";  ?>
                                    <?php
                                    $query="SELECT * FROM users";
                                    $query_user_run=mysqli_query($connection,$query);
                                    
                                
                                    while($row=mysqli_fetch_assoc($query_user_run)){
                                        
                                    
                                    $username=$row['username'];
                                        
                                        if($inside_author != $username ){
                                    echo "<option value='$username'>$username</option>";
                                    }
                                    }
                                    ?>
                                  </select>

                              </div>
                         



                              <div class="form-group"> 
                                  <select name="status" id=""  >


                                <option value='<?php echo $inside_status;?>'><?php echo $inside_status;?></option>;
                                <?php
                                  if($inside_status=='draft'){

                                    echo "<option value='published'>Published</option>";
                                }else{

                                  echo " <option value='draft'>draft</option>";
                              }?>
                         
                                  </select>
                                
                              </div>
                              
                                <div class="form-group">

                                <img width="100" src="../images/<?php echo $inside_post_image;?>">
                                <input type="file" name='image'>

                                  </div>
                                <div class="form-group">
                               Content:<textarea type="text" name='content' rows=9 cols=9 class="form-control"value="<?php echo $inside_content;?>">
                                 <?php echo $inside_post_content;?>
                               </textarea>
                                </div>

                                  <div class="form-group">
                                  Post Tags:<input type="text" name='post_tag'class="form-control" value="<?php  echo $inside_post_tag;?>">
                                    </div>


                            <input type="submit" name='submit'value="Update Post"class="btn btn-primary">

                          </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>
