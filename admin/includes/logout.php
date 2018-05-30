<?php session_start();?>
<?php

			$_SESSION['username']=null;
   			$_SESSION['user_id']=null;
   			$_SESSION['user_password']=null;
   			$_SESSION['user_role']=null;
   			header("Location:http://localhost/cms/");

?>