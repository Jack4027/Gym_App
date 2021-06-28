<?php

include ("../../conn.php");

if ($_POST['insert']==0) {

    $ID = $conn->real_escape_string($_POST['ID']);
    $week = $conn->real_escape_string($_POST['week']); 
    $mon = $conn->real_escape_string($_POST['mon']);
    $tue = $conn->real_escape_string($_POST['tue']);
    $wed = $conn->real_escape_string($_POST['wed']);
    $thur = $conn->real_escape_string($_POST['thur']);
    $fri = $conn->real_escape_string($_POST['fri']);
    $sat = $conn->real_escape_string($_POST['sat']);
    $sun = $conn->real_escape_string($_POST['sun']);

    $query = "UPDATE Gymifi_User_Log SET Monday='$mon',Tuesday='$tue',Wednesday='$wed',Thursday='$thur',Friday='$fri',Saturday='$sat',
Sunday = '$sun' WHERE User = '$ID' AND Week = '$week' ";

    $result = $conn->query($query);

    if (!$result) {
        $conn->error;
    } else {
    }

    } else if ($_POST['insert']==1) {

    $ID = $conn->real_escape_string($_POST['ID']);
    $week = $conn->real_escape_string($_POST['week']); 
    $mon = $conn->real_escape_string($_POST['mon']);
    $tue = $conn->real_escape_string($_POST['tue']);
    $wed = $conn->real_escape_string($_POST['wed']);
    $thur = $conn->real_escape_string($_POST['thur']);
    $fri = $conn->real_escape_string($_POST['fri']);
    $sat = $conn->real_escape_string($_POST['sat']);
    $sun = $conn->real_escape_string($_POST['sun']);

    $query = "INSERT INTO Gymifi_User_Log (User,Week,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday) 
    VALUES ('$ID','$week','$mon','$tue','$wed','$thur','$fri','$sat','$sun') ";

    $result = $conn->query($query);

    if (!$result) {
        $conn->error;
    } else {
    }
}
