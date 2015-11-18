<?php //gallery.inc.php
// Turn on error reporting:
ini_set('display_errors', '1');
error_reporting(E_ALL); 

// Require is like Include but throws an error if it can't find the file.
require('db.inc.php');

// $userEmail = $_SESSION["userName"];

function GetProjecTypesList()
{
    // Gets the list of gallery's and puts them into 
    // html list options: 
    global $userEmail;
    
    $mysqli = ConnectToDB(); //this function is in db.inc.php
       
    $sql = "SELECT DISTINCT type.type_title
    FROM project
        JOIN type
            ON type.type_id = project.type_id
        JOIN scope
            ON scope.scope_id =project.scope_id 
        AND user_email = '$userEmail';" ;
    $stmt = $mysqli->prepare($sql);

       //if you forget this you'll always get nothing back from the DB:
       $stmt->execute();    
       $stmt->bind_result($typeName);

    // Since we have more than one row returned loop through
    // each row making them into options:
    $html = '';
    while(  $stmt->fetch() )
    {
        // Remember the double quotes means that variable names will get turned
        //into their values for you. This is easier than concatenating multiple strings.
        $html = $html . "<option value='$typeName'>$typeName</option>"; //don't add this line wrap!
    }
    $stmt->close();
    $mysqli->close();

    return ($html);
} 

function GetScopeList()
{    

    global $userEmail;
    $mysqli = ConnectToDB(); //this function is in db.inc.php
       
    $sql = "SELECT DISTINCT scope.scope_title
    FROM project
        JOIN type
            ON type.type_id = project.type_id
        JOIN scope
            ON scope.scope_id =project.scope_id 
        AND user_email = '$userEmail'" ;

    $stmt = $mysqli->prepare($sql);

       //if you forget this you'll always get nothing back from the DB:
       $stmt->execute();    
       $stmt->bind_result($scopeTitle);

    // Since we have more than one row returned loop through
    // each row making them into options:
    $html = '';
    while(  $stmt->fetch() )
    {
        // Remember the double quotes means that variable names will get turned
        //into their values for you. This is easier than concatenating multiple strings.
        $html = $html . "<option value='$scopeTitle'>$scopeTitle</option>"; //don't add this line wrap!
    }
    $stmt->close();
    $mysqli->close();

    return ($html);
} 

?>
