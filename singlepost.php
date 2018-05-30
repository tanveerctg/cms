<?php include 'includes/db.php';?>

    <!-- header -->

<?php include 'includes/header.php';?>

    <!-- Navigation -->

<?php include "includes/navbar.php";?>

        <?php
        @$post_id=$_GET['post_id'];
        $query="SELECT * FROM posts where post_id='$post_id'";

        $query_run=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($query_run)){

                $post_title=$row['post_title'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image=$row['post_image'];
                $post_content=$row['post_content'];

            }
        ?>

        <div class="container">
        <div class="well col-md-8">

                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" style='height:300px;'alt="">
                <hr>
                <p><?php echo $post_content;?></p>


                <hr>

</div>
<?php include 'includes/sidebar.php';?>
</div>
<!-- First Blog Post -->



<?php include 'includes/footer.php';?>
