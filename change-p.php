<?php
include 'config.php'; 
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    require("includes/db.php");

if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: passwordupdate.php?error=Old Password is required.");
	  exit();
    }else if(empty($np)){
      header("Location: passwordupdate.php?error=New Password is required.");
	  exit();
    }else if($np !== $c_np){
      header("Location: passwordupdate.php?error=The confirmation password  does not match.");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $username = $_SESSION['username'];

        
        $query= "SELECT password FROM users WHERE username='$username' AND password='$op'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
        	
        	$query = "UPDATE users SET password='$np' WHERE username='$username'";
        	mysqli_query($con, $query);
        	header("Location: passwordupdate.php?success=Your password has been changed successfully.");
	        exit();

        }else {
        	header("Location: passwordupdate.php?error=Incorrect password.");
	        exit();
        }

    }

    
}else{
	header("Location: passwordupdate.php");
	exit();
}

}else{
     header("Location: passwordupdate.php");
     exit();
}
?>