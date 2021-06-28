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
    <link rel="stylesheet" href="../css/AdminCss/manageclient.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title> <?php echo $admin ?>'s Dashboard</title>
</head>

<body>

    <div class='row header'>

        <div class='col text-info'>

            <h1>Manage Your Clients <?php echo $admin ?></h1>
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
                            <a href="#">Manage Clients</a>
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

            <table class="table table-striped table-dark classestable">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Fitness Goal</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email</th>

                    </tr>
                </thead>
                <tbody>

                    <?php

                    $query = "SELECT Gymifi_User_Details.ID, Gymifi_User_Details.First_Name_Client,Gymifi_User_Details.Surname_Client,
                    Gender_ID.Gender,Gymifi_Fitness_Goals.Fitness_Goal,
                    Gymifi_User_Details.Contact_Number, Gymifi_User_Details.Email FROM Gymifi_User_Details INNER JOIN Gymifi_Fitness_Goals ON 
                    Gymifi_User_Details.Fitness_Goal = Gymifi_Fitness_Goals.Id INNER JOIN Gender_ID ON Gymifi_User_Details.Gender = Gender_ID.Id 
                    WHERE Gymifi_User_Details.Coach = '$adminId' ";

                    $result = $conn->query($query);

                    if (!$result) {
                        echo $conn->error;
                    } else {

                        while ($row = $result->fetch_assoc()) {
                            $userId= $row['ID'];
                            $first = $row['First_Name_Client'];
                            $surname = $row['Surname_Client'];
                            $gender = $row['Gender'];
                            $goal = $row['Fitness_Goal'];
                            $phone = $row['Contact_Number'];
                            $email = $row['Email'];

                            echo 
                            "
                            <tr>
                            <th scope='row'><a href='updateclient.php?userId=$userId&week=1'>$first</a></th>
                            <td><a href='updateclient.php?userId=$userId&week=1'>$surname</a></td>
                            <td>$gender</td>
                            <td>$goal</td>
                            <td>$phone</td>
                            <td>$email</td>
                            </tr>
                            </a>
                            ";
                        }
                    }

                    ?>
        </div>
</body>

</html>