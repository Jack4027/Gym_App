<?php
include("../conn.php");
session_start();
$admin = $_SESSION['admin'];
$adminId = $_SESSION['adminId'];
$coachreceiver = 0;
if (!$admin) {

    header("location: adminlogin.php");
}

$groupId = $_GET['groupId'];

$groupnameQ = "SELECT Name FROM Gymifi_Group_List WHERE ID='$groupId' ";

$resultgn = $conn->query($groupnameQ);

if(!$resultgn) {
    $conn->error;
} else {

    while ($rowgn = $resultgn->fetch_assoc()) {

        $groupname = $rowgn['Name'];
    }
}

$history = "SELECT Gymifi_Group_Messaging.Group_ID,Gymifi_Group_Messaging.Coach_Sender,Gymifi_Group_Messaging.Client_Sender, 
Gymifi_Group_Messaging.Message,Gymifi_Group_Messaging.Time,Gymifi_User_Details.First_Name_Client,
Gymifi_User_Details.Surname_Client,Gymifi_Coaches.First_Name,Gymifi_Coaches.Surname FROM Gymifi_Group_Messaging 
LEFT OUTER JOIN Gymifi_User_Details ON Gymifi_User_Details.ID = Gymifi_Group_Messaging.Client_Sender 
LEFT OUTER JOIN Gymifi_Coaches ON Gymifi_Coaches.Id = Gymifi_Group_Messaging.Coach_Sender
WHERE (Gymifi_Group_Messaging.Group_ID = '$groupId') ORDER BY Time ASC ";

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                            <a href="message.php">Message</a>
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

            <div class='col-2'> </div>
            <div class='col-8'>
                <h3>Your Chat with <?php echo $groupname ?> </h3>
            </div>
            <div class='col-2'></div>
        </div>


        <div class='row'>
            <?php

            $result = $conn->query($history);

            if (!$result) {
                $conn->error;
            } else {
            }
            while ($row = $result->fetch_assoc()) {

                if ($row['First_Name'] != NULL) {

                    $first = $row['First_Name'];
                }
               else  if ($row['First_Name_Client'] != NULL) {

                    $first = $row['First_Name_Client'];
                }
                if (($row['Surname']) != NULL) {
                    $surname = $row['Surname'];
                }
                else if (($row['Surname_Client']) != NULL) {
                    $surname = $row['Surname_Client'];
                }

                $message = $row['Message'];
                $time = $row['Time'];

                if (($row['Coach_Sender'] == $adminId)) {
                    echo "<div class = 'col-4'>
                    <p class = 'text-success'> <strong>$first $surname</strong>: $message </p>
                    <p>Sent: $time</p>
                     </div>
                    <div class = 'col-8'> </div>";
                } else {

                    echo "<div class = 'col-8'> </div>
                    <div class = 'col-4'> 
                    
                    <p class= 'text-danger'> <strong>$first $surname </strong>: $message </p>
                    <p>Sent: $time</p>
                    </div>
                    ";
                }
            }
            ?>
        </div>

        <div class='row ml-3'>

            <form method="POST" action="groupchat.php">

                <textarea class="form-control" id="messageajax" type="text"></textarea>
        </div>
        <div class='row ml-3'>

            <button class="btn btn-outline-success" id="sendbtn" type="button">Send</button>
        </div>
        </form>

    </div>

    </div>
    <script>
        $(document).ready(function() {


            $('#sendbtn').on('click', function(e) {
                console.log('java');
                e.preventDefault();
                var ajaxmessage = $('#messageajax').val();

                var sender = <?php echo $adminId ?>;

                var group = <?php echo $groupId ?>;

                $.ajax({
                    url: "Ajax/gcajax.php",
                    type: "POST",
                    data: {
                        send: sender,
                        group: group,
                        message: ajaxmessage
                    },
                    cache: false,
                    success: function(result) {
                        console.log("Success");
                        location.reload();
                    }
                });
            });
        });
    </script>




</body>

</html>