<?php
session_start();
$_SESSION['hbet'] = $_POST['hbet'];
if ($_SESSION['hbet'] == "lrisk")
{
    $_SESSION['risktype']  = "Low Risk";          
    $_SESSION['betreturn'] = rand(-25,100);    
}
else
if ($_SESSION['hbet'] == "mrisk")
{
    $_SESSION['risktype']  = "Moderate Risk";  
    $_SESSION['betreturn'] = rand(-100,1000);
}
else 
if ($_SESSION['hbet'] == "hrisk")
{
    $_SESSION['risktype']  = "High Risk";  
    $_SESSION['betreturn'] = rand(-500,2500);
}
else
if ($_SESSION['hbet'] == "srisk") 
{
    $_SESSION['risktype']  = "Severe Risk";  
    $_SESSION['betreturn'] = rand(-3000,5000);
}

header("Location: index.php");
die();

?>