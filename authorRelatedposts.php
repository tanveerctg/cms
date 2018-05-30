
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

                <h1 class="page-header">
                   
                     Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php   

                        $get_author_name=$_GET['post_author'];
                        $query="SELECT * FROM posts WHERE post_author='$get_author_name' ";
                        $query_catagory_run=mysqli_query($connection,$query);

                        while($row=mysqli_fetch_assoc($query_catagory_run)){
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                        $post_status=$row['Status'];

                      

                  ?>

                        <h2>
                            <a href="post.php?the_post_id=<?php echo $post_id;?>"> <?php echo $post_title;?> </a>
                        </h2>
                        <p class="lead">
                            by <a href="#"><?php echo $post_author;?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content;?></p>
                        <a class="btn btn-primary" href="singlepost.php?post_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

              <?php } ?>

                <?php
                $a="SELECT * FROM posts WHERE Status='published' ";
                $b=mysqli_query($connection,$a); 
                $rows=mysqli_num_rows($b);
                if(empty($rows)){
                    echo "<h1 class='text-center'>Sorry,There is no post</h1>";
                }
                ?>
       
       </div>


            <!-- Blog Sidebar Widgets Column -->
       <?php include 'includes/sidebar.php';?>

        </div>
      
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

<?php include 'includes/footer.php';?>
