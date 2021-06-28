<?php 
include("conn.php");
session_start();

if(isset($_SESSION['id'])) {

    $id = $_SESSION['id'];

    $logout1 = "UPDATE Gymifi_User_Details SET Logged_In = false WHERE ID = '$id' ";

    $result1 = $conn->query($logout1);

    if(!$result1) {
        $conn->error;
    } else {

        $LogInDel1 = "DELETE FROM Gymifi_Login_Table WHERE User = '$id' ";

        $result3 = $conn->query($LogInDel1);
    }

} else if (isset($_SESSION['adminId'])) {

    $adminId = $_SESSION['adminId'];

    $logout2 = "UPDATE Gymifi_Coaches SET Logged_In = false WHERE ID = '$adminId' ";

    $result2 = $conn->query($logout2);

    if(!$result2) {
        $conn->error;
    } else {

        $LogInDel2 = "DELETE FROM Gymifi_Login_Table WHERE Coach = '$adminId' ";

        $result4 = $conn->query($LogInDel2);
    }


}

session_destroy ();

header("location: ./Client/index.php");

?>