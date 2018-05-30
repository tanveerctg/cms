<?php include 'includes/db.php';?>

<?php session_start();?>

<?php 


if(isset($_POST['login'])){

	$name=$_POST['name'];
	$password=$_POST['password'];

	$query="SELECT * FROM users WHERE username='$name'";
  $query_posts_run=mysqli_query($connection,$query);

      while($row=mysqli_fetch_assoc($query_posts_run)){
       $user_id=$row['user_id'];
       $username=$row['username'];
       $user_password=$row['user_password'];
       $user_role=$row['user_role'];
   }

   		if($name==$username&&$password==$user_password){

   			
   			$_SESSION['username']=$username;
   			$_SESSION['user_id']=$user_id;
   			$_SESSION['user_password']=$user_password;
   			$_SESSION['user_role']=$user_role;
   			header("Location:admin");

   		}else{
   			header("Location:index.php");
   		}

}

?>