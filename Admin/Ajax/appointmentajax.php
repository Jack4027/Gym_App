<?php
include("../../conn.php");

if ($_POST['remove']==0) {
    $rowId = $conn->real_escape_string($_POST['ID']);
    $date = $conn->real_escape_string($_POST['date']);
  
    $title = $conn->real_escape_string($_POST['title']);
    $descript = $conn->real_escape_string($_POST['descript']);


    $query2 = "UPDATE Gymifi_Coaches_Appointments SET Title ='$title',Description ='$descript', Date = '$date'
     WHERE ID = '$rowId' ";

    $result2 = $conn->query($query2);

    if (!$result2) {
        $conn->error;
    } else {

  echo "<p class = 'text-success'> <strong> Appointment Updated </strong> </p>";
    }
}
else if ($_POST['remove']==1) {

    $rowId = $conn->real_escape_string($_POST['ID']);

    $query2 = "DELETE FROM Gymifi_Coaches_Appointments WHERE ID = '$rowId' ";

    $result2 = $conn->query($query2);

    if (!$result2) {
        $conn->error;
    } else {
        echo "<p class = 'text-danger'> <strong> Appointment Deleted </strong> </p>";
        
  
    }
}
?>