<?php

ini_set('display_errors', '1'); 
error_reporting(E_ALL); 
// $username;

// $authorid = isset($_POST['authorid']) ? $_POST['authorid'] : "";
// $shootid = isset($_POST['shootid']) ? $_POST['shootid'] : "";
// $filename = isset($_POST['filename']) ? $_POST['filename'] : "";
// echo "Fed into write-gallery  ",$authorid," ",$shootid," ",$filename,"<br>";

// uncomment these next 3 lines for testing writing to your gallery
require('db.inc.php');

$project_active= "1";
$userEmail = "kayexmao@gmail.com";

$type = "1";
$scope = "4";
$projectTitle = "documentary";
$description = "project 2 for mark class";

$phaseTitle = "Sketching";

//estimate time
$actualTime = "1";
$startTime = "0:00:00";
$endTime = "5:00:00";

//actual time
$actualTime2 = "0";
$startTime2 = "0:00:00";
$endTime2 = "5:00:00";


$db = ConnectToDB();
//put the variables ito the myphotos table, remember that the id is autoincrement, the first parameter below is empty but the quotes have to be there as a placeholder
try {
    // First of all, let's begin a transaction
    $db->begin_transaction();

    // A set of queries; if one fails, an exception should be thrown
    $db->query('INSERT INTO project (project_active, user_email, type_id, scope_id, project_title, description)
			VALUES($project_active, $userEmail, $type,$scope,$projectTitle,$description);');
    $db->query('INSERT INTO phase_titles (phase_title) 
			VALUES($phaseTitle);');
    $db->query('INSERT INTO time_entry (actual_time, start_time, end_time) 
			VALUES($actualTime,$startTime,$endTime),($actualTime2,$startTime2,$endTime2);');

    // If we arrive here, it means that no exception was thrown
    // i.e. no query has failed, and we can commit the transaction
     echo "New record created successfully";
    $db->commit();
} catch (Exception $e) {
    // An exception has been thrown
    // We must rollback the transaction
    $db->rollback();
}

mysqli_close($db);
		
// this query gets all row from the database and then loops to the last one and displays it, to verify the write		
// $query = 'select * from project'; 
// $result = mysql_query($query) or die('Query failed:' . mysql_error() );

// 		if ($result) {
// 		$i=0;
// 		while ($row = mysql_fetch_array($result)) {
// 			$i++;
// 			$id=$row['project_id'];
// 			$authorid=$row['project_active'];
// 			$shootid=$row['user_email'];
// 			$filename=$row['project_title'];
			
// 			echo $id,$authorid,$shootid,$filename;
// 			echo "<br>";
// 		}
// 	} else {
// 		$error = "Sorry could not access db";
// 	}
	
?>
