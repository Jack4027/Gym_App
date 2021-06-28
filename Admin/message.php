<?php
include("../conn.php");
session_start();
$admin = $_SESSION['admin'];
$adminId = $_SESSION['adminId'];
if (!$admin) {

    header("location: adminlogin.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ui.css">
    <link rel="stylesheet" href="../css/AdminCss/colour.css">
    <link rel="stylesheet" href="../css/AdminCss/message.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title> <?php echo $admin ?>'s Window</title>
</head>

<body>

    <div class='row header'>

        <div class='col text-info'>

            <h1>Hello <?php echo $admin ?> Welcome to the Chat Window</h1>
        </div>
        <div class='col-2'>

            <button class="btn btn-outline-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>

        </div>
    </div>

    <div class="container-fluid text-info admin-container">
        <div class="row">

            <nav class="navbar navbar-dark bg-dark navbar-expand-md">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar1">


                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a href="admin.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="../Client/index.php">Main Index</a>
                        <li>
                            <a href="registerclients.php">Register Clients</a>
                        </li>
                        <li>
                            <a href="managecontent.php">Manage Content</a>
                        </li>
                        <li>
                            <a href="manageclients.php">Manage Clients</a>
                        </li>
                        <li>
                            <a href="manageappointments.php">Manage Appointments</a>
                        </li>
                        <li>
                            <a href="#">Message</a>
                        </li>
                        <li>
                            <a href="group.php">Groups</a>
                        </li>
                        <li>
                            <a href="tracker.php">Manage History/Performance</a>
                        </li>
                    </ul>
                </div>

            </nav>

        </div>

        <div class='row'>

            <h3 class='clientshead'> Clients</h3>
        </div>

       
        <table class="table table-striped table-dark usertable">


            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $query = "SELECT * FROM Gymifi_User_Details WHERE Coach = '$adminId' ";

                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {

                    $userId = $row['ID'];
                    $first = $row['First_Name_Client'];
                    $surname = $row['Surname_Client'];
                    $loggedin = $row['Logged_In'];

                    if ($loggedin > 0) {
                        $status = "online";
                    } else {
                        $status = "offline";
                    }
                    echo " <tr> 
    <td><strong>$first $surname</strong></td>
    <td>$status</td>
    <td> <button class='btn btn-outline-success' type='button'><a href='chatpopup.php?receiverId=$userId&senderId=$adminId'>Start Chat</a></button>
     </td>
    </tr>
    ";
                }

                ?>

            </tbody>
        </table>

        <h3 class='coacheshead'>Coaches</h3>
        <table class="table table-striped table-dark coachtable">


            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $query2 = "SELECT * FROM Gymifi_Coaches WHERE Id != '$adminId' ";

                $result2 = $conn->query($query2);

                while ($row2 = $result2->fetch_assoc()) {

                    $otheradminId = $row2['Id'];
                    $first = $row2['First_Name'];
                    $surname = $row2['Surname'];
                    $loggedin = $row2['Logged_In'];

                    if ($loggedin > 0) {
                        $status = "online";
                    } else {
                        $status = "offline";
                    }
                    echo " <tr> 
    <td><strong>$first $surname</strong></td>
    <td>$status</td>
    <td> <button class='btn btn-outline-success startchatbtn' type='button'><a href='chatpopup.php?receiverIdCoach=$otheradminId&senderId=$adminId'>Start Chat</a></button> </td>
    </tr>
    ";
                }

                ?>
            </tbody>
        </table>


    </div>

</body>

</html>