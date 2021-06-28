<?php
include("../conn.php");
session_start();
$admin = $_SESSION['admin'];
$adminId = $_SESSION['adminId'];
$coachreceiver = 0;
if (!$admin) {

    header("location: adminlogin.php");
}

$senderId = $_GET['senderId'];

if (isset($_GET['receiverId'])) {

    $receiverId = $_GET['receiverId'];
    $query = "SELECT * FROM Gymifi_User_Details WHERE ID = '$receiverId'";
    $result = $conn->query($query);

    if (!$result) {
        $conn->error;
    } else {


        while ($row = $result->fetch_assoc()) {
            $receiverFirst = $row['First_Name_Client'];
        }
        $history = "SELECT * FROM Gymifi_Messaging_System WHERE (Coach_Sender = '$adminId' AND Client_Receiver = '$receiverId') OR (Client_Sender = '$receiverId' AND Coach_Receiver = '$adminId')
     ORDER BY Time_Stamp ASC ";
    }
} else {
    $receiverId = $_GET['receiverIdCoach'];
    $coachreceiver = 1;
    $query = "SELECT * FROM Gymifi_Coaches WHERE Id = '$receiverId'";
    $result = $conn->query($query);

    if (!$result) {
        $conn->error;
    } else {


        while ($row = $result->fetch_assoc()) {
            $receiverFirst = $row['First_Name'];
        }
        $history = "SELECT * FROM Gymifi_Messaging_System WHERE (Coach_Sender = '$adminId' AND Coach_Receiver = '$receiverId') OR (Coach_Sender = '$receiverId' AND Coach_Receiver = '$adminId')
     ORDER BY Time_Stamp ASC ";
    }
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
                <h3>Your Chat with <?php echo $receiverFirst ?> </h3>
            </div>
            <div class='col-2'></div>
        </div>


        <div class='row'>
            <?php

            $result2 = $conn->query($history);

            while ($row2 = $result2->fetch_assoc()) {

                $message = $row2['Message'];
                $time = $row2['Time_Stamp'];

                if (($row2['Coach_Sender'] == $adminId)) {
                    echo "<div class = 'col-4'>
                    <p class = 'text-success'> <strong>$admin</strong>: $message </p>
                    <p>Sent: $time</p>
                     </div>
                    <div class = 'col-8'> </div>";
                } else if ((($row2['Coach_Sender'] != $adminId) && ($row2['Coach_Sender'] != null)) || ($row2['Client_Sender'] != null)) {

                    echo "<div class = 'col-8'> </div>
                    <div class = 'col-4'> 
                    
                    <p class= 'text-danger'> <strong>$receiverFirst</strong>: $message </p>
                    <p>Sent: $time</p>
                    </div>
                    ";
                }
            }
            ?>
        </div>
        <div class='row ml-3'>
            
                <form method = "POST" action = "chatpopup.php">

                    <textarea class="form-control" id = "messageajax"  name='messagecontent' type="text"></textarea>
                </div>

                <div class='row ml-3'>

                    <button class="btn btn-outline-success" id="sendbtn" type="button">Send</button>
                </div>
                
            </form>

        </div>

    </div>
    <script>
        $(document).ready(function() {

            
            $('#sendbtn').on('click', function (e) {
                console.log('java');
                e.preventDefault();
                var ajaxmessage = $('#messageajax').val();
                
                var sender = <?php echo $adminId ?>;

                var receiver = <?php echo $receiverId ?>;

                var type = <?php echo $coachreceiver ?>;
                
                $.ajax({
                    url: "Ajax/updatemessages.php",
                    type: "POST",
                    data: {
                        send: sender,
                        rec: receiver,
                        message: ajaxmessage,
                        type: type
                    },
                    cache: false,
                    success: function (result) {
                        console.log("Success");
                        location.reload();
                    }
                });
            });
        });
    </script>




</body>

</html>