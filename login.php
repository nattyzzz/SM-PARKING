<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   
   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header("location:home.php");
   }else{
      $message[] = 'Incorrect!';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link href="C:\Users\USER\Desktop\Parking\bootstrap\css\bootstrap-grid.min.css">
   <link rel="icon" href="images/sm.png">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
   <link href="index.css" rel="stylesheet" type="text/css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>LOG IN</title>
</head>
<style>
   i{
      margin-right: 9px;
      margin-left: -30px;
      cursor: pointer;
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
               <h3 class="title">Login now</h3>
               <?php
               if(isset($message)){
                  foreach($message as $message){
                     echo '<div class="message">'.$message.'</div>';
                  }
               }
               ?>
               <input type="email" name="email" placeholder="Enter Email" class="flip-card__input" required>
               <div>
               <input type="password" name="password" placeholder="Enter Password" class="flip-card__input"  id="password-input" required>
               <span id="show-password" onclick="togglePasswordVisibility()" ><i class="fas fa-eye"></i></span><br><br>
               <input type="submit" name="submit" value="Log In" class="flip-card__btn">
               <p>Don't have an account? <a href="reg.php">Register now</a></p>
               <script>
                  function togglePasswordVisibility() {
                     var passwordInput = document.getElementById("password-input");
                     var showPasswordSpan = document.getElementById("show-password");

                     if (passwordInput.type === "password") {
                     passwordInput.type = "text";
                     showPasswordSpan.innerHTML = '<i class="fas fa-eye-slash"></i>';
                     } else {
                     passwordInput.type = "password";
                     showPasswordSpan.innerHTML = '<i class="fas fa-eye"></i>';
                     }
                  }
               </script>
               </div>
            </form>
        </div>
   </div>
   </div>
   
</body>
</html>


