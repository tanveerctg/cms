
  <!-- dbconnection -->

<?php include 'includes/db.php';?>

    <!-- header -->

<?php include 'includes/header.php';?>

    <!-- Navigation -->

<?php include "includes/navbar.php";?>

            <?php

                
                if(isset($_GET['page'])){

                $page=$_GET['page'];

                }else{

                    $page="";

                }
                if($page==""||$page==1){
                   $page1=0;
                 }else{
                $page1=$page*5-5;
                 }
            

            ?>

            

            <?php

                $query_for_pager="SELECT * FROM posts WHERE Status='published'";
                $query_for_pager_run=mysqli_query($connection, $query_for_pager);
                $count=mysqli_num_rows($query_for_pager_run);
                $count=ceil($count/5);

            ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
          

            <!-- Blog Entries Column -->

            <div class="col-md-8">

             
                <?php
                        $query="SELECT * FROM posts WHERE Status='published' LIMIT $page1,5 ";
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
                            by <a href="authorRelatedposts.php?post_author=<?php echo $post_author;?>"><?php echo $post_author;?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                        <hr>
                        <a href="images/<?php echo $post_image;?>" >  <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">  </a>
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

        
         <ul class="pager">
         
        <?php
            for($i=1;$i<=$count;$i++){

            if($i==$page){
               echo "<li><a href='index.php?page={$i}' style='background-color:#f4511e;color: #ffffff;' >$i</a></li>";
           }else{
                echo "<li><a href='index.php?page={$i}'>$i</a></li>";
           }


       }
        ?>
           
         </ul>
        <!-- Footer -->

<?php include 'includes/footer.php';?>
