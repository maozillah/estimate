<?php //gallery.inc.php
// Turn on error reporting:
ini_set('display_errors', '1');
error_reporting(E_ALL); 

// Require is like Include but throws an error if it can't find the file.
require('db.inc.php');

function GetProjecTypesList()
{
    // Gets the list of gallery's and puts them into 
    // html list options: 
    
    $mysqli = ConnectToDB(); //this function is in db.inc.php
       
    $sql = 'SELECT type_title FROM type ORDER BY type_title;' ;
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
        echo $typename;
        $html = $html . "<option value='$typeName'>$typeName</option>"; //don't add this line wrap!
    }
    $stmt->close();
    $mysqli->close();

    return ($html);
} 
?>
