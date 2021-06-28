<?php

include("../../conn.php");

if ($_POST['add1']!=0) {

    $add = $_POST['add1'];
    $group = $_POST['group'];
    $query = "INSERT INTO Gymifi_Group_Members (Group_ID, Member) VALUES ('$group','$add') ";
    $result = $conn->query($query);

    if(!$result) {
        $conn->error;
    }
}
if ($_POST['add2']!=0) {

    $add = $_POST['add2'];
    $group = $_POST['group'];
    $query = "INSERT INTO Gymifi_Group_Members (Group_ID, Member) VALUES ('$group','$add') ";
    $result = $conn->query($query);

    if(!$result) {
        $conn->error;
    }
}
if ($_POST['add3']!=0) {

    $add = $_POST['add3'];
    $group = $_POST['group'];
    $query = "INSERT INTO Gymifi_Group_Members (Group_ID, Member) VALUES ('$group','$add') ";
    $result = $conn->query($query);

    if(!$result) {
        $conn->error;
    }
}
if ($_POST['add4']!=0) {

    $add = $_POST['add4'];
    $group = $_POST['group'];
    $query = "INSERT INTO Gymifi_Group_Members (Group_ID, Member) VALUES ('$group','$add') ";
    $result = $conn->query($query);

    if(!$result) {
        $conn->error;
    }
}
if ($_POST['add5']!=0) {

    $add = $_POST['add5'];
    $group = $_POST['group'];
    $query = "INSERT INTO Gymifi_Group_Members (Group_ID, Member) VALUES ('$group','$add') ";
    $result = $conn->query($query);

    if(!$result) {
        $conn->error;
    }
}
if ($_POST['add6']!=0) {

    $add = $_POST['add6'];
    $group = $_POST['group'];
    $query = "INSERT INTO Gymifi_Group_Members (Group_ID, Member) VALUES ('$group','$add') ";
    $result = $conn->query($query);

    if(!$result) {
        $conn->error;
    }
}
?>