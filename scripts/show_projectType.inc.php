<?php
 //gallery_show.inc.php
require ('db.inc.php');

if (isset($_GET['q'])) {
    $q = $_GET['q'];
} 
else {
    $q = 0;
}

// echo $q;

$userName = GetUserName();
$mysqli = ConnectToDB();

// if ($q == 0) {
//       $sql = 'SELECT project.project_title, type.type_title, scope.scope_title, time_entry.start_time, time_entry.end_time, time_entry.actual_time
//     FROM project
//       JOIN type
//         ON type.type_id = project.type_id
//       JOIN scope
//         ON scope.scope_id =project.scope_id
//       JOIN phase
//         ON project.project_id = phase.project_id
//       JOIN phase_titles
//         ON phase_titles.phase_title_id= phase.phase_title_id
//       JOIN time_entry
//         ON time_entry.phase_id = phase.phase_id
//       WHERE user_email = ?
//       ';
//       $stmt   = $mysqli->prepare($sql);
//     $stmt->bind_param('s', $userName);
//     /* execute query */
// $stmt->execute();
// } else {
$sql = 'SELECT project.project_title, type.type_title, scope.scope_title, time_entry.end_time, time_entry.actual_time
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
  WHERE user_email = ?
  AND type_title =?
  ';

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $userName, $q);

/* execute query */
$stmt->execute();

// }

/* Store the result (to get properties) */
$stmt->store_result();

/* Get the number of rows */
$num_of_rows = $stmt->num_rows;

/* Bind the result to variables */
$stmt->bind_result($projectTitle, $projectType, $scope, $endTime, $actualTime);

echo '<h2>Summary</h2>
<hr/>';


while ($stmt->fetch()) {

  if ($actualTime == '1') {
    echo '<div class="panel panel-default"> 
    <div class="panel-heading">';
    echo '<h3 class="panel-title">' . $projectTitle .'</h3> </div> <div class="panel-body">';
    echo "<p>Scope: " . $scope .'</p>';
    echo "Estimated Time: " . $endTime .'</p>';
    echo '</div></div>';

  } else {
    echo "estimate time" . $endTime;
  }

}

$stmt->free_result();

/* close statement */
$stmt->close();

/* close connection */
$mysqli->close();
?>