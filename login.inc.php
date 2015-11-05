<?php //login.inc.php
//This file in included in login.php, it runs when
// the login page loads.
/* Note: as mentioned before, if you continue with PHP  development you're strongly recommenced to look in to Object Oriented Programming - it can make certain things a lot easier... */

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
    
    // Never EVER trust data sent to us, sanitize:
    // htmlspecialchars will replace things like < with &lt;
    // NOTE: There may be occasions you do not want to do that before the
    // data goes into the DB. In that case, make sure you do it
    // when the data comes out, but before it's shown on an HTML page.
    // Otherwise it's script injection time!
    
    // Caution: we are NOT removing characters that likely should not 
    // appear in a user name. E.g. ', %, (), or other punctuation, etc.
    // This could be done with Regular Expressions - but we won't worry
    // about it this semester. E.g. we don't really want < or &lt; in a
    // user name...
    $userName = htmlspecialchars($sentUserName);
    // Password we won't clean for HTML chars because we never show it.
    // We also don't need to worry about SQL injection because you would 
    // be using Parameterized Queries. (the ? in the SQL)
    $password = ($sentPassword);
    
     // This example uses a hard coded user/pass. You could connect this
     // to a DB... SELECT user_id WHERE username = ? AND password = ?
     // Then, IF $userID > 0 they should be let in.
     
     if ( ($userName == 'Ian') && ($password = '1234') )
     {
         // Log me in. First, set/start the session:
         session_start();
         $_SESSION["isLoggedIn"] = true;
         $_SESSION["userName"] = $userName;
         $_SESSION["pageCount"] = 0; 
         header("Location: private/index.php");
     } else {
         // Invalid login, set the error message:
         return ('That is an invalid login name or password.');
     }
}
?>
