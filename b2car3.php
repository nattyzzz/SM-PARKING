<?php
require("includes/db.php");
include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
  $trn_date = date("Y-m-d H:i:s");
  
 
 $platenum = $_REQUEST['platenum'];
 $car = $_REQUEST['car'];
 $name = $_REQUEST['name'];
 $amount = $_REQUEST['amount'];
 $submittedby = $_SESSION["username"];

 $ins_query="insert into `b2db` (`trn_date`,`platenum`,`car`,`name`,`amount`,`submittedby`)values('$trn_date','$platenum','$car','$name','$amount','$submittedby')";
 
 mysqli_query($con,$ins_query)
 or die(mysql_error());
 $status = "Reserved. <a href='b1occupied.php'>View</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Parking System</title>
<link rel="icon" href="sm.png">
<link rel="stylesheet" href="styleindex.css"/>


</script>

</head>
<body>
<div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
</div>
    <div class="form">
        <div class="row">
            <div class="leftcolumn">
                <div class="menu" style="overflow: auto;">
                <img src="sm.png" alt="smlogo" style="height: 210px;width: 210px; margin-left: 40px;">
                    <a class="a" href="mainslot.php">Slot</a>
                    <a class="a" href="mainoccupied.php">View Reserved</a>
                    <a class="a" href="logout.php">Exit</a>
                </div>
                <!--CLOCK-->
    <button class="glow" style="text-align: center;">
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
        
    <div class="rightcolumn">
        <div class="cfloor">
        <p>Park With Car Wash ~ Car 3</p>
        <form name="form" method="post" action="" class="carf" >
        <input type="hidden" name="new" value="1" />
        
        <img class="cimg"src="images/2car-wash.png">
        <p class="flip-card__form"  style="color:#FF0000;"><?php echo $status; ?></p> 
        
          
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Car"  type="text" name="car"  id="car" required/><br>
            <br>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Plate Number"  type="text" name="platenum"  id="platenum" required/><br>
            <br>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Name"  type="text" name="name"  id="name" required/><br>
            <br>
            <input style="height: 25px;width: 300px; padding-left: 5px; padding-top: 20px; padding-bottom: 20px;font-size: 20px;border-radius: 10px;" placeholder="Amount"  type="text" name="amount"  id="amount" required/><br>
            <br>
<br>
            <input style="height: 35px;width: 200px;  20px;font-size: 20px;border-radius: 10px; background-color:blue; color:white;cursor:pointer;" class="flip-card__form" name="submit" type="submit" value="Save to database"><br> 
                  
          </form>
        </div> 
   

        
    </div>
    


</body>
</html>

