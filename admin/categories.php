<?php include 'includes/header.php'; ?>


<?php include 'includes/navigation.php'; ?>



<?php
// DELETE Category
@$get_id=$_GET['delete_id'];

if(isset($get_id)){

  $query="DELETE FROM Catagories WHERE cat_id='$get_id'";
  $query_run=mysqli_query($connection,$query);
}
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
                        <div class="col-xs-6">

                            <?php include "includes/add_category.php";?>
                            <?php include "includes/edit_category.php";?>


                        <div class="col-xs-6">

                                  <?php include 'includes/category_table.php'; ?>

                        </div>

                        </div>

            <!-- /.row -->

                </div>
        <!-- /.container-fluid -->

    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>
