<?php include 'includes/header.php'; ?>



<?php include 'includes/navigation.php'; ?>

<?php
// DELETE Category
@$get_id=$_GET['delete_id'];

if(isset($get_id)){

  $query="DELETE FROM posts WHERE post_id='$get_id'";
  $query_run=mysqli_query($connection,$query);
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

                          
                            <form action="" method="post">

                              <?php   

                                       if(isset($_POST['checkBoxArray'])){

                                       foreach($_POST['checkBoxArray'] as $postValueId){

                                        $selectOption=$_POST['selectOption'];

                                        switch($selectOption){


                                        case 'draft':

                                        $query="UPDATE posts SET Status='{$selectOption}' WHERE post_id=$postValueId";
                                        $updated_query_to_draft=mysqli_query($connection,$query);

                                        if(!$updated_query_to_draft){

                                          echo ("Error description: " . mysqli_error($connection));
                                        }
                                        break;

                                         case 'published':

                                        $query="UPDATE posts SET Status='$selectOption' WHERE post_id=$postValueId";
                                         $updated_query_to_publish=mysqli_query($connection,$query);

                                         if(!$updated_query_to_publish){

                                          echo ("Error description: " . mysqli_error($connection));
                                        }
                                        break;


                                        case 'clone':

                                         $query="SELECT * FROM posts WHERE post_id=$postValueId";
                                         $query_posts_run=mysqli_query($connection,$query);

                                            while($row=mysqli_fetch_assoc($query_posts_run)){
                                             
                                              $title=$row['post_title'];
                                              $author=$row['post_author'];
                                              $status=$row['Status'];
                                             
                                              $image=$row['post_image'];
                                              $content=$row['post_content'];
                                              $post_category=$row['post_category'];
                                              $tag=$row['post_tag'];
                                              $post_comment_count=$row['post_comment_count'];
                                            
                                            }

                                          $clone="INSERT INTO posts(post_title,post_author,Status,post_date,post_image,post_content,post_category,post_tag,post_views,post_comment_count)";
                                          $clone.="VALUES('$title','$author','$status',now(),'$image','$content','$post_category','$tag',0,'$post_comment_count')";
                                          $clone_run=mysqli_query($connection,$clone);

                                          if(!$clone_run){

                                          echo ("Error description: " . mysqli_error($connection));
                                        }
                                        break;



                                         case 'delete':

                                         $query="DELETE FROM posts WHERE post_id=$postValueId";
                                         $query_run=mysqli_query($connection,$query);

                                         if(!$query_run){

                                          echo ("Error description: " . mysqli_error($connection));
                                        }
                                        break;

                                        }
                                     

                                         }

                                        
                                     
                                    }
                                  


                              ?>
                                 <div class="form-group">
                                  <select name="selectOption" id="" class="" >
          
                                      <option value='#'>Select Option</option>
                                      <option value='draft'>Draft</option>
                                      <option value='published'>Publish</option>
                                      <option value='delete'>Delete</option>
                                      <option value='clone'>Clone</option>
                                  
                                  </select>
                                </div>

                          <input type="submit" name='apply' value="Apply" class="btn btn-success">
                          <a href='add_post.php' class="btn btn-primary">Add New Post</a>
                           
                           <br><br>
                                <p id='a'></p>
                            <table class="table table-hover table-striped table-bordered" >
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" name="selectAllBox" class="selectAllBox"></th>
                                        <th> Id</th>
                                        <th> Title</th>
                                        <th> Post User</th>
                                        <th>Status</th>
                                        <th>date</th>
                                        <th>image</th>
                                        <th> content</th>
                                        <th> category </th>
                                        <th> comment count</th>
                                        <th> tag</th>
                                        <th> View Post</th>
                                        <th>Views</th>
                                         <th> Edit Post</th>
                                          <th> Delete Post</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                            $query="SELECT * FROM posts";
                                            $query_posts_run=mysqli_query($connection,$query);

                                            while($row=mysqli_fetch_assoc($query_posts_run)){
                                              $post_id=$row['post_id'];
                                              $post_title=$row['post_title'];
                                              $post_author=$row['post_author'];
                                              $Status=$row['Status'];
                                              $post_date=$row['post_date'];
                                              $post_image=$row['post_image'];
                                              $post_content=$row['post_content'];
                                              $post_category=$row['post_category'];
                                              $post_tag=$row['post_tag'];
                                              $post_views=$row['post_views'];

                                              $post_comment="SELECT * FROM comments WHERE comment_post_id=$post_id";
                                              $post_comment_run=mysqli_query($connection,$post_comment);
                                              $row=mysqli_num_rows( $post_comment_run);

                                              if($row==0){
                                                $post_comment_count=0;
                                              }else{

                                                $post_comment_count=$row;
                                              }

                                              echo "<tr>";
                                              ?>
                                    <td> <input type='checkbox' name='checkBoxArray[]' class='checkbox' value=<?php echo $post_id ?>> </td>

                                              <?php
                                              echo "<td> $post_id </td>";
                                              echo "<td> $post_title </td>";
                                              echo "<td> $post_author </td>";
                                              echo "<td> $Status </td>";
                                              echo "<td> $post_date </td>";
                                              echo "<td><img width='100' src='../images/$post_image'> </td>";
                                              echo "<td> $post_content </td>";


                                              $query="SELECT * FROM catagories WHERE cat_id=  $post_category";
                                              $query_catagory_run=mysqli_query($connection,$query);

                                              while($row=mysqli_fetch_assoc($query_catagory_run)){
                                                $cat_title=$row['cat_title'];
                                                echo "<td> $cat_title </td>";
                                              }

                                              echo "<td><a href='post_based_comment.php?post_id={$post_id}'> $post_comment_count </a></td>";
                                              echo "<td> $post_tag</td>";
                                              echo "<td> $post_views</td>";



                                              echo "<td> <a href='../post.php?the_post_id=$post_id'>View Post</a> </td>";
                                              echo "<td> <a href='edit_post.php?edit_id=$post_id'>Edit</a> </td>";
                                              echo "<td> <a href='posts.php?delete_id=$post_id'>Delete</a></td>";
                                              echo "</tr>";
                                            }
                            ?>
                                   </tbody>
                            </table>

                          </form>

                          </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

       
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>
