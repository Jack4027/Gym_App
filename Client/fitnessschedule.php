<?php
include("../conn.php");
session_start();
$week  = $_GET['week'];
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
    <link rel="stylesheet" href="../css/Css/fitnessschedule.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Training Schedule</title>
</head>

<body>
    <div class='row header'>

        <div class='col'>

            <h1 class='text-info'>Welcome To Your Gymifi Fitness Schedule <?php echo $name ?></h1>
        </div>
        <div class='col-2'>

            <button class="btn btn-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>

        </div>
    </div>

    <div class="container-fluid text-info index-container">
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
                            <a href="#">Training Schedule</a>
                        </li>
                        <li>
                            <a href="coach.php">Your Coach</a>
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
        <div class='row mt-3 ml-3'>

            <h4 class='weekhead'>Select Week</h4>
        </div>

        <div class='row mt-2 ml-1 '>
            <?php

            $weekQ = "SELECT * FROM Gymifi_Weeks";
            $resultweek = $conn->query($weekQ);

            while ($rowweek = $resultweek->fetch_assoc()) {
                $weekdata = $rowweek['Week'];


                echo "<div class = 'col'>
<button class='btn btn-outline-dark weekbtns type='button'>
<a href=fitnessschedule.php?week=$weekdata alt='weeks' class='weeklinks'>$weekdata</a>
</button>
</div>";
            }

            ?>

        </div>
        <table class="table table-striped table-dark clienttable">

            <h5 class='tableheading mt-4 ml-3'><?php echo $name ?>'s Fitness</h5>
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

                $query = "SELECT * FROM Gymifi_User_Fitness_Schedule WHERE User = '$id' AND Week = '$week' ";

                $result = $conn->query($query);

                if (!$result) {
                    $conn->error;
                } else {

                    while ($row = $result->fetch_assoc()) {

                        $mon = $row['Monday'];
                        $tue = $row['Tuesday'];
                        $wed = $row['Wednesday'];
                        $thur = $row['Thursday'];
                        $fri = $row['Friday'];
                        $sat = $row['Saturday'];
                        $sun = $row['Sunday'];


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

        <table class="table table-striped table-dark clientnuttable">

            <h5 class='tableheading mt-3 ml-3'><?php echo $name ?>'s Nutrition</h5>
            <thead>
                <tr>
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

                $query2 = "SELECT * FROM Gymifi_User_Nutrition_Schedule WHERE User = '$id' AND Week = '$week'";

                $result2 = $conn->query($query2);

                if (!$result2) {
                    $conn->error;
                } else {


                    while ($row2 = $result2->fetch_assoc()) {

                        $mon = $row2['Monday'];
                        $tue = $row2['Tuesday'];
                        $wed = $row2['Wednesday'];
                        $thur = $row2['Thursday'];
                        $fri = $row2['Friday'];
                        $sat = $row2['Saturday'];
                        $sun = $row2['Sunday'];


                        echo "<tr>
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