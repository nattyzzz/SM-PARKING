<?php
//include auth.php file on all secure pages
include("auth.php");
require('includes/db.php')
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Parking System</title>
<link rel="icon" href="sm.png">
<link rel="stylesheet" href="styleindex.css"/>
</head>
<body>
<div class="header">
        <h1>SM CAR WASH SYSTEM</h1>
</div>
    <form class="form">
        <div class="row">
            <div class="leftcolumn">
                <div class="menu" style="overflow: auto;">
                <img src="sm.png" alt="smlogo" style="height: 210px;width: 210px; margin-left: 40px;">
                <a class="a" href="index.php">Admin</a>    
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
    </form>
    <form class="rightcolumn">
    <a href="javascript:history.back()">Back</a>
            <h3 style="color: white;text-shadow: 4px 4px 5px #000000">Reserved for Parked With Car Wash</h3>
        <table width="100%" border="5" style="border-collapse:collapse;">
        <thead>
        <tr>
        <th><strong>Car No.</strong></th>
        <th><strong>Plate Number</strong></th>
        <th><strong>Name</strong></th>
        <th><strong>View</strong></th>
        <th><strong>Remove</strong></th>
        </tr>
        </thead>
        <body>
        <?php
        $count=1;
        $sel_query="Select * from b2db ORDER BY id desc;";
        $result = mysqli_query($con,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { ?>
        <td align="center"><?php echo $row["car"]; ?></td>
        <td align="center"><?php echo $row["platenum"]; ?></td>
        <td align="center"><?php echo $row["name"]; ?></td>
        <td align="center">
        <a href="b2slot.php? <span></span>id=<?php echo $row["id"]; ?>">View</a>
        </td>
        <td align="center">
        <a href="remove.php?id=<?php echo $row["id"]; ?>">Remove</a>
        </td>
        </tr>
        <?php $count++; } ?>
        </tbody>
        </table>
        </div>

    </form>
</div>


</body>
</html>