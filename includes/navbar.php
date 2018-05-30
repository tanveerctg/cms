<?php ob_start();?>
<?php session_start();?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Awesome Courses</a>
    </div>
    <ul class="nav navbar-nav">
      <?php
      $query="SELECT * FROM catagories";
      $query_catagory_run=mysqli_query($connection,$query);

      while($row=mysqli_fetch_assoc($query_catagory_run)){
        $cat_title=$row['cat_title'];
         $cat_id=$row['cat_id'];
          
      if(isset($_GET['category_id']) && $_GET['category_id']==$cat_id){
          
        echo "<li class='active'><a href='sidebar_category.php?category_id=$cat_id'> $cat_title </a> </li>";
      }else{
           
       
          
          echo "<li class='dropdown'><a  href='sidebar_category.php?category_id=$cat_id'> $cat_title </a></li>";
      }
      }
      ?>

      <?php

      if(isset($_SESSION['user_role'])){

          if(isset($_GET['the_post_id'])){

            $edit_id=$_GET['the_post_id'];

            echo "<li><a href='admin/edit_post.php?edit_id={$edit_id}'>Edit Post</a> </li>";
          }
        }
        ?>
    </ul>
      
      <?php
      $reg_class='';
      $pagename='';
      $pagename=basename($_SERVER['PHP_SELF']);
      if($pagename=='registration.php'){
          
          $reg_class='active';
      }
      ?>

      <ul class="nav navbar-nav navbar-right">
       

       <li class='<?php echo $reg_class; ?>' ><a href='registration.php'class="nav navbar-nav navbar-right">Registration</a> </li> 

       <li ><a href='admin'class="nav navbar-nav navbar-right"><span class="glyphicon glyphicon-user"></span>Admin </a> </li>
     </ul>
               
           
        
  </div>
</nav>
