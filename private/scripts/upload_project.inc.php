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
try {
    // First of all, let's begin a transaction
    $db->begin_transaction();

   //  $db->query("INSERT INTO project (project_active, user_email, type_id, scope_id, project_title, description)
			// VALUES('$project_active', '$userEmail', '$type','$scope','$projectTitle','$description');");
    // $db->query("INSERT INTO phase_titles (phase_title) 
			 // VALUES('$phaseTitle');");
    // $db->query("INSERT INTO time_entry (actual_time, start_time, end_time) 
			 // VALUES('$actualTime','$startTime','$endTime'),('$actualTime2','$startTime2','$endTime2');");

    $db->commit();
    echo "New record created successfully";
} catch (Exception $e) {
    $db->rollback();
}

mysqli_close($db);
}
		
?>
