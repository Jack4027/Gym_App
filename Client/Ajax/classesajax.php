<?php

include("../../conn.php");


if ($_POST['remove']==0) {

    $classid = $_POST['class'];
    $id = $_POST['user'];

  $query = "INSERT INTO Gymifi_Class_Takers (Class, Taker) VALUES ('$classid', '$id') ";

  $result = $conn->query($query);

  if (!$result) {
    echo $conn->error;
  }
}

else {

    $classid = $_POST['class'];
    $id = $_POST['user'];

  $query = "DELETE FROM Gymifi_Class_Takers WHERE Class = '$classid' AND Taker = '$id' ";

  $result = $conn->query($query);

  if (!$result) {
    echo $conn->error;
  }
}
?>