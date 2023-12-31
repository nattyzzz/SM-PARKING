<?php
include 'config.php'; 
session_start();
$user_id = $_SESSION['user_id'];
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
<style>
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

.home{
} 
.home:hover {
    color: white;
    background-color: #00719c;
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
                <a class="a" href="home.php">ADMIM</a>    
                <a class="a" href="slot.php">SLOT</a>
                    <a class="a" href="reserved.php">RESERVED</a>
                    <a class="a" href="mainhome.php">EXIT</a>
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
    <a href="index.php"><img class="home" src="images/home-button.png" style="height:40px; position:absolute;"></a>
    <h2 style="padding-left:700px;color: white;text-shadow: 4px 4px 5px #000000;">UPDATE PASSWORD</h2>
<!--UPDATE PASSWORD-->

              
                  
    <form class="admin" action="change-p.php" enctype="multipart/form-data" method="post" style="padding-left:380px; color:red;font-weight:900; height:400px; border-width:20px;">  
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
       <?php } ?>
       <div style="padding-top:40px;">
        <input type="password" name="op" class="flip-card__input" placeholder="Old Password"><br><br>
        <input type="password" name="np" class="flip-card__input" placeholder="New Password"><br><br>
        <input type="password" name="c_np" class="flip-card__input" placeholder="Confirm New Password"><br><br>
        <button class="updatebtn" type="submit">Update</button><br><br>
       </div>
    </form> 
    </div>
    

</body>
</html>