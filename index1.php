<?php
require('includes/db.php');
require 'config.php';
include("auth.php");  

if(!isset($user_id)){
  header('location:login.php');
};

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Parking System</title>
<link rel="stylesheet" href="styleindex.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="icon" href="images/sm.png">
</head>
<style media="screen">
  
  .update{
    text-decoration: none;
    color: white;
    height:80px;
    width: 190px;
    border-radius: 15px;
    background-color: #86B049;
    padding: 20px;
    padding-bottom: 20px;
    margin: 10px;
    margin-left:230px;
} 
.update:hover {
    color: white;
    background-color: #476930;
    border-radius: 25px;
}
.updateuser{
    text-decoration: none;
    color: white;
    height:80px;
    width: 190px;
    border-radius: 15px;
    background-color: #ff6666;
    padding: 20px;
    padding-bottom: 20px;
    margin: 10px;
    margin-left:230px;
} 
.updateuser:hover {
    color: white;
    background-color: #ff3333;
    border-radius: 25px;
}
</style>
<body>
<div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
</div>
    <form class="form">
        <div class="row">
            <div class="leftcolumn">
                <div class="menu" style="overflow: auto;">
                <img class="sm" src="sm.png" alt="smlogo" style="height: 120px;width: 120px; margin-left: 80px; margin-top: 45px; margin-bottom: 30px;">
                <a class="a" href="index.php">Admin</a>    
                <a class="a" href="mainslot.php">Slot</a>
                    <a class="a" href="mainoccupied.php">View Reserved</a>
                    <a class="a" href="mainhome.php">Exit</a>
                </div>
                <!--CLOCK-->
    <button class="glow">
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
    
    <div class="rightcolumn" style="margin-top:14px; ">
    <h2 style="padding-left:700px;color: white;text-shadow: 4px 4px 5px #000000;">ADMIN PROFILE</h2>
    <!--<img src="flower.gif" style="position:absolute;">-->
    
        <p><a class="update" href="passupdate.php">Change Password</a></p><br>
    </div>

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
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
   </div>

</div>

</body>
</html>

