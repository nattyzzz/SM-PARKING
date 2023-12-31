<?php
require('database.php');
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
};
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HOME</title>
<link rel="stylesheet" href="styleindex.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="icon" href="images/sm.png">
</head>
<style>
  body {
      overflow: hidden;
    }
  .updatebtn{
    text-decoration: none;
    background-color: #1994be;
    margin: 2px;
    padding: 10px;
    border-radius: 10px;
    display: block;
    color:var(--white);
    margin-top: 18px;
    margin-bottom: 20px;
  }
  .updatebtn:hover{
    text-decoration: none;
    background-color: #0161e7;
    margin: 2px;
    padding: 10px;
    border-radius: 15px;
    color: white;
    display: block;
    margin-top: 18px;
    margin-bottom: 20px;
  }
  .cpassbtn{
    text-decoration: none;
    background-color: #86B049;
    margin: 2px;
    padding: 10px;
    border-radius: 10px;
    
    display: block;
    color:var(--white);
  }
  .cpassbtn:hover{
    text-decoration: none;
    background-color: #476930;
    margin: 2px;
    padding: 10px;
    border-radius: 15px;
    color: white;
    display: block;
  }

  .container{
    min-height: 10vh;
    background-color: var(--light-bg);
    display: flex;
    align-items: center;
    justify-content: center;
    padding:20px;
  }

  .container .profile{
    padding:20px;
    background-color: var(--white);
    box-shadow: var(--box-shadow);
    text-align: center;
    width: 400px;
    border-radius: 5px;
  }

  .container .profile img{
    height: 200px;
    width: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 5px;
  }

  .container .profile h3{
    margin:2px 0;
    font-size: 20px;
    color:var(--black);
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
    <h2 style="padding-left:800px; color: white; text-shadow: 4px 4px 5px #000000;">ADMIN PROFILE</h2>
    
    <!--<img src="flower.gif" style="position:absolute;">-->
    <div class="container">
    <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a class="updatebtn" href="updateprof.php">Update Profile</a>
      <a class="cpassbtn" href="updatepass.php">Change Password</a>
      
    </div>
    </div>
  </div>
</body>
</html>


