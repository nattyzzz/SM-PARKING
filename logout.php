<?php
session_start();

// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
header("Location: homemain.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="icon" href="images/sm.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM PARKING LOT SYSTEM - EXIT</title>
</head>
<body>
    
</body>
</html>