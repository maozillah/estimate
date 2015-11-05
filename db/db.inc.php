<?php
//db.inc.php
/* By keeping your DB connection code in its own file you
    don't have to write it over and over... and if it changes
    you can change it in one spot to fix your whole site
*/
// function ConnectToDB()
// {

    //server, username, password, database name
    $mysqli = new mysqli('localhost', 'user', '1234', 'estimate');     
    if ($mysqli->connect_error != '') 
    {
      // Something has gone wrong, we have an error. Throw it
      // so everything stops:
      throw new Exception('Unable to connect to DB:'.$mysqli->connect_error);
    } else {
        // All is good, return the connection to be used in the
        // other scripts:
      echo "Connected successfully";
        // return ($mysqli);
    }
// }
    
?>
