<?php
require('database.php');
include 'config.php';
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $trn_date = date("Y-m-d H:i:s");
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $insert = mysqli_query($conn, "INSERT INTO `users`(name, email, password,trn_date, image) VALUES('$name', '$email', '$pass', '$trn_date', '$image')") or die('query failed');
   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'Image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `users`(name, email, password,trn_date, image) VALUES('$name', '$email', '$pass', '$trn_date', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'Registration failed!';
         }
      }
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/sm.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="register.css">
    <link href="C:\Users\USER\Desktop\Parking\bootstrap\css\bootstrap-grid.min.css">
   <title>REGISTER</title>
</head>
<style>
   body {
      overflow: hidden;
    }
</style>
<body>
   
   <div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
    </div>

   <div class="form">
    <div class="smlogo">
      <img src="images/sm.png" alt="smlogo" style="height: 200px;width: 200px;"> 
    </div>
   
      <div class="wrapper">
         <div class="flip-card__inner">
            <div class="flip-card__front">
               <form class="flip-card__form" action="" method="post" enctype="multipart/form-data">
                  <h3 class="title" >Register Now</h3>
                  <?php
                  if(isset($message)){
                     foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                     }
                  }
                  ?>
                  <input type="text" name="name" placeholder="Enter Username" class="flip-card__input" required>
                  <input type="email" name="email" placeholder="Enter Email" class="flip-card__input" required>
                  <input type="password" name="password" placeholder="Enter Password" class="flip-card__input" required>
                  <input type="password" name="cpassword" placeholder="Confirm Password" class="flip-card__input" required>
                  <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                  <input type="submit" name="submit" value="Register Now" class="flip-card__btn">
                  <p>Already have an account? <a href="login.php">Log In Now</a></p>
               </form>
            </div>
         </div>
      </div>
   </div>
   
</body>
</html>