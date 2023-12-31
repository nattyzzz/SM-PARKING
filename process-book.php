Balubal Art John Zelle
<?php
	require('inc\connect.php');
	session_start();
     $name = $_SESSION["name"];
	 $car = $_SESSION["car"];
	  $type = $_SESSION["type"];
	  $status="RESERVED";
	  $platenum = $_SESSION["platenum"];
	  $slot = $_SESSION["slot"];
	  $amount = $_SESSION["amount"];
	  $street = $_SESSION["street"];
	    
		    $charge = "120";
			 
			
			/*CHECK IF RESERVED */
			
$sql="SELECT * FROM parkdb WHERE street='$street' and slot='$slot' and status='RESERVED'";
$result=mysqli_query($con, $sql);


// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If

if($count==1){
 header('location:error-book.php');
}
else
{

        $query = "INSERT INTO parkdb (status, name, car, type, slot, platenum, amount, trn_date, submittedby) VALUES ('$status', '$name', '$car', '$type' , '$street', '$slot', '$platenum', '$amount','$trn_date','$submittedby')";
        $result = mysqli_query($con, $query);
		
		$var = $_SESSION["from"];
$date = str_replace('/', '.', $var);
echo date('Y.m.d', strtotime($date));
		if($result){
           //REDIRECT
		   header('location:success.php');
		   
exit;
        }
}
    ?>