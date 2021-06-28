<?php 
include ("../../conn.php");

if(!empty($_POST['message'])){

    $sender = $_POST['send'];
    $receiver = $_POST['rec'];
    $data = $_POST['message'];

    $add = "INSERT INTO Gymifi_Messaging_System (Client_Sender,Coach_Receiver,Message) VALUES ('$sender','$receiver','$data') ";

    $result = $conn->query($add);

    if(!$result) {
        $conn->error;
    } else {

    }
}
?>