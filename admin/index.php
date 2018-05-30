

<?php include 'includes/header.php'; ?>

<?php include 'includes/navigation.php'; ?>
            
           <!--  user_online -->
            <?php
            $session=session_id();
            $time=time();
            $time_out_seconds=30;
            $time_out=$time-$time_out_seconds;

            $query_session="SELECT * FROM users_online where session_id='$session'";
            $query_session_run=mysqli_query($connection,$query_session);
            $session_rows=mysqli_num_rows($query_session_run);

            if($session_rows==NULL){
               mysqli_query($connection,"INSERT INTO users_online(session_id,somoi ) VALUES('$session','$time')");
            }else{

              mysqli_query($connection,"UPDATE users_online SET somoi='$time' WHERE session_id='$session'");
            }

            $a="SELECT * FROM users_online where somoi>$time_out";
            $b=mysqli_query($connection,$a);
            $_SESSION['user_online']=mysqli_num_rows($b);

            ?>


<?php 

$post="SELECT * FROM posts";
$post_count=mysqli_query($connection,$post);
$total_post=mysqli_num_rows($post_count);

?>



<?php 

$post="SELECT * FROM comments";
$comment_count=mysqli_query($connection,$post);
$total_comment=mysqli_num_rows($comment_count);

?>

<?php 

$user="SELECT * FROM users";
$user_count=mysqli_query($connection,$user);
$total_user=mysqli_num_rows($user_count);

?>




<?php 

$category="SELECT * FROM catagories";
$category_count=mysqli_query($connection,$category);
$total_category=mysqli_num_rows($category_count);

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

                    </div>
                </div>


                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $total_post; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $total_comment;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $total_user; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $total_category; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


            <div class="row">

                <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Count'],
                  <?php

      $name=['Active Posts','Comments','Users','Categories'];
      $info=[$total_post,$total_comment,$total_user,$total_category];


      for($i=0;$i<4;$i++){

        echo "['{$name[$i]}' " . "," . "{$info[$i]}],";
      }


      ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>



            </div>
            <div id="columnchart_material" style="width: auto; height: 500px;"></div>

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>
