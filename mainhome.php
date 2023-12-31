
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SM PARKING LOT SYSTEM</title>
<link href="C:\Users\USER\Desktop\Parking\bootstrap\css\bootstrap-grid.min.css">
<link rel="icon" href="images/sm.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<style>
* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif; 
}

.header{
  padding-bottom: 20px;
  text-align: center;
  color:white;
  background-color: black;
  padding:3%;
}
.formincorrect{
  height: 400px;

}
.form {
  --input-focus: #2d8cf0;
  --font-color: #323232;
  --font-color-sub: #666;
  --bg-color: #fff;
  --main-color: #323232;
  padding: 32px;
  background: lightgrey;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 20px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  box-shadow: 4px 4px var(--main-color);
}
.wrapper {
  --input-focus: #2d8cf0;
  --font-color: #323232;
  --font-color-sub: #666;
  --bg-color: #fff;
  --bg-color-alt: #666;
  --main-color: #323232;
    /* display: flex; */
    /* flex-direction: column; */
    /* align-items: center; */
}


/* card */ 
/*FORM AS WHOLE sa with postion ng form inside*/
.flip-card__inner {
  width: 350px; 
  height: 900px;
  position: relative;
  background-color: transparent;
  perspective: 1000px;
    /* width: 100%;
    height: 100%; */
  text-align: center;
  transition: transform 0.9s;
  transform-style: preserve-3d;
}

.glow {
        background-color: lightgrey;
        font-size: 25px;
        text-align: center;
        animation: glow 4s ease-in-out infinite alternate;
        margin-left: 0px;
        text-align: center;
        margin-top: 50px;
        padding-top: 20px;
        font-weight: 700;
        color: blue;
        align-items: center;
        border: 2px;
      }
      
    @keyframes glow {
        from {
          text-shadow: 0 0 10px lightgrey, 0 0 20px lightgrey, 0 0 30px rgb(45, 57, 225) 0 0 40px rgb(45, 63, 225), 0 0 50px rgb(50, 74, 228), 0 0 60px rgb(51, 45, 225), 0 0 70px rgb(45, 108, 225);
        }
        to {
          text-shadow: 0 0 20px lightgrey, 0 0 30px rgb(45, 63, 225), 0 0 40px rgb(45, 93, 225), 0 0 50px rgb(45, 75, 225), 0 0 60px rgb(63, 45, 225), 0 0 70px rgb(45, 69, 225), 0 0 80px rgb(45, 51, 225);
        }
    }

.flip-card__btn:active, .button-confirm:active {
  box-shadow: 0px 0px var(--main-color);
  transform: translate(3px, 3px);
}
.flip-card__btn {
  padding: 10px;
  text-decoration: none;
  
  width: 80px;
  height: 40px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  background-color: var(--bg-color);
  box-shadow: 4px 4px var(--main-color);
  font-size: 15px;
  font-weight: 700;
  color: var(--font-color);
  cursor: pointer;
  margin-left: 1400px;
} 
</style>
</head>
<body>
    <div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
    </div>
    <div class="form">
        <div class="smlogo">
        <img src="images/sm.png" alt="smlogo" style="height: 270px;width: 200px; padding-top:70px;">
        </div>
    
<?php
require('<includes/db.php');
session_start();
?>
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

<h5><a class="flip-card__btn" href="login.php">LOG IN</a></h5>


</div>

</body>
</html>