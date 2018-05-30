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
                        if(isset($_GET['submit'])){

                          $search=$_GET['search'];
                          $query="SELECT * FROM posts WHERE post_tag LIKE '$search%'";
                          $query_run=mysqli_query($connection,$query);
                          $count =mysqli_num_rows($query_run);
                          if(!$query_run){
                            die("Query failed".mysqli_error($connection));
                          }

                          if($count==0){
                             echo "no result found";
                          }else{

                            while($row=mysqli_fetch_assoc($query_run)){
                            $post_title=$row['post_title'];
                            $post_author=$row['post_author'];
                            $post_date=$row['post_date'];
                            $post_image=$row['post_image'];
                            $post_content=$row['post_content'];
                      ?>
                            <h2>
                                <a href="#"><?php echo $post_title;?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author;?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                            <hr>
                            <p><?php echo $post_content;?></p>
                            <a class="btn btn-primary" href="singlepost.php?name=<?php echo $post_title;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>

                  <?php }

                          }

                        }?>




                <!-- First Blog Post -->




            </div>

            <!-- Blog Sidebar Widgets Column -->
       <?php include 'includes/sidebar.php';?>

        </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

<?php include 'includes/footer.php';?>
