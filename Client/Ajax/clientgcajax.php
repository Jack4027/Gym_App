<?php

include("../../conn.php");

if(isset($_POST['message'])) {

    $group = $_POST['group'];
    $sender = $_POST['send'];
    $message = $_POST['message'];
    $query = "INSERT INTO Gymifi_Group_Messaging (Group_ID,Client_Sender,Message) VALUES
    ('$group','$sender','$message')";

    $result = $conn->query($query);

    if(!$result) {
        $conn->error; 
    }

}

?>