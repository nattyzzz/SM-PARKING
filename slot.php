<?php 
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SLOT</title>
<link rel="icon" href="images/sm.png">
<link rel="stylesheet" href="styleindex.css"/>
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
    <form class="form">
        <div class="row">
            <div class="leftcolumn" style="border-radius:8px;">
                <div class="menu" style="overflow: auto;">
                <img class="sm" src="sm.png" alt="smlogo" style="height: 120px;width: 120px; margin-left: 80px; margin-top: 45px; margin-bottom: 30px;">
                <a class="a tab tab-default" href="home.php">ADMIN</a>    
                <a class="a tab tab-default" href="b1car1.php" style="background-color: #0161e7; color:white;">BOOK</a>
                    <a class="a tab tab-default" href="reserved.php">RESERVED</a>
                    <a class="a tab tab-default" href="mainhome.php">EXIT</a>
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
    <h2 style="padding-left:900px;color: white;text-shadow: 4px 4px 5px #000000;">SLOT</h2>
        <h3 style="padding-left:80px;">Park Only</h3>
        <a href="b1car1.php"><img class="img" src="images/car-park.png"></a>
        <hr>
        <h3 style="padding-left:30px;">Park With Car Wash</h3>
        <a href="b2slot.php"><img class="img" src="images/car-wash.png"></a>
          </div>
          <script>
    document.addEventListener('DOMContentLoaded', function () {
        var tabs = document.querySelectorAll('.tab');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                // Remove highlighted class from all tabs
                tabs.forEach(function (t) {
                    t.classList.remove('tab-highlight');
                });

                // Add highlighted class to the clicked tab
                this.classList.add('tab-highlight');
            });
        });
    });
</script>
</div>


</body>
</html>