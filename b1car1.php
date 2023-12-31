<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

$status = "";
if(isset($_POST['submit'])){
  $trn_date = date("Y-m-d H:i:s");
  $slot = $_REQUEST['slot'];
  $car = $_REQUEST['car'];
  $type = $_REQUEST['type'];
  $platenum = $_REQUEST['platenum'];
  $status = $_REQUEST['status'];
  $name = $_REQUEST['name'];
  $amount = $_REQUEST['amount'];


 $insert = mysqli_query($conn, "INSERT INTO `parkdb`(trn_date, slot, car, type, platenum, status, name, amount) VALUES('$trn_date', '$slot', '$car', '$type', '$platenum', '$status', '$name', '$amount')") or die('query failed');
  $status = "Reserved. <a href='b1slot.php'>View</a>";
 
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>BOOKING </title>
<link rel="icon" href="sm.png">
<link rel="stylesheet" href="styleindex.css"/>
</head>
<style>
  body {
      overflow: hidden;
    }
    .back{
    text-decoration: none;
    color: white;
    border-radius: 5px;
    background-color: #86B049;
    padding: 5px;
    margin: 10px;
    font-size:20px;
    font-weight: 20px;
    border: none;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
} 
.back:hover {
    color: white;
    background-color: #476930;
    border-radius: 10px;
}
.savebtn{
    text-decoration: none;
    background-color: #1994be;
    margin: 400px;
    padding: 10px;
    border-radius: 10px;
    display: block;
    color:var(--white);
    margin-top: 18px;
    margin-bottom: 20px;
    
  }
  .savebtn:hover{
    text-decoration: none;
    background-color: #0161e7;
    margin: 400px;
    padding: 10px;
    color: white;
    display: block;
    margin-top: 18px;
    margin-bottom: 20px;
  }
</style>
<body>
<div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
</div>
    <div class="form">
        <div class="row">
            <div class="leftcolumn" style="border-radius:8px;">
                <div class="menu" style="overflow: auto;">
                <img class="sm" src="sm.png" alt="smlogo" style="height: 120px;width: 120px; margin-left: 80px; margin-top: 45px; margin-bottom: 30px;">
                <a class="a" href="home.php">ADMIN</a>    
                <a class="a" href="b1car1.php" style="background-color: #0161e7; color:white;">BOOK</a>
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
        
    <div class="rightcolumn" style="margin-top:14px; border-radius:12px;">
    <form name="form" method="post" action="" class="carf" >
    <h2 style="padding-left:700px; margin-left:190px; color: white; text-shadow: 4px 4px 5px #000000;">BOOK</h2>
        <fieldset>
          <legend style="color:blue; font-weight:bolder;">BOOKING FORM</legend>
            <input type="hidden" name="new" value="1" />
            <p class="flip-card__form"  style="color:#FF0000;"><?php echo $status; ?></p> 
            <br>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Slot #"  type="text" name="slot"  id="slot" required/>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Car"  type="text" name="car"  id="car" required/>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Type of Car"  type="text" name="type"  id="type" required/><br>
            <br>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Plate Number"  type="text" name="platenum"  id="platenum" required/>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Status"  type="text" name="status"  id="status" required/>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Name"  type="text" name="name"  id="name" required/><br>
            <br>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Amount"  type="text" name="amount"  id="amount" required/><br>
            <input class="savebtn" style="font-size: 20px;   color:white;cursor:pointer;"  name="submit" type="submit" value="Save">   
        </fieldset>  
        </form>
    </div>
</body>
</html>

