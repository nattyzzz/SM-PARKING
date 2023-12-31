<?php 
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['updateprof'])){


   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'Old Password Not Matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirm Password Not Matched!';
      }else{
         mysqli_query($conn, "UPDATE `users` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'Password Updated Successfully!';
      }
   }


}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="C:\Users\USER\Desktop\Parking\bootstrap\css\bootstrap-grid.min.css">
<title>UPDATE PROFILE</title>
<link rel="stylesheet" href="styleindex.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="icon" href="images/sm.png">
</head>
<style>
    body {
      overflow: hidden;
    }

   .flip-card__input {
   width: 250px;
   height: 25px;
   border-radius: 5px;
   border: 2px solid var(--main-color);
   background-color: var(--bg-color);
   box-shadow: 4px 4px var(--main-color);
   font-size: 15px;
   font-weight: 600;
   color: var(--font-color);
   padding: 15px 10px;
   outline: none;
   }

   .flip-card__input::placeholder {
   color: var(--font-color-sub);
   opacity: 0.8;
   }

   .flip-card__input:focus {
   border: 2px solid var(--input-focus);
   }

   .update{
      text-decoration: none;
      color: white;
      height:50px;
      width: 100px;
      border-radius: 15px;
      background-color: #86B049;
      padding: 10px;
      padding-bottom: 20px;
      margin: 10px;
      margin-left:70px;
      font-size:20px;
      font-weight: 20px;
      border: none;
   } 
   .update:hover {
      color: white;
      background-color: #476930;
      border-radius: 25px;
   }
   .updatebtn{
   text-decoration: none;
   background-color: #86B049;
   margin: 2px;
   padding: 10px;
   border-radius: 10px;
   display: block;
   color:var(--white);
   font-weight: 700;
   margin-left: 500px;
   }
   .btn:hover{
   text-decoration: none;
   background-color: #476930;
   margin: 2px;
   padding: 10px;
   border-radius: 15px;
   color: white;
   display: block;
   }
   .home{
      color: lightblue;
   } 
   .home:hover {
      color: white;
      border-radius: 25px;
   }
   .container{
      min-height: 100vh;
      background-color: var(--light-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      padding:20px;
   }

   .container .profile{
      padding:2px;
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      text-align: center;
      width: 400px;
      border-radius: 5px;
   }

   .container .profile img{
      height: 100px;
      width: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 5px;
   }

   .container .profile h3{
      margin:5px 0;
      font-size: 20px;
      color:var(--black);
   }

   .container .profile p{
      margin-top: 2px;
      color:var(--black);
      font-size: 20px;
   }

   .container .profile p a{
      color:var(--red);
   }

   .container .profile p a:hover{
      text-decoration: underline;
   }

   .update-profile{
      min-height: 50vh;
      background-color: var(--light-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 5px;
   }

   .update-profile form{
      padding:10px;
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      text-align: center;
      width: 900px;
      text-align: center;
      border-radius: 5px;
   }

   .update-profile form img{
      height: 150px;
      width: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 5px;
   }

   .update-profile form .flex{
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px;
      gap: 15px;
      padding-left: 270px;
   }

   .update-profile form .flex .inputBox{
      width: 50%;
   }

   .update-profile form .flex .inputBox span{
      text-align: left;
      display: block;
      margin-top: 3px;
      font-size: 17px;
      color:var(--black);
   }

   .update-profile form .flex .inputBox .box{
      width: 100%;
      border-radius: 20px;
      background-color: var(--light-bg);
      padding:8px 5px;
      font-size: 17px;
      color:var(--black);
      margin-top: 5px;
   }

   @media (max-width:650px){
      .update-profile form .flex{
         flex-wrap: wrap;
         gap:0;
      }
      .update-profile form .flex .inputBox{
         width: 100%;
      }
   }
   i{
      margin-left: 225px;
      cursor: pointer;
   }
   
</style>
<body>
<div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
</div>
    <form class="form">
        <div class="row">
            <div class="leftcolumn" style="border-radius:8px;">
                <div class="menu" style="overflow: auto;">
                <img class="sm" src="sm.png" alt="smlogo" style="height: 120px;width: 120px; margin-left: 80px; margin-top: 45px; margin-bottom: 30px;">
                <a class="a" href="home.php" style="background-color: #0161e7; color:white;">ADMIN</a>    
                <a class="a" href="b1car1.php">BOOK</a>
                    <a class="a" href="b1occupied.php">RESERVED</a>
                    <a class="a" href="mainhome.php">EXIT</a>
                </div>
                <!--CLOCK-->
    <button class="glow" style="margin-left:25px;">
        <body onload="initClock()">
            <!--digital clock start-->
            <div class="datetime">
              <div class="date">
                <span id="dayname">Day</span>,
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>
              </div>
              <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>
              </div>
            </div>
            <!--digital clock end-->
        
            <script type="text/javascript">
            function updateClock(){
              var now = new Date();
              var dname = now.getDay(),
                  mo = now.getMonth(),
                  dnum = now.getDate(),
                  yr = now.getFullYear(),
                  hou = now.getHours(),
                  min = now.getMinutes(),
                  sec = now.getSeconds(),
                  pe = "AM";
        
                  if(hou >= 12){
                    pe = "PM";
                  }
                  if(hou == 0){
                    hou = 12;
                  }
                  if(hou > 12){
                    hou = hou - 12;
                  }
        
                  Number.prototype.pad = function(digits){
                    for(var n = this.toString(); n.length < digits; n = 0 + n);
                    return n;
                  }
        
                  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                  var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                  var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
                  var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
                  for(var i = 0; i < ids.length; i++)
                  document.getElementById(ids[i]).firstChild.nodeValue = values[i];
            }
        
            function initClock(){
              updateClock();
              window.setInterval("updateClock()", 1);
            }
            </script><br>
    </button>
            </div>  
    </form>
    <div class="rightcolumn" style="margin-top:14px; border-radius:12px;">
    <a href="home.php"><img class="home" src="images/back.png" style="height:40px; position:absolute;"></a>
    <h2 style="padding-left:750px;color: white;text-shadow: 4px 4px 5px #000000;">UPDATE PASSWORD</h2>
    
<!--UPDATE PASSWORD-->
<div class="update-profile">

<?php
   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
   }
?>

<form action="" method="post" enctype="multipart/form-data">
   <?php
      if($fetch['image'] == ''){
         echo '<img src="images/default-avatar.png">';
      }else{
         echo '<img src="uploaded_img/'.$fetch['image'].'">';
      }
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
   ?>
   <div class="flex">
      

      <div style="margin-left:22px;" class="inputBox">
      <h3><?php echo $fetch['name']; ?></h3>
         <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
         <input type="password" name="update_pass" placeholder="Enter Previous Password" class="box" required >
         

         <input type="password" name="new_pass" placeholder="Enter New Password" class="box" required>
         

         <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box" required>
        
         
         
      </div>
   </div>
   <input type="submit" value="Update Profile" name="updateprof" class="updatebtn">
</form>

</div>
    </div>
    </form>

</body>
</html>

