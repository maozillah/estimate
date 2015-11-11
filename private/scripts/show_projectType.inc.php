<?php //gallery_show.inc.php
require('db.inc.php');
                
// This code is outside of a function, so it'll  run when the page loads:
if (isset($_GET['projectType']) )
{
    $projectType = $_GET['projectType'];   
} else {
    // use 0 to mean all images regardless of gallery
    $projectType = 0; 
}

// $ProjInfo =  LoadImageTitle($projectType);

// --- Functions ---

$sql = 'SELECT project.user_email, project.project_title, type.type_title, scope.scope_title, time_entry.start_time, time_entry.end_time, time_entry.actual_time
FROM project
  JOIN type
    ON type.type_id = project.type_id
  JOIN scope
    ON scope.scope_id =project.scope_id 
  JOIN phase
    ON project.project_id = phase.project_id
  JOIN phase_titles
    ON phase_titles.phase_title_id= phase.phase_title_id
  JOIN time_entry
    ON time_entry.phase_id = phase.phase_id
  WHERE user_email = ?;';


//can i access this variable elsewhere?
$userName = GetUserName();

$mysqli = ConnectToDB();
$stmt = $mysqli->prepare($sql);   

   $stmt->bind_param('s',$userName);

   /* execute query */
   $stmt->execute();

   /* Store the result (to get properties) */
   $stmt->store_result();

   /* Get the number of rows */
   $num_of_rows = $stmt->num_rows;

   /* Bind the result to variables */
   $stmt->bind_result($email, $projectTitle, $projectType, $scope, $startTime, $endTime, $actualTime );

    while ($stmt->fetch()) {
        echo 'ID: '.$email.'<br>';
        echo 'First Name: '.$projectTitle.'<br>';
        echo 'Last Name: '.$projectType.'<br>';
        echo 'scope: '.$scope.'<br>';
        echo 'Username: '.$startTime.'<br>';
        echo 'Last Name: '.$endTime.'<br>';
        echo 'Last Name: '.$actualTime.'<br></br>';
   }

   /* free results */
   $stmt->free_result();

   /* close statement */
   $stmt->close();

/* close connection */
$mysqli->close();


?>
