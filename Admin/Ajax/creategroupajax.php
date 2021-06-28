<?php

include("../../conn.php");

if(isset($_POST['groupname'])) {

    $group = $_POST['groupname'];
    $coach = $_POST['coach'];
    
    $query = "INSERT INTO Gymifi_Group_List (Name, Coach) VALUES ('$group', '$coach') ";

    $result = $conn->query($query);

    if(!$result) {
        $conn->error;
    } 
}
?>