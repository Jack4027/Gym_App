<?php
include("../conn.php");
session_start();

$week = $_GET['logweek'];
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

        <div class='row'>


            <h4 class='weekhead'>Select Week</h4>

        </div>

        <div class='row'>

            <?php

            $weekQ = "SELECT * FROM Gymifi_Weeks";
            $resultweek = $conn->query($weekQ);

            while ($rowweek = $resultweek->fetch_assoc()) {
                $weekdata = $rowweek['Week'];


                echo "<div class = 'col'>
    <button class='btn btn-outline-dark weekbtns type='button'>
<a href=traininglog.php?logweek=$weekdata alt='weeks' class='weeklinks'>$weekdata</a>
</button>
</div>";
            }

            ?>

        </div>
        <table class="table table-striped table-dark logtable">

            <h5 class='tableheading'><?php echo $name ?>'s Fitness Log</h5>
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

                $query = "SELECT * FROM Gymifi_User_Log WHERE User = '$id' AND Week = '$week' ";

                $result = $conn->query($query);

                if (!$result) {
                    $conn->error;
                } else {

                    $count = 0;
                    while (($row = $result->fetch_assoc()) && ($count < 1)) {

                        $weekd = $row['Week'];
                        $mon = $row['Monday'];
                        $tue = $row['Tuesday'];
                        $wed = $row['Wednesday'];
                        $thur = $row['Thursday'];
                        $fri = $row['Friday'];
                        $sat = $row['Saturday'];
                        $sun = $row['Sunday'];


                        echo " <tr> 
                            <td>$weekd</td>
                            <td>$mon</td>
                            <td>$tue</td>
                            <td>$wed</td>
                            <td>$thur</td>
                            <td>$fri</td>
                            <td>$sat</td>
                            <td>$sun</td>
                                </tr>
                                    ";
                        $count++;
                    }
                }
                ?>

            </tbody>
        </table>
        <form class="has-text-centered" action="traininglog.php" method="POST">

            <table class="table table-striped table-dark edittable">

                <h5 class='tableheading'>Enter Log Values Below</h5>
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
                    <tr>
                        <td>

                            <select class="week-select" id="weekIns">

                                <?php
                                $weekQ2 = "SELECT * FROM Gymifi_Weeks";
                                $resultweek2 = $conn->query($weekQ2);

                                while ($rowweek2 = $resultweek2->fetch_assoc()) {

                                    $weekdata2 = $rowweek2['Week'];

                                    echo "<option value='$weekdata2'>$weekdata2</option>";
                                }
                                ?>

                            </select>
                        </td>
                        <td> <textarea class='form-control' type="text" id="mon"></textarea></td>
                        <td><textarea class='form-control' type="text" id="tue"></textarea></td>
                        <td><textarea class='form-control' type="text" id="wed"></textarea></td>
                        <td><textarea class='form-control' type="text" id="thur"></textarea></td>
                        <td><textarea class='form-control' type="text" id="fri"></textarea></td>
                        <td><textarea class='form-control' type="text" id="sat"></textarea></td>
                        <td><textarea class='form-control' type="text" id="sun"></textarea></td>
                    </tr>

                </tbody>
            </table>

            <div class='row'>
                <div class='col-6'>

                    <p> <input class="btn btn-outline-success editbutton" type="submit" id='edit' value="Edit"> </p>
                </div>
                <div class='col-6'>

                    <p> <input class="btn btn-outline-success insertbutton" type="submit" id='insert' value="Insert"> </p>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function() {

                $("#edit").on('click', function(e) {

                    e.preventDefault();
                    var insert = 0;
                    var ID = <?php echo $id ?>;
                    var week = $("#weekIns").val();
                    var mon = $("#mon").val();
                    var tue = $("#tue").val();
                    var wed = $("#wed").val();
                    var thur = $("#thur").val();
                    var fri = $("#fri").val();
                    var sat = $("#sat").val();
                    var sun = $("#sun").val();

                    $.ajax({
                        url: "Ajax/logajax.php",
                        type: "POST",
                        data: {
                            insert: insert,
                            ID: ID,
                            week: week,
                            mon: mon,
                            tue: tue,
                            wed: wed,
                            thur: thur,
                            fri: fri,
                            sat: sat,
                            sun: sun

                        },
                        cache: false,
                        success: function(result) {
                            console.log("Success");
                            location.reload();
                        }
                    })
                });
                $("#insert").on('click', function(e) {

                    e.preventDefault();
                    var insert = 1;
                    var ID = <?php echo $id ?>;
                    var week = $("#weekIns").val();
                    var mon = $("#mon").val();
                    var tue = $("#tue").val();
                    var wed = $("#wed").val();
                    var thur = $("#thur").val();
                    var fri = $("#fri").val();
                    var sat = $("#sat").val();
                    var sun = $("#sun").val();

                    $.ajax({
                        url: "Ajax/logajax.php",
                        type: "POST",
                        data: {
                            insert: insert,
                            ID: ID,
                            week: week,
                            mon: mon,
                            tue: tue,
                            wed: wed,
                            thur: thur,
                            fri: fri,
                            sat: sat,
                            sun: sun

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

    </div>
</body>

</html>