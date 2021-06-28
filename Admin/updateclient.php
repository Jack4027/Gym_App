<?php
include("../conn.php");
$clientid = $_GET['userId'];
$week = $_GET['week'];
session_start();
$admin = $_SESSION['admin'];
$adminId = $_SESSION['adminId'];
if (!$admin) {

    header("location: adminlogin.php");
}

$query = "SELECT First_Name_Client FROM Gymifi_User_Details WHERE ID ='$clientid' ";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $clientfirst = $row['First_Name_Client'];

    $_SESSION['clientfirst'] = $clientfirst;
}

$clientfirst = $_SESSION['clientfirst'];

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title> <?php echo $clientfirst ?>'s Details</title>
</head>

<body>

    <div class='row header'>

        <div class='col text-info'>

            <h1>This is <?php echo $clientfirst ?>'s Fitness Schedule <?php echo $admin ?> </h1>
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
        </div>
        </nav>

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
<a href=updateclient.php?userId=$clientid&week=$weekdata alt='weeks' class='weeklinks'>$weekdata</a>
</button>
</div>";
            }

            ?>

        </div>

        <div class='row'>

        </div>
        <div class='row'>

            <div class='col-11'>
                <h5 class='tableheading mt-3 ml-3'><?php echo $clientfirst ?>'s Fitness</h5>

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

                $query2 = "SELECT * FROM Gymifi_User_Fitness_Schedule WHERE User = '$clientid' AND Week = '$week' ";

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


        <form class="has-text-centered" action="updateclient.php" method="POST">

            <table class="table table-striped table-dark edittable">

                <h5 class='tableheading mt-5 ml-3'>Change Fitness Schedule</h5>
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
                <div class='col'>

                    <p> <input class="btn btn-outline-danger fiteditbtn" type="submit" id='edit' value="Edit"> </p>
                </div>
                <div class='col'>

                    <p> <input class="btn btn-outline-danger fitinsertbtn" type="submit" id='insert' value="Insert"> </p>
                </div>
            </div>
        </form>

        <table class="table table-striped table-dark clientnuttable">

            <h5 class='tableheading mt-3 ml-3'><?php echo $clientfirst ?>'s Nutrition</h5>
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

                $query3 = "SELECT * FROM Gymifi_User_Nutrition_Schedule WHERE User = '$clientid' AND Week = '$week' ";

                $result3 = $conn->query($query3);

                if (!$result3) {
                    $conn->error;
                } else {

                    $count2 = 0;
                    while (($row3 = $result3->fetch_assoc()) && ($count2 < 1)) {


                        $mon = $row3['Monday'];
                        $tue = $row3['Tuesday'];
                        $wed = $row3['Wednesday'];
                        $thur = $row3['Thursday'];
                        $fri = $row3['Friday'];
                        $sat = $row3['Saturday'];
                        $sun = $row3['Sunday'];


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
                        $count2++;
                    }
                }
                ?>

            </tbody>
        </table>

        <form class="has-text-centered" action="updateclient.php" method="POST">

            <table class="table table-striped table-dark edittable">

                <h5 class='tableheading mt-5 ml-3'>Change Nutrition</h5>
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

                            <select class="week-select" id="weekIns2">
                                <?php

                                $weekQ3 = "SELECT * FROM Gymifi_Weeks";
                                $resultweek3 = $conn->query($weekQ3);

                                while ($rowweek3 = $resultweek3->fetch_assoc()) {

                                    $weekdata3 = $rowweek3['Week'];


                                    echo "<option value='$weekdata3'>$weekdata3</option>";
                                }

                                ?>

                            </select>
                        </td>
                        <td> <textarea class='form-control'  type="text" id="mon2"></textarea></td>
                        <td><textarea class='form-control'  type="text" id="tue2"></textarea></td>
                        <td><textarea class='form-control' type="text" id="wed2"></textarea></td>
                        <td><textarea class='form-control'  type="text" id="thur2"></textarea></td>
                        <td><textarea class='form-control'  type="text" id="fri2"></textarea></td>
                        <td><textarea class='form-control' type="text" id="sat2"></textarea></td>
                        <td><textarea class='form-control'  type="text" id="sun2"></textarea></td>
                    </tr>

                </tbody>
            </table>

            <div class='row'>
                <div class='col'>

                    <p> <input class="btn btn-outline-danger nuteditbtn" type="submit" id='edit2' value="Edit"> </p>
                </div>
                <div class='col'>

                    <p> <input class="btn btn-outline-danger nutinsertbtn" type="submit" id='insert2' value="Insert"> </p>
                </div>
            </div>
        </form>

    </div>
<script>
    $(document).ready(function(){


        $("#insert").on('click', function(e) {
            e.preventDefault();
            var nutrition =0;
            var insert = 1;
            var client = <?php echo $clientid ?>;
            var week = $("#weekIns").val();
            var mon = $("#mon").val();
            var tue = $("#tue").val();
            var wed = $("#wed").val();
            var thur = $("#thur").val();
            var fri = $("#fri").val();
            var sat = $("#sat").val();
            var sun = $("#sun").val();
            
            $.ajax({
                url: "Ajax/updateclientajax.php",
                type: "POST",
                data: {
                    nutrition: nutrition,
                    insert: insert,
                    client: client,
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
        
        $("#edit").on("click", function(e) {
            e.preventDefault();
            var nutrition =0;
            var insert = 0;
            var client = <?php echo $clientid ?>;
            var week = $("#weekIns").val();
            var mon = $("#mon").val();
            var tue = $("#tue").val();
            var wed = $("#wed").val();
            var thur = $("#thur").val();
            var fri = $("#fri").val();
            var sat = $("#sat").val();
            var sun = $("#sun").val();
            
            $.ajax({
                url: "Ajax/updateclientajax.php",
                type: "POST",
                data: {
                    nutrition: nutrition,
                    insert: insert,
                    client: client,
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
        
        $("#insert2").on('click', function(e) {
            e.preventDefault();
            var nutrition =1;
            var insert = 1;
            var client = <?php echo $clientid ?>;
            var week = $("#weekIns2").val();
            var mon = $("#mon2").val();
            var tue = $("#tue2").val();
            var wed = $("#wed2").val();
            var thur = $("#thur2").val();
            var fri = $("#fri2").val();
            var sat = $("#sat2").val();
            var sun = $("#sun2").val();
            
            $.ajax({
                url: "Ajax/updateclientajax.php",
                type: "POST",
                data: {
                    nutrition: nutrition,
                    insert: insert,
                    client: client,
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
        
        $("#edit2").on("click", function(e) {
            e.preventDefault();
            var nutrition =1;
            var insert = 0;
            var client = <?php echo $clientid ?>;
            var week = $("#weekIns2").val();
            var mon = $("#mon2").val();
            var tue = $("#tue2").val();
            var wed = $("#wed2").val();
            var thur = $("#thur2").val();
            var fri = $("#fri2").val();
            var sat = $("#sat2").val();
            var sun = $("#sun2").val();
            
            $.ajax({
                url: "Ajax/updateclientajax.php",
                type: "POST",
                data: {
                    nutrition: nutrition,
                    insert: insert,
                    client: client,
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
        
        </body>
        
</html>