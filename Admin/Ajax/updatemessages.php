<?php 

    include("../../conn.php");

if($_POST['type']==0) {

    if(!empty($_POST['message'])){

        $sender = $_POST['send'];
        $receiver = $_POST['rec'];
        $data = $_POST['message'];

        $add = "INSERT INTO Gymifi_Messaging_System (Coach_Sender,Client_Receiver,Message) VALUES ('$sender','$receiver','$data') ";

        $result = $conn->query($add);

        if(!$result) {
            $conn->error;
        } else {

        }
    }
} else {

    if(!empty($_POST['message'])){

        $sender = $_POST['send'];
        $receiver = $_POST['rec'];
        $data = $_POST['message'];
    
        $add = "INSERT INTO Gymifi_Messaging_System (Coach_Sender,Coach_Receiver,Message) VALUES ('$sender','$receiver','$data') ";
    
        $result = $conn->query($add);
    
        if(!$result) {
            $conn->error;
        } else {
    
        }
    }
}

?>