


<table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th>Cat Id</th>
            <th>Cat Title</th>
          </tr>
        </thead>
        <tbody>
                <?php
                $query="SELECT * FROM catagories";
                $query_catagory_run=mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($query_catagory_run)){
                  $cat_title=$row['cat_title'];
                  $cat_id=$row['cat_id'];

                  echo "<tr>";
                  echo "<td> $cat_id </td>";
                  echo "<td> $cat_title </td>";
                  echo "<td> <a href='categories.php?edit_id=$cat_id'>Edit</a> </td>";
                  echo "<td> <a href='categories.php?delete_id=$cat_id'>Delete</a></td>";
                  echo "</tr>";
                }
?>
       </tbody>
</table>
