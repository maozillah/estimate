<?php // protectedpage.inc.php
// This page MUST be included by ALL protected pages.
// Otherwise you won't check the session to make sure they
// are authorized.

// You must "start" the session before you can use it.
session_start();


// Verify they are validated users:
if (! $_SESSION["isLoggedIn"] == true)
{
    // Not a valid user, kick them out!
    header("Location: ../login.php");
}

// Check to see if they want to logout:
if (isset($_GET['logout']))
{
    // End the session and send them back to the login screen:
    session_unset();
    session_destroy();
    header("Location: ../login.php");
}

//If we didn't just log them out, they must be valid users. 
// Increment the page counter:
$_SESSION["pageCount"] += 1;


function GetUserName()
{
    return ($_SESSION["userName"]);
}

function GetPageCount()
{
    return ($_SESSION["pageCount"]);
}
?>
