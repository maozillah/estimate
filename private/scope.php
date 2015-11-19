<?php 
// require('db.inc.php');
require('scripts/protectedPage.inc.php');

$q = $_POST['get_option'];
 if(isset($_POST['get_option']))
   {
   	global $userEmail;

     $host = 'localhost';
     $user = 'user';
     $pass = '1234';
           
     mysql_connect($host, $user, $pass);

     mysql_select_db('estimate');
      

     $state = $_POST['get_option'];
     $find=mysql_query("SELECT DISTINCT scope.scope_title
    FROM project
        JOIN type
            ON type.type_id = project.type_id
        JOIN scope
            ON scope.scope_id =project.scope_id 
        WHERE user_email = '$userEmail'
        AND type_title = '$q'");

     while($row=mysql_fetch_array($find))
     {
       echo "<option>".$row['scope_title']."</option>";
     }
   
     exit;
   }

?>

