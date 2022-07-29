<?php
    session_start();
    $wmessage = '['.date("m/d/y h:iA").']Welcome to Money Button Game, risk taker! All you need to do is to push buttons to try your luck. You have free 10 chances with initial money 500. Choose wisely and good luck!'; 
    if (!isset($_SESSION['betreturn']))
    {
        $_SESSION['betreturn'] = 0;
    }
    if (!isset($_SESSION['chances']))
    {
        $_SESSION['chances'] = 10;
    }
    if (!isset($_SESSION['money']))
    {
        $_SESSION['money'] = 500;
    }

    if (!isset($_SESSION['message']))
    {
        $_SESSION['message'] = [$wmessage => 'black'];     
    }
    if (isset($_SESSION['hbet']) && ($_SESSION['chances'] > 0)){
        $_SESSION['money'] = $_SESSION['money'] + $_SESSION['betreturn']; 
         $_SESSION['chances'] = $_SESSION['chances'] - 1;
        $gmessage = '['.date("m/d/y h:iA").']You have pushed '.$_SESSION['risktype'].'. Value is '.$_SESSION['betreturn'].'. Your current money now is '.$_SESSION['money'].' with '.$_SESSION['chances'].' chances left.'; 
        if ($_SESSION['betreturn'] < 0)
        {
            $_SESSION['message'] += [$gmessage => 'red'];
        }
        else
        {
            $_SESSION['message'] += [$gmessage => 'green'];
        }  
    }  
    if ($_SESSION['chances'] <= 0) 
        {
            $_SESSION['message'] += ['GAME OVER!' => 'black'];
        }
    if(isset($_POST['reset']))
    {    
        $_SESSION['chances'] = 10;
        $_SESSION['money'] = 500;
        $_SESSION['message'] = [$wmessage => 'black'];           
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Money Button Game</title>
<style type="text/css">
body *{
    font-family: Arial, Helvetica, sans-serif;    
}
div.container{
    width:980px;
    min-height: 800px;
}
div.forms{
    margin-left:180px;
    margin-top:20px;
    width:650px;
    height:150px;
}
form{
    padding-top:10px;
    width:150px;
    border:2px solid black;
    text-align: center;
    display:inline-block;
}
form.reset{
    border:none;
    text-align: left;
    margin-left:180px;
}
input.reset{
    margin-left:575px;
}
div.gamehost{
    border:solid 2px black;
    margin-left:180px;
    padding:4px;
    width: 618px;
    height: 250px;
    overflow-x: hidden;
    overflow-y: auto;
    text-align:justify;
}
</style>
</head>
<body>
<div class='container'>
    <form class="reset" action='' method='post'>
            <label for="money">Your money:<?= $_SESSION['money'] ?></label>
            <input class="reset "type="submit" name="reset" value="Reset">
            <label for="chance">Chances Left:<?= $_SESSION['chances'] ?></label>
    </form>   
    <div class='forms'>
        <form action='process.php' method='post'>
            <label for="lrisk">Low Risk</label>
            <p></p>
            <input type="submit" value="Bet">
            <input type="hidden" name="hbet" value="lrisk">
            <p>by -25 up to 100</p>
        </form> 
        <form action='process.php' method='post'>
            <label for="mrisk">Moderate Risk</label>
            <p></p>
            <input type="submit" value="Bet">
            <input type="hidden" name="hbet" value="mrisk">
            <p>by -100 up to 1000</p>
        </form> 
        <form action='process.php' method='post'>
            <label for="hrisk">High Risk</label>
            <p></p>
            <input type="submit" value="Bet">
            <input type="hidden" name="hbet" value="hrisk">
            <p>by -500 up to 2500</p>
        </form>   
        <form action='process.php' method='post'>
            <label for="srisk">Severe Risk</label>
            <p></p>
            <input type="submit" value="Bet">
            <input type="hidden" name="hbet" value="srisk">
            <p>by -3000 up to 5000</p>
        </form>                               
    </div>    
  <div class="gamehost">
<?php
    foreach(($_SESSION['message']) as $message => $txtcolor)
    { 
?>
        <p style="color:<?= str_replace('"', "",$txtcolor)?>"><?= $message?>
        </p>
<?php  }
?>
  </div>      
</div>
</body>
</html>