<?php

include ("../../conn.php");
if($_POST['nutrition']==0) {

    if ($_POST['insert']==0) {
        
        $week = $conn->real_escape_string($_POST['week']);
        $client = $conn->real_escape_string($_POST['client']);
        $mon = $conn->real_escape_string($_POST['mon']);
        $tue = $conn->real_escape_string($_POST['tue']);
        $wed = $conn->real_escape_string($_POST['wed']);
        $thur = $conn->real_escape_string($_POST['thur']);
        $fri = $conn->real_escape_string($_POST['fri']);
        $sat = $conn->real_escape_string($_POST['sat']);
        $sun = $conn->real_escape_string($_POST['sun']);
        
        $query = "UPDATE Gymifi_User_Fitness_Schedule SET Monday='$mon',Tuesday='$tue',Wednesday='$wed',Thursday='$thur',Friday='$fri',Saturday='$sat',
Sunday = '$sun' WHERE User = '$client' AND Week = '$week' ";

$result = $conn->query($query);

if (!$result) {
    $conn->error;
} else {
}
}
else if ($_POST['insert']==1) {
    
    $week = $conn->real_escape_string($_POST['week']);
    $client = $conn->real_escape_string($_POST['client']);
    $mon = $conn->real_escape_string($_POST['mon']);
    $tue = $conn->real_escape_string($_POST['tue']);
    $wed = $conn->real_escape_string($_POST['wed']);
    $thur = $conn->real_escape_string($_POST['thur']);
    $fri = $conn->real_escape_string($_POST['fri']);
    $sat = $conn->real_escape_string($_POST['sat']);
    $sun = $conn->real_escape_string($_POST['sun']);
    
    $query = "INSERT INTO Gymifi_User_Fitness_Schedule  (Week,User,Monday ,Tuesday ,Wednesday ,Thursday ,Friday ,Saturday ,Sunday ) 
VALUES ('$week','$client','$mon','$tue','$wed','$thur','$fri','$sat','$sun') ";

$result = $conn->query($query);

if (!$result) {
    $conn->error;
} else {
}
}
}
else if($_POST['nutrition']==1) {
    if ($_POST['insert']==0) {
        
        $week = $conn->real_escape_string($_POST['week']);
        $client = $conn->real_escape_string($_POST['client']);
        $mon = $conn->real_escape_string($_POST['mon']);
        $tue = $conn->real_escape_string($_POST['tue']);
        $wed = $conn->real_escape_string($_POST['wed']);
        $thur = $conn->real_escape_string($_POST['thur']);
        $fri = $conn->real_escape_string($_POST['fri']);
        $sat = $conn->real_escape_string($_POST['sat']);
        $sun = $conn->real_escape_string($_POST['sun']);
        
        $query = "UPDATE Gymifi_User_Nutrition_Schedule SET Monday='$mon',Tuesday='$tue',Wednesday='$wed',Thursday='$thur',Friday='$fri',Saturday='$sat',
Sunday = '$sun' WHERE User = '$client' AND Week = '$week' ";

$result = $conn->query($query);

if (!$result) {
    $conn->error;
} else {
}
}
else if ($_POST['insert']==1) {
    
    $week = $conn->real_escape_string($_POST['week']);
    $client = $conn->real_escape_string($_POST['client']);
    $mon = $conn->real_escape_string($_POST['mon']);
    $tue = $conn->real_escape_string($_POST['tue']);
    $wed = $conn->real_escape_string($_POST['wed']);
    $thur = $conn->real_escape_string($_POST['thur']);
    $fri = $conn->real_escape_string($_POST['fri']);
    $sat = $conn->real_escape_string($_POST['sat']);
    $sun = $conn->real_escape_string($_POST['sun']);
    
    $query = "INSERT INTO Gymifi_User_Nutrition_Schedule (Week,User,Monday ,Tuesday ,Wednesday ,Thursday ,Friday ,Saturday ,Sunday ) 
    VALUES ('$week','$client','$mon','$tue','$wed','$thur','$fri','$sat','$sun') ";

$result = $conn->query($query);

if (!$result) {
    $conn->error;
} else {
}
}
}
