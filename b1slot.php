<?php
//include auth.php file on all secure pages

require('database.php');
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
  header('location:b1occupied.php');

  $status = "Reserved. <a href='b1occupied.php'>View</a>";
};

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SLOT</title>
<link rel="icon" href="sm.png">
<link rel="stylesheet" href="styleindex.css"/>
</head>
<style>
  body {
      overflow: hidden;
    }
  
img:hover {
    animation: shake 0.5s;
    animation-iteration-count: infinite;
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

#overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    #popup {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .close-btn {
      cursor: pointer;
      font-size: 20px;
      color: #333;
      position: absolute;
      top: 10px;
      right: 10px;
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
                <a class="a" href="home.php">ADMIN</a>    
                <a class="a" href="b1car1.php">BOOK</a>
                    <a class="a" href="b1occupied.php" style="background-color: #0161e7; color:white;">RESERVED</a>
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
    <a href="b1occupied.php"><img class="home" src="images/back.png" style="height:40px; position:absolute;"></a>
    <h2 style="padding-left:700px; margin-left:43px; color: white; text-shadow: 4px 4px 5px #000000;">RESERVED PARKING</h2>
        <div class="floor">
        <?php
        $count=1;
        $sel_query="Select * from parkdb ORDER BY id asc;";
        $result = mysqli_query($conn,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { ?>
        <td align="center"><?php echo $row["platenum"]; ?></td>
        <a href="? <span></span>id=<?php echo $row["id"] && $row["name"];?>"><img src="images/parkcar.png" style="height:90px;width:100px;"></a>
        <?php $count++; } ?>
      


        

            
        </div>
<hr>
        
    </div>

    
</div>


</body>
</html>