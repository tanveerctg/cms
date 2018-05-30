<?php include 'includes/header.php'; ?>



<?php include 'includes/navigation.php'; ?>

                      <?php
                      // DELETE Comment
                      @$get_id=$_GET['delete_id'];
                        $get_post_id_from_posts=$_GET['post_id'];

                      if(isset($get_id)){

                        $query="DELETE FROM comments WHERE comment_id='$get_id'";
                        $query_run=mysqli_query($connection,$query);
                          header("Location:post_based_comment.php?post_id=$get_post_id_from_posts");
                      }
                      ?>

                      <?php
                      // Approve Comment
                      @$get_id=$_GET['approve_id'];

                      if(isset($get_id)){

                        $query="UPDATE comments SET comment_status='Approved' WHERE comment_id='$get_id'";
                        $query_run=mysqli_query($connection,$query);
                      }
                      ?>

                      <?php
                      // Unpprove Comment
                      @$get_id=$_GET['unapprove_id'];

                      if(isset($get_id)){

                        $query="UPDATE comments SET comment_status='Unapproved' WHERE comment_id='$get_id'";
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
                          <div>
                            <table class="table table-hover table-striped table-bordered ">
                                    <thead>
                                      <tr>
                                        <th> Id</th>
                                        <th>Status</th>
                                        <th> Content</th>
                                        <th>Author</th>
                                        <th>In Response To</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th> Approve</th>
                                        <th> Unapprove</th>
                                        <th> Delete</th>
                                       
                                      </tr>
                                    </thead>
                                    <tbody>
                                            <?php

                                            $get_post_id_from_posts=$_GET['post_id'];
                                    $query="SELECT * FROM comments WHERE comment_post_id=".mysqli_real_escape_string($connection,$get_post_id_from_posts)."";
                                            $query_comments_run=mysqli_query($connection,$query);

                                            while($row=mysqli_fetch_assoc($query_comments_run)){
                                              $comment_id=$row['comment_id'];

                                              $comment_status=$row['comment_status'];
                                              $comment_content=$row['comment_content'];
                                              $comment_author=$row['comment_author'];
                                              $comment_email=$row['comment_email'];
                                              $comment_date=$row['comment_date'];
                                                
                                              $comment_post_id=$row['comment_post_id'];
                                              
                                      
                                              echo "<tr>";
                                              echo "<td> $comment_id</td>";
                                              echo "<td> $comment_status </td>";
                                              echo "<td> $comment_content </td>";
                                              echo "<td>$comment_author </td>";
                                              $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
                                              $query_post_run=mysqli_query($connection,$query);

                                              while($row=mysqli_fetch_assoc($query_post_run)){
                                              $post_id=$row['post_id'];
                                              $post_title=$row['post_title'];

                                              echo "<td><a href='../post.php?the_post_id= $post_id'>$post_title</a></td>";
                                              }

                                              echo "<td> $comment_email </td>";
                                              echo "<td>$comment_date </td>";
                                              //echo "<td>  $comment_post_id </td>";

                                         
                                            //  $query="SELECT * FROM catagories WHERE cat_id=  $post_category";
                                              //$query_catagory_run=mysqli_query($connection,$query);

                                              //while($row=mysqli_fetch_assoc($query_catagory_run)){
                                                //$cat_title=$row['cat_title'];
                                                //echo "<td> $cat_title </td>";
                                             // }

                                             
                                              echo "<td> <a href='comments.php?approve_id=$comment_id'>Approve</a></td>";
                                              echo "<td> <a href='comments.php?unapprove_id=$comment_id'>Unapprove</a> </td>";
                                              
                                              echo "<td> <a href='post_based_comment.php?delete_id=$comment_id&post_id= $get_post_id_from_posts'>Delete</a></td>";
                                              echo "</tr>";
                                            }
                            ?>
                                   </tbody>
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