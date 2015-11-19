<?php

ini_set('display_errors', '1'); 
error_reporting(E_ALL); 

// require('db.inc.php');

$nameErr = $typeErr = $scopeErr = "";
$projectTitle =$type = $scope = $estTime = $actTime="";

$description = isset($_POST['projDescr']) ? test_input($_POST['projDescr']) : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['projTitle'])) {
    $nameErr = "project title is required";
  } else {
    $projectTitle = test_input($_POST["projTitle"]);
  }

  if (empty($_POST["projectType"])) {
    $typeErr = "project type is required";
  } else {
    $type = test_input($_POST["projectType"]);
  }
  if (empty($_POST["projectScope"])) {
    $scopeErr = "project scope is required";
  } else {
    $scope = test_input($_POST["projectScope"]);
  }
  if (empty($_POST["estTime"])) {
    $estTErr = "project scope is required";
  } else {
    $estTime = test_input($_POST["estTime"]);
  }
  if (empty($_POST["actTime"])) {
    $actTErr = "project scope is required";
  } else {
    $actTime = test_input($_POST["actTime"]);
  }
}  

echo "Fed into database  <br>",$projectTitle,"<br> ",$type,"<br> ",$scope,"<br>",$description,"<br>", $estTime,"<Br>",$actTime ;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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
