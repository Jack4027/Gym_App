<?php
include("../conn.php");
session_start();
$name = $_SESSION['name'];
$userID = $_SESSION['id'];
if (!$name) {

    header("location: login.php");
} else {
    $coachID = $_SESSION['coachId'];
    $coachfirst = $_SESSION['coach_first'];
}

$goalId = $_SESSION['goalId'];

$goalQ = "SELECT Fitness_Goal FROM Gymifi_Fitness_Goals WHERE Id = '$goalId' ";

$resultg = $conn->query($goalQ);

while ($rowg = $resultg->fetch_assoc()) {

    $fitnessgoal = $rowg['Fitness_Goal'];
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
    <link rel="stylesheet" href="../css/Css/coach.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Your Coach</title>
</head>

<body>
    <div class='row header'>

        <div class='col'>

            <h1 class='text-info'>Your Gymifi Coach is........ <?php echo "$coachfirst" ?> </h1>
        </div>
        <div class='col-2'>

            <button class="btn btn-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>

        </div>
    </div>

    <div class="container-fluid text-info coach-container">
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
                            <a href="#">Your Coach</a>
                        </li>
                        <li>
                            <a href="traininglog.php?logweek=1">Training-Log</a>
                        </li>
                        <li>
                            <a href="classes.php">Classes</a>
                        </li>
                        <li>
                            <a href="clientgroup.php">Groups</a>
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

        <?php

        $query = "SELECT Gymifi_Coaches.Id, Gymifi_Coaches.First_Name, Gymifi_Coaches.Surname, Gymifi_Coaches.Email, 
            Gymifi_Coaches.Specialist_Areas,Gymifi_Coaches.Photo_Path, Gymifi_Coaches.Photo_Name, Gender_ID.Gender FROM Gymifi_Coaches INNER JOIN Gender_ID ON 
            Gymifi_Coaches.Gender=Gender_ID.Id WHERE Gymifi_Coaches.Id ='$coachID' ";

        $result = $conn->query($query);

        if (!$result) {
            $conn->error;
        } else {

            while ($row = $result->fetch_assoc()) {


                $firstname = $row['First_Name'];
                $surname = $row['Surname'];
                $gender = $row["Gender"];
                $email = $row['Email'];
                $Special = $row['Specialist_Areas'];
                $path = $row['Photo_Path'];
                $photoname = $row['Photo_Name'];
            }
        }

        ?>

        <div class="coach-infor">


            <div class='row'>

                <div class='col-6'>
                    <h1>Your Trainer</h1>
                    <h3>Name: <?php echo "$firstname $surname" ?> </h3>
                    <h3>Gender: <?php echo $gender ?></h3>
                    <h3>Email: <?php echo $email ?></h3>
                    <h3 class='mb-4'>Specialist Areas: <?php echo $Special ?></h3>
                    <h3 class='text-success'><strong>Helping you to <?php echo $fitnessgoal ?>.</strong></h3>


                    <table class="table table-striped table-dark">

                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query2 = "SELECT * FROM Gymifi_Coaches WHERE Id = '$coachID' ";

                            $result2 = $conn->query($query2);

                            while ($row2 = $result2->fetch_assoc()) {

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
                <td> <p> <button class='btn btn-outline-success startchatbtn' type='button'>
                <a href='clientpopup.php?receiverIdCoach=$coachID'>Start Chat</a>
                </button> </p>
                    </td>
                                </tr>
                                        ";
                            }

                            ?>
                        </tbody>
                    </table>

                </div>
                <div class='col-6'>

                    <img class='img-responsive image' src=<?php echo "$path" ?> alt=<?php echo "$photoname" ?>>
                </div>
            </div>




        </div>
    </div>


    </div>
</body>

</html>