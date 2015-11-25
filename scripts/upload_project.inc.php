<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

// require('db.inc.php');

$nameErr = $typeErr = $scopeErr = "";
$projectTitle = $type = $scope = $endTime = $endTime2 = "";

$description = isset($_POST['projDescr']) ? test_input($_POST['projDescr']) : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['projTitle'])) {
        $nameErr = "project title is required";
    } 
    else {
        $projectTitle = test_input($_POST["projTitle"]);
    }
    
    if (empty($_POST["projectType"])) {
        $typeErr = "project type is required";
    } 
    else {
        $type = test_input($_POST["projectType"]);
    }
    if (empty($_POST["projectScope"])) {
        $scopeErr = "project scope is required";
    } 
    else {
        $scope = test_input($_POST["projectScope"]);
    }
    
    if (empty($_POST["estTime"])) {
        $estTErr = "project scope is required";
    } 
    else {
        $endTime2 = test_input($_POST["estTime"]) . ":00";
    }
    
    if (empty($_POST["actTime"])) {
        $actTErr = "project scope is required";
    } 
    else {
        $endTime = test_input($_POST["actTime"]) . ":00";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// insert into database only if all data is present
if (isset($_POST['submit'])) {
    insertProjects();
}

// remove function to run
function insertProjects() {
    
    $project_active = "1";
    
    //estimated time
    $actualTime2 = "0";
    $startTime2 = $startTime = "0:00:00";
    
    //actual time
    $actualTime = "1";
    
    global $projectTitle, $type, $scope, $endTime, $endTime2, $userEmail, $description;
    
    $db = ConnectToDB();
    
    //get type id and scope id
    $sql = "
SELECT type_id FROM type WHERE type_title ='$type'
UNION
SELECT scope_id FROM scope WHERE scope_title='$scope';
";
    
    $projectSql = "SELECT project_id FROM project ORDER BY project_id DESC LIMIT 1;";
    
    $scope_type = array();
    
    $result = $db->query($sql);
    $result2 = $db->query($projectSql);
    
    if ($result->num_rows > 0) {
        
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $scope_type[] = $row['type_id'];
        }
    }
    
    if ($result2->num_rows > 0) {
        
        // output data of each row
        while ($row = $result2->fetch_assoc()) {
            $id = $row['project_id'];
        }
    }
    
    $projectID = $phaseID = $id + 1;
    
    if (count($scope_type) == 1) {
        $scope_type[1] = $scope_type[0];
    }
    
    if (isset($scope_type[0])) {
        $typeID = $scope_type[0];
    }
    
    if (isset($scope_type[1])) {
        $scopeID = $scope_type[1];
    }
    
    $result2->close();
    $result->close();
    
    try {
        
        $db->begin_transaction();
        
        $db->query("INSERT INTO project (project_id, project_active, user_email, type_id, scope_id, project_title, description)
VALUES('$projectID','$project_active', '$userEmail', '$typeID','$scopeID','$projectTitle','$description');");
        
        $db->query("INSERT INTO phase (phase_id, project_id, phase_title_id, phase_active)
VALUES('$projectID','$projectID','1','1')");
        
        $db->query("INSERT INTO time_entry (phase_id, actual_time, start_time, end_time)
VALUES('$phaseID','$actualTime','$startTime','$endTime'),('$phaseID','$actualTime2','$startTime2','$endTime2');");
        
        $db->commit();
        echo "New record created successfully";
    }
    catch(Exception $e) {
        $db->rollback();
    }
    
    mysqli_close($db);
}

function printDBValues() {
    global $projectTitle, $type, $scope, $description, $endTime2, $endTime;
    
    echo "Values from form  <br>", $projectTitle, "<br> ", $type, "<br> ", $scope, "<br>", $description, "<br>", $endTime2, "<Br>", $endTime;
}
?>
