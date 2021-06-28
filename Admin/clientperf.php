<?php
include("../conn.php");
session_start();


$clientId = $_GET['userId'];
$week = $_GET['week'];

$clientfirst = $_SESSION['clientfirst'];
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
    <link rel="stylesheet" href="../css/AdminCss/tracker.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title> Clients Performance</title>
</head>

<body>

    <div class='row header'>

        <div class='col text-info'>

            <h1>Manage Client Performance</h1>
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
        <a href=clientperf.php?userId=$clientId&week=$weekdata alt='weeks' class='weeklinks'>$weekdata</a>
        </button>
        </div>";
            }

            ?>

        </div>


        <table class="table table-striped table-dark perftable">

            <h5 class='tableheading'><?php echo $clientfirst ?>'s Performance</h5>
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

                $query = "SELECT * FROM Gymifi_User_Performance WHERE Coach = '$adminId' AND User = '$clientId'
                 AND Week ='$week' ";

                $result = $conn->query($query);

                if (!$result) {
                    $conn->error;
                } else {

                    $count = 0;
                    while (($row = $result->fetch_assoc()) &&($count<1)) {

                        
                        $week = $row['Week'];
                        $mon = $row['Monday'];
                        $tue = $row['Tuesday'];
                        $wed = $row['Wednesday'];
                        $thur = $row['Thursday'];
                        $fri = $row['Friday'];
                        $sat = $row['Saturday'];
                        $sun = $row['Sunday'];

                        $count ++ ;

                        echo " <tr> 
                        <td><strong>$week</strong></td>
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
        <form class="has-text-centered" action="clientperf.php" method="POST">

            <table class="table table-striped table-dark edittable">

                <h5 class='tableheading'>Insert Entry Below</h5>
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

                                $weekQ = "SELECT * FROM Gymifi_Weeks";
                                $resultweek = $conn->query($weekQ);

                                while ($rowweek = $resultweek->fetch_assoc()) {

                                    $weekdata = $rowweek['Week'];


                                    echo "<option value='$weekdata'>$weekdata</option>";
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
                <div class='col'>

                    <p> <input class="btn btn-outline-danger editbutton" type="submit" name='edit' value="Edit"> </p>
                </div>
                <div class='col'>

                    <p> <input class="btn btn-outline-danger insertbutton" type="submit" name='insert' value="Insert"> </p>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function() {

                $(".insertbutton").on('click', function(e) {
                    e.preventDefault();
                    var insert = 1;
                    var client = <?php echo $clientId ?>;
                    var admin = <?php echo $adminId ?>;
                    var week = $("#weekIns").val();
                    var mon = $("#mon").val();
                    var tue = $("#tue").val();
                    var wed = $("#wed").val();
                    var thur = $("#thur").val();
                    var fri = $("#fri").val();
                    var sat = $("#sat").val();
                    var sun = $("#sun").val();

                    $.ajax({
                        url: "Ajax/performanceajax.php",
                        type: "POST",
                        data: {
                            insert: insert,
                            client: client,
                            admin: admin,
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

                $(".editbutton").on("click", function(e) {
                    e.preventDefault();
                    var insert = 0;
                    var client = <?php echo $clientId ?>;
                    var admin = <?php echo $adminId ?>;
                    var week = $("#weekIns").val();
                    var mon = $("#mon").val();
                    var tue = $("#tue").val();
                    var wed = $("#wed").val();
                    var thur = $("#thur").val();
                    var fri = $("#fri").val();
                    var sat = $("#sat").val();
                    var sun = $("#sun").val();

                    $.ajax({
                        url: "Ajax/performanceajax.php",
                        type: "POST",
                        data: {
                            insert: insert,
                            client: client,
                            admin: admin,
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