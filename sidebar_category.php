
  <!-- dbconnection -->

<?php include 'includes/db.php';?>

    <!-- header -->

<?php include 'includes/header.php';?>

    <!-- Navigation -->

<?php include "includes/navbar.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

                
                <?php
                        if(isset($_GET['category_id'])){
                          $get_cat_id=$_GET['category_id'];
                        }
                        $query="SELECT * FROM posts WHERE post_category=$get_cat_id AND Status='published'";
                        $query_catagory_run=mysqli_query($connection,$query);
                        $query_num_rows=mysqli_num_rows($query_catagory_run);
                            
                        if($query_num_rows !==0){
                            
                        while($row=mysqli_fetch_assoc($query_catagory_run)){
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                  ?>
                        <h2>
                            <a href="post.php?the_post_id=<?php echo $post_id;?>"> <?php echo $post_title;?> </a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author;?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content;?></p>
                        <a class="btn btn-primary" href="singlepost.php?id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

              <?php }}else{
                            
                           echo "<h1 style='text-align: center;'>No posts availave</h1>";
               } ?>



                <!-- First Blog Post -->


   

            </div>


            <!-- Blog Sidebar Widgets Column -->
       <?php include 'includes/sidebar.php';?>

        </div>
        <?php include 'includes/carousel.php';?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

<?php include 'includes/footer.php';?>
