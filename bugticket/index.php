<?php
session_start();
function seterrmessage() {
    $_SESSION['errmessage'] = ['rdate' => '','fname' => '','lname' => '','email' => '','title' => '','details' => ''];    
}

function setfields() {
    $_SESSION['rdate'] = '';
    $_SESSION['fname'] = '';
    $_SESSION['lname'] = '';
    $_SESSION['email'] = '';
    $_SESSION['title'] = '';
    $_SESSION['details'] = '';

}
if (!isset($_SESSION['errmessage']))
{
    seterrmessage();        
}

if (!isset($_SESSION['rdate'],$_SESSION['fname'],$_SESSION['lname'],$_SESSION['email'],$_SESSION['title'],$_SESSION['details']))
{
    setfields();
}
if (!isset($_SESSION['errctr']))
{
    $_SESSION['errctr'] = 1;
}
if ($_SESSION['errctr'] > 0)
{
    $message = $_SESSION['errmessage'];
}
else
{
    echo '<script>alert("Thank you for your patience! Please wait a response from our IT team.")</script>';
    setfields();
    seterrmessage();  
    $message = $_SESSION['errmessage'];
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Bug Ticket</title>
<style type="text/css">
body *{
    font-family: Arial, Helvetica, sans-serif;
    font-size:15px;
}
div.container{
    border:2px solid black;
    border-radius:10px;
    padding:10px 10px;
    width:200px;
    height: 600px;
    margin: 0px auto;
}
textarea{
    resize: none;
    width:186px;
    height:150px;
}
label{
    font-size:12px;
    color:#92a8d1;
    display:block;
}
label.errmessage{
    font-size:8px;
    color:red; 
    font-weight:bold;  
    margin-bottom:5px;
    height:8px;

}
input{
    font-size:15px;
}
input.selectfile{
    width:212px;
}
input.submit{
    margin-top:20px;
    margin-left:70px;
}
</style>
</head>
<body>
<div class='container'>
    <div class='top'>
    <h1>Report An Issue</h1>

    <form  class="ticket" action="process.php" method="post">
        <label for="rdate">Date Today(mm/dd/yy)*:</label>
        <input type="text" class="rdate" name="rdate" value=<?= $_SESSION['rdate']?>>
        <label for="rdate" class="errmessage"><?= $message['rdate']?></label>  
        <label for="fname">First Name*:</label>
        <input type="text" class="fname" name="fname" value=<?= $_SESSION['fname']?>>
        <label for="fname" class="errmessage"><?= $message['fname']?></label>  
        <label for="fname">Last Name*:</label>
        <input type="text" class="lname" name="lname" value=<?= $_SESSION['lname']?>>
        <label for="lname" class="errmessage"><?= $message['lname']?></label>
        <label for="email">Email*:</label>
        <input type="text" class="email" name="email" value=<?= $_SESSION['email']?>> 
        <label for="email" class="errmessage"><?= $message['email']?></label>
        <label for="title">Issue Title*:</label>
        <input type="text" class="title" name="title" value=<?= $_SESSION['title']?>>
        <label for="title" class="errmessage"><?= $message['title']?></label>   
        <label for="details">Issue Details*:</label>
        <textarea id="details" name="details"><?= $_SESSION['details']?></textarea> 
        <label for="details" class="errmessage"><?= $message['details']?></label>
        <label class="selectfile" for="screenshot">Screenshot:</label>
        <input type="file" class="selectfile" id="screenshot" name="screenshot" accept="image/*">
        <input type="submit" class=submit value="Submit">    
    </form>
 
    </div>
</div>
</body>
</html>