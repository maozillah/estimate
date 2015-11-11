<?php //login.inc.php
//This file in included in login.php, it runs when
// the login page loads.
/* Note: as mentioned before, if you continue with PHP  development you're strongly recommenced to look in to Object Oriented Programming - it can make certain things a lot easier... */
require('private/scripts/db.inc.php');

$loginError = '';

// Check to see if a login name/pass was posted to the page.
// If not it's probably the page being loaded for the first time.
if (  ( isset($_POST['txtUserName']) ) && ( isset($_POST['txtPassword']) )  )
{
    $loginError = ValidateLogin();
}    

function ValidateLogin()
{
    // Get the values posted to us:
    $sentUserName = $_POST['txtUserName'];
    $sentPassword = $_POST['txtPassword'];
    
    // user name...
    $userName = htmlspecialchars($sentUserName);
    $password = ($sentPassword);

    // global $mysqli;

    $mysqli = ConnectToDB();

    $sql="SELECT user_email FROM users WHERE user_email =? AND password =?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param('ss', $userName,$password);   
    $stmt->execute();

    $stmt->bind_result($email);
    $stmt->fetch(); 


    $stmt->close();
    $mysqli->close();

     echo $email;

   if(!empty($email))
   {
    session_start();
         $_SESSION["isLoggedIn"] = true;
         $_SESSION["userName"] = $userName;
         $_SESSION["pageCount"] = 0; 
         header("Location: private/index.php");
   }
 else
    {
  return ('That is an invalid login name or password.');
    }
}

?>
