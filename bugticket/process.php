<?php
session_start();
$_SESSION['errmessage'] =[];
$_SESSION['errctr'] = 0;
$empmessage = "Please fill out this field as it is required";
$invmessage = "Please input a valid ";

function validdate($rdate)
{
    if (ctype_digit(str_replace([" ","/","-"], '', $rdate)))                        // check if all numeric
    {
        $tempdate = str_replace([" ","-"], '/', $rdate); 
       if (strlen($tempdate) < 11)                                                  // check if valid date length
        {
            if (substr_count($tempdate,'/') == 2)
            {
                $datearray = (explode("/",str_replace([" ","-"], '/', $rdate)));    // explode to mm/dd/yyyy   
                if ((strlen($datearray[0]) == 2) && (strlen($datearray[0]) == 2))
                    {
                        if (($datearray[0] > 0 && $datearray[0] < 13))
                        {
                            if ($datearray[1] > 0 && $datearray[1] < 32)
                            {
                                if ($datearray[2] > 0 && $datearray[2] < 2023)  
                                {
                                    return true;
                                }      
                            }   
                        }
                    }

            }   
        } 
    }

}
function validemail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {   
            return true;
        }  
}

function validname($name){
    if (ctype_alpha(str_replace([" ","'"], '', $name)))
        {                 
            return true;
        }
}

$_SESSION['rdate'] = $_POST['rdate'];
$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['title'] = $_POST['title'];
$_SESSION['details'] = $_POST['details'];
if (empty($_SESSION['rdate']))
    {
        $_SESSION['errmessage'] = ['rdate' => $empmessage];
        $_SESSION['errctr'] = 1;    
    }
else
if (!validdate($_SESSION['rdate']))
    {
        $_SESSION['errmessage'] = ['rdate' => $invmessage];    
        $_SESSION['errctr'] = 1;   
    }
else
    {
        $_SESSION['errmessage'] = ['rdate' => ''];    
    }
if (empty($_SESSION['fname']))
    {
        $_SESSION['errmessage'] += ['fname' => $empmessage];
        $_SESSION['errctr'] = 1;   
    }
else
if(!validname($_SESSION['fname']))
    {
            $_SESSION['errmessage'] += ['fname' => $invmessage."first name"];  
            $_SESSION['errctr'] = 1;     
    } 
else
    {
        $_SESSION['errmessage'] += ['fname' => ''];
    }

if (empty($_SESSION['lname']))
    {
        $_SESSION['errmessage'] += ['lname' => $empmessage];
        $_SESSION['errctr'] = 1;   
    }
else
if(!validname($_SESSION['lname']))
    {
            $_SESSION['errmessage'] += ['lname' => $invmessage."last name"];    
            $_SESSION['errctr'] = 1;   
    } 
else
    {
        $_SESSION['errmessage'] += ['lname' => ''];
    }

if (empty($_SESSION['title']))
    {
        $_SESSION['errmessage'] += ['title' => $empmessage];
        $_SESSION['errctr'] = 1;   
    }
else
    {
        $_SESSION['errmessage'] += ['title' => ''];
    }    

if (empty($_SESSION['details']))
    {
        $_SESSION['errmessage'] += ['details' => $empmessage];
        $_SESSION['errctr'] = 1;   
    }
else
    {
        $_SESSION['errmessage'] += ['details' => ''];
    }    

if (empty($_SESSION['email']))
    {
        $_SESSION['errmessage'] += ['email' => $empmessage];
        $_SESSION['errctr'] = 1;   
    }
else
if(!validemail($_SESSION['email']))
    {
            $_SESSION['errmessage'] += ['email' => $invmessage."email"]; 
            $_SESSION['errctr'] = 1;      
    } 
else    
    {
        $_SESSION['errmessage'] += ['email' => ''];
    }    

header("Location: index.php");
die();

?>