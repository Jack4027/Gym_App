<?php
include("../../conn.php");

if (isset($_POST['date'])) {

    $date = $conn->real_escape_string($_POST['date']);
    $coach = $conn->real_escape_string($_POST['coach']);
    $title = $conn->real_escape_string($_POST['title']);
    $descript = $conn->real_escape_string($_POST['descript']);


    $query = "INSERT INTO Gymifi_Coaches_Appointments (Coach,Title,Description,Date) VALUES ('$coach','$title','$descript','$date') ";

    $result = $conn->query($query);

    if (!$result) {
        $conn->error;
    } else {

        echo "<p class= 'text-success'><strong> $title added to Calendar</strong></p> ";
  
    }
}
?>