
<?php
//Edit Category

if(isset($_GET['edit_id'])){
  $get_id=$_GET['edit_id'];
  ?>

  <form action="" method="post">

      <div class="form-group">
         <label>Edit Categories</label>
         <?php

           $edit_query="SELECT * FROM catagories WHERE cat_id='$get_id'";
           $edit_query_catagory_run=mysqli_query($connection,$edit_query);

           while($row=mysqli_fetch_assoc($edit_query_catagory_run)){
             $cat_title=$row['cat_title'];
             $cat_id=$row['cat_id'];

  ?>
          <input type="text" class="form-control"name="cat_title" value="<?php echo $cat_title; ?>" ></br>
          <input type="submit"class="btn btn-primary" name="update"value="Edit Category">

       <?php }?>

      </div>


  </form>
<?php }?>

</div>


<?php
if(isset($_POST['update'])){
  $cat_title=$_POST['cat_title'];
  $query="UPDATE catagories SET cat_title='$cat_title'WHERE cat_id='$get_id'";
  $query_run=mysqli_query($connection,$query);

   }

  ?>
