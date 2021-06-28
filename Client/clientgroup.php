<?php
include("../conn.php");
session_start();

$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (!$name) {

    header("location: login.php");
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
    <link rel="stylesheet" href="../css/Css/traininglog.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Training Log</title>


</head>

<body>
    <div class='row header'>

        <div class='col'>

            <h1 class='text-info'>Welcome To Your Gymifi Training Log <?php echo $name ?></h1>
        </div>
        <div class='col-2'>

            <button class="btn btn-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>

        </div>
    </div>

    <div class="container-fluid text-info trainlog-container">
        <div class="row">

            <nav class="navbar navbar-dark bg-dark navbar-expand-md">


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar1">


                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a href="dash.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="index.php">Main Index</a>
                        <li>
                            <a href="fitnessschedule.php?week=1">Training Schedule</a>
                        </li>
                        <li>
                            <a href="coach.php">Your Coach</a>
                        </li>
                        <li>
                            <a href="#">Training-Log</a>
                        </li>
                        <li>
                            <a href="classes.php">Classes</a>
                        </li>
                        <li>
                            <a href="#">Groups</a>
                        </li>
                        <li>
                            <a href="personaldetails.php">Personal Details</a>
                        </li>
                        <li>
                            <a href="personaldetails.php">Personal Details</a>
                        </li>
                        <li>
                            <a href="yourperformance.php?week=1">Your Performance</a>
                        </li>
                    </ul>
                </div>

            </nav>

        </div>

        <div class='row ml-3'>

            <h3>Current Groups</h3>
        </div>

        <table class="table table-striped table-dark groups">


            <thead>
                <tr>
                    <th scope="col">Group Name</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $query = "SELECT Gymifi_Group_List.Name, Gymifi_Group_List.ID FROM Gymifi_Group_List INNER JOIN Gymifi_Group_Members ON 
                Gymifi_Group_List.ID = Gymifi_Group_Members.Group_ID WHERE Gymifi_Group_Members.Member 
                = '$id' ";

                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {

                    $groupId = $row['ID'];
                    $Group = $row['Name'];

                    echo " <tr> 
            <td><strong>$Group</strong></td>
            <td> <button class='btn btn-outline-success' type='button'><a href='clientgroupsched.php?groupId=$groupId&week=1'>View Group Schedule</a></button>
            <button class='btn btn-outline-success' type='button'><a href='clientgroupchat.php?groupId=$groupId'>Group Chat</a></button>
            </td>
            </tr>
                ";
                }

                ?>

            </tbody>

        </table>

    </div>

</body>

</html>