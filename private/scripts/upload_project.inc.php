<?php

ini_set('display_errors', '1'); 
error_reporting(E_ALL); 

// uncomment these next 3 lines for testing writing to your gallery
// require('db.inc.php');

$project_active= "1"; //always active

//
$phaseTitle = "Sketching";

//estimate time
$actualTime = "1";
$startTime = "0:00:00";
$endTime = "5:00:00";

//actual time
$actualTime2 = "0";
$startTime2 = "0:00:00";
$endTime2 = "5:00:00";

function insertProjects()
{
$db = ConnectToDB();
//put the variables ito the myphotos table, remember that the id is autoincrement, the first parameter below is empty but the quotes have to be there as a placeholder
try {
    // First of all, let's begin a transaction
    $db->begin_transaction();

    // A set of queries; if one fails, an exception should be thrown
   //  $db->query("INSERT INTO project (project_active, user_email, type_id, scope_id, project_title, description)
			// VALUES('$project_active', '$userEmail', '$type','$scope','$projectTitle','$description');");
    // $db->query("INSERT INTO phase_titles (phase_title) 
			 // VALUES('$phaseTitle');");
    // $db->query("INSERT INTO time_entry (actual_time, start_time, end_time) 
			 // VALUES('$actualTime','$startTime','$endTime'),('$actualTime2','$startTime2','$endTime2');");

    // If we arrive here, it means that no exception was thrown
    // i.e. no query has failed, and we can commit the transaction
    $db->commit();
    echo "New record created successfully";
} catch (Exception $e) {
    // An exception has been thrown
    // We must rollback the transaction
    $db->rollback();
}

mysqli_close($db);
}
		
?>
