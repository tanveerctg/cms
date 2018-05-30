

    <!-- Blog Search Well -->
    <div class="col-md-4">


        <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="get">
        <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit" >
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
      </form>

        <!-- /.input-group -->
    </div>
     <div class="well">
        <?php
         
         if(isset($_SESSION['user_role'])){?>
             
             <h3>Logged in as <?php echo $_SESSION['username'];?> </h3>
             <a href="admin/includes/logout.php"class="btn btn-primary">log out</a>
       <?php  }else{?>
         
        
        <form action="login.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">    
        </div>

        <div class="form-group">
            <label>Password</label>
             <div class="input-group">
            <input type="text" name="password" class="form-control">
             <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" name="login" >
                    <span >log in</span>
                </button>
            </span>  
             </div>  
        </div>
      </form>
  
  <?php  }?>    <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                  <?php
                  $query="SELECT * FROM catagories";
                  $query_catagory_run=mysqli_query($connection,$query);

                  while($row=mysqli_fetch_assoc($query_catagory_run)){
                    $cat_title=$row['cat_title'];
                    $cat_id=$row['cat_id'];

                    echo "<li><a href='sidebar_category.php?category_id=$cat_id'> $cat_title </a> </li>";
                  }
                  ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>
  </div>
