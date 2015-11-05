<?php //login.inc.php
//This file in included in login.php, it runs when
// the login page loads.
/* Note: as mentioned before, if you continue with PHP  development you're strongly recommenced to look in to Object Oriented Programming - it can make certain things a lot easier... */
require('db/db.inc.php');

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

    global $mysqli;

    // $userExists="SELECT user_email, password FROM users ORDER BY user_email;";
    $userExists="SELECT user_email FROM users WHERE user_email ='$userName' AND password ='$password'";
    $result = $mysqli->query($userExists);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "email: " . $row["user_email"]. " - password: " . $row["password"]. "<br>";
        echo "email: " . $row["user_email"]. "<br>";
    }
} else {
    echo "0 results";
}
$mysqli->close();

 //   if($userExists>0)
 //   {
 //    session_start();
 //         $_SESSION["isLoggedIn"] = true;
 //         $_SESSION["userName"] = $userName;
 //         $_SESSION["pageCount"] = 0; 
 //         header("Location: private/index.php");
 //   }
 // else
 //    {
 //  return ('That is an invalid login name or password.');
 //    }

    // $mysqli->close();


     // if ( ($userName == 'Ian') && ($password = '1234') )
     // {
     //     // Log me in. First, set/start the session:
     //     session_start();
     //     $_SESSION["isLoggedIn"] = true;
     //     $_SESSION["userName"] = $userName;
     //     $_SESSION["pageCount"] = 0; 
     //     header("Location: private/index.php");
     // } else {
     //     // Invalid login, set the error message:
     //     return ('That is an invalid login name or password.');
     // }
}
?>
