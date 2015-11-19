<?php 
require('scripts/db.inc.php');
require('scripts/protectedPage.inc.php');

$q = $_POST['get_option'];


 if(isset($_POST['get_option']))
   {
    global $userEmail;
    $conn = ConnectToDB();
      
    $sql="SELECT DISTINCT scope.scope_title
    FROM project
        JOIN type
            ON type.type_id = project.type_id
        JOIN scope
            ON scope.scope_id =project.scope_id 
        WHERE user_email = '$userEmail'
        AND type_title = '$q'";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['scope_title'].'">'.$row['scope_title'].'</option>';
    }
} else {
    echo "0 results";
}
$conn->close();

   }

?>

