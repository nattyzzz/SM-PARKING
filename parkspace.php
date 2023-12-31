<?php
//include auth.php file on all secure pages


include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>BOOK PARKING LOT</title>
<link rel="icon" href="sm.png">
<link rel="stylesheet" href="styleindex.css"/>
</head>
<body>
<div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
</div>
    <form class="form">
        <div class="row">
            <div class="leftcolumn">
                <div class="menu" style="overflow: auto;">
                <img src="sm.png" alt="smlogo" style="height: 210px;width: 210px; margin-left: 40px;">
                <a class="a" href="home.php">ADMIN</a>    
                <a class="a" href="slot.php">SLOT</a>
                    <a class="a" href="reserved.php" style="background-color: #0161e7; color:white;">RESERVED</a>
                    <a class="a" href="mainhome.php">EXIT</a>
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
    <div class="rightcolumn">
      <h3 style="color: white;text-shadow: 4px 4px 5px #000000;">BOOK PARKING LOT</h3>
      <link href="Source/datepicker_bootstrap/datepicker_bootstrap.css" rel="stylesheet">
	<script>

	window.addEvent('domready', function(){
		new Picker.Date($$('----'), {
			timePicker: true,
			positionOffset: {x: 5, y: 0},
			pickerClass: 'datepicker_bootstrap',
			useFadeInOut: !Browser.ie
		});
	});

	</script>
</head>
<body>
	<section id="container">
	<?php
			include('inc/header.php');
						
	?>
	
	<section id="content">
	<img src="src/bg.png" style="position:absolute; z-index:-1; margin:0;"/>
	<form class="box login" action="process-book-2.php" method="post">
	<fieldset class="boxBody">
	<label><strong>Parking Details</strong></label>
	<hr />
	   <label>Recommended Region For You - as per your vehicles body size</label>
	   <select name="street" class="cjComboBox" >
			<option value="CITY HALL">CITY HALL - Cars Only</option>
			
			
		</select>
		
		<select name="plot" class="cjComboBox" >
			<option value="PL 001">PL 001</option>
			<option value="PL 002">PL 002</option>
			<option value="PL 003">PL 003</option>
			<option value="PL 004">PL 004</option>
			<option value="PL 005">PL 005</option>
			<option value="PL 006">PL 006</option>
			<option value="PL 007">PL 007</option>
			<option value="PL 008">PL 008</option>
			<option value="PL 009">PL 009</option>
			<option value="PL 010">PL 010</option>
			<option value="PL 011">PL 011</option>
			<option value="PL 012">PL 012</option>
		</select>
		
	<label>Plate Number</label>
	  <input type="text" tabindex="3" name="plateno" placeholder="eg. KAC 123" required>
	  
	<label><strong>Payment Information</strong></label>
	<hr />
	<label>Enter M-pesa Confirmation Number:</label>
	<input type="text" name="account" placeholder="Card Number" required title="Credit card number" maxlength="14"/> 
	 
	   <label>Note: Parking Fees: Ksh. 120/-</label>
	</fieldset>
	<footer>
	  <input type="submit" class="btnLogin" value="Proceed to Date & Time" tabindex="4">
	</footer>
</form>
	
	</section>
	<?php
			include('inc/footer.php');
	?>
	</section>

     
        

    </div>



</body>
</html>