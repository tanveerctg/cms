
  <!-- dbconnection -->

<?php include 'includes/db.php';?>

    <!-- header -->
<?php ob_start();?>
<?php include 'includes/header.php';?>

    <!-- Navigation -->

<?php include "includes/navbar.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php




                      if(isset($_GET['the_post_id'])){

                        $get_id=$_GET['the_post_id'];
                        $post_views_update="UPDATE posts SET post_views=post_views+1 WHERE post_id='$get_id' ";
                        $post_views_update_run=mysqli_query($connection, $post_views_update);

                      }


                        $query="SELECT * FROM posts WHERE post_id={$get_id}";
                        $query_post_run=mysqli_query($connection,$query);

                        if (!$query_post_run) {
                          die('Invalid query: ' .mysqli_error($connection));
                          }

                        while($row=mysqli_fetch_assoc($query_post_run)){
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                  ?>
                        <h2>
                            <a href=""><?php echo $post_title;?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author;?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content;?></p>
                     

                        <hr>

              <?php } ?>

                          <?php
                          $msg1='';
                          if(isset($_POST['submit'])){
                          $get_id=$_GET['the_post_id'];

                          $comment_author=$_POST['comment_author'];
                          $comment_email=$_POST['comment_email'];
                          $comment_content=$_POST['comment_content'];
                          
                          if(!empty($comment_author)&&!empty($comment_email)&&!empty($comment_content)){
                          $query="INSERT INTO comments(comment_status,comment_content,comment_author,comment_email,comment_date,comment_post_id)";
                          $query.="VALUES('Unapproved','$comment_content','$comment_author','$comment_email',now(),'$get_id')";
                          $new_post_run=mysqli_query($connection,$query);
                          ;

                          
                          $post_views_update="UPDATE posts SET post_views=post_views_count+1 WHERE post_id='$get_id' ";
                          $post_views_update_run=mysqli_query($connection, $post_views_update);

                          // $post_comment_count=0;
                          // $post_comment_update="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id='$get_id' ";
                          // $post_comment_update=mysqli_query($connection,$post_comment_update);

                          }else{

                            $msg1="Please fill in all fields";
                          }
                        }

                          ?>
              

                        <?php if($msg1!=''): ?>
                        <div class="alert alert-danger">
                        <?php echo $msg1 ;?>
                        </div>
                        <?php endif;?>
                        <!-- Blog Comments -->


              <!-- Comments Form -->
              <div class="well">
                  <h4>Leave a Comment:</h4>
                  <form role="form" action="" method="post">
                          <div class="form-group">
                             <label>Name:</label>
                             <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                             <input type="text" class="form-control" name="comment_author">
                             </div>
                          </div>
                          <div class="form-group">
                             <label>Email:</label>
                             <div class="input-group">
                             <input type="email" class="form-control" name="comment_email">
                             </div>
                           </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comment_content"></textarea>
                            </div>
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>

              <hr>
              <!-- Posted Comments -->

              <!-- Comment -->


              <?php 

                    $comment_query="SELECT * FROM comments WHERE comment_post_id='$get_id' AND comment_status='Approved' ";
                    $comment_query_run=mysqli_query($connection,$comment_query);

                    while($row=mysqli_fetch_assoc($comment_query_run)){ ?>


                       <div class="media">
                  <a class="pull-left" href="#">
                      <img class="media-object" src="http://placehold.it/64x64" alt="">
                  </a>
                  <div class="media-body">
                      <h4 class="media-heading"><?php echo $row['comment_author'];?>
                          <small><?php echo $row['comment_date']; ?></small>
                      </h4>
                       <?php echo $row['comment_content']; ?>
                  </div>
              </div>

              <hr>

              <?php }?>
              
        
              <br>

              <!-- Comment -->
             





                <!-- First Blog Post -->




            </div>


            <!-- Blog Sidebar Widgets Column -->
       <?php include 'includes/sidebar.php';?>


        <!-- /.row -->

        <hr>

        <!-- Footer -->

<?php include 'includes/footer.php';?>
