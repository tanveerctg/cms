
<form action="" method="post">

    <div class="form-group">
      <?php
          $msg1='';
          if(isset($_POST['submit'])){

          $cat_title=$_POST['cat_title'];

          if(empty($cat_title)){

            $msg1= "This field should not be empty";
          }else{

            $cat_title=$_POST['cat_title'];
            $query="INSERT INTO Catagories(cat_title)";
            $query.="VALUE('{$cat_title}')";
            $new_category_run=mysqli_query($connection,$query);

          }


      }



      ?>
      <br>

       <label>Add Categories</label>
       <input type="text"class="form-control "name="cat_title"></br>
       <input type="submit"class="btn btn-primary" name="submit"value="Add Category">
    </div>
</form>

<?php if($msg1!=''): ?>
<div class="alert alert-danger">
<?php echo $msg1 ;?>
</div>
<?php endif;?>
