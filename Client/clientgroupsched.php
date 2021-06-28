<?php
include("../conn.php");
session_start();

$week = $_GET['week'];
$groupId = $_GET['groupId'];
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
    <title>Group Schedule</title>


</head>

<body>
    <div class='row header'>

        <div class='col'>

            <h1 class='text-info'>Welcome To Your Group Schedule <?php echo $name ?></h1>
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
                            <a href="fitnessschedule.php">Training Schedule</a>
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

        <div class='row mt-3 ml-1'>

            <h4 class='weekhead'>Select Week</h4>
        </div>

        <div class='row mt-2 '>
            <?php

            $weekQ = "SELECT * FROM Gymifi_Weeks";
            $resultweek = $conn->query($weekQ);

            while ($rowweek = $resultweek->fetch_assoc()) {
                $weekdata = $rowweek['Week'];


                echo "<div class = 'col'>
<button class='btn btn-outline-dark weekbtns type='button'>
<a href=clientgroupsched.php?groupId=$groupId&week=$weekdata alt='weeks' class='weeklinks'>$weekdata</a>
</button>
</div>";
            }

            ?>

        </div>

        <div class='row'>

        </div>
        <div class='row'>

            <div class='col-11'>
                <h5 class='tableheading mt-3 ml-3'>Group Schedule</h5>

            </div>
            <div class='col'>

            </div>


        </div>
        <table class="table table-striped table-dark clienttable">

            <thead>
                <tr>
                    <th scope="col">Week</th>
                    <th scope="col">Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>
                    <th scope="col">Saturday</th>
                    <th scope="col">Sunday</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $query2 = "SELECT * FROM Gymifi_Group_Schedule WHERE Group_ID = '$groupId' AND Week = '$week' ";

                $result2 = $conn->query($query2);

                if (!$result2) {
                    $conn->error;
                } else {
                    $count = 0;
                    while (($row2 = $result2->fetch_assoc()) && ($count < 1)) {


                        $mon = $row2['Monday'];
                        $tue = $row2['Tuesday'];
                        $wed = $row2['Wednesday'];
                        $thur = $row2['Thursday'];
                        $fri = $row2['Friday'];
                        $sat = $row2['Saturday'];
                        $sun = $row2['Sunday'];
                        $count++;

                        echo " <tr>
                    <td>$week</td>
                    <td>$mon</td>
                    <td>$tue</td>
                    <td>$wed</td>
                    <td>$thur</td>
                    <td>$fri</td>
                    <td>$sat</td>
                    <td>$sun</td>
                        </tr>
                            ";
                    }
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>