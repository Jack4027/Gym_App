<?php
include("../conn.php");
session_start();
$admin = $_SESSION['admin'];
$adminId = $_SESSION['adminId'];
$rowId = $_GET['rowId'];
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
    <link rel="stylesheet" href="../css/AdminCss/manageappointments.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title> Appointment </title>
</head>

<body>

    <div class='row header'>

        <div class='col text-info'>

            <h1>Appointment for <?php echo $admin ?></h1>
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

        <table class="table table-striped table-dark apptable">

            <h5 class='tableheading'><?php echo $admin ?>'s Appointment</h5>
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $query = "SELECT * FROM Gymifi_Coaches_Appointments WHERE ID = '$rowId' ";

                $result = $conn->query($query);

                if (!$result) {
                    $conn->error;
                } else {

                    while ($row = $result->fetch_assoc()) {

                        $date = $row['Date'];
                        $date = date('d.m.Y', strtotime($date));
                        $title = $row['Title'];
                        $desc = $row['Description'];

                        echo " <tr> 
                <td>$date</td>
                <td>$title</td>
                <td>$desc</td>
                    </tr>
                        ";
                    }
                }
                ?>

            </tbody>
        </table>

        <form class="has-text-centered" action="appointment.php" method="POST">

            <table class="table table-striped table-dark edittable">

                <h5 class='tableheading'>Enter Values Below</h5>
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><input class="form-control" data-date-format="dd/mm/yyyy" type="date" id='date'></td>
                        <td><textarea class='form-control' type="text" id="title"></textarea></td>
                        <td><textarea class='form-control' type="text" id="descript"></textarea></td>

                    </tr>
                </tbody>
            </table>
         
            <p> <input class="btn btn-outline-success editbutton" type="submit" id='edit' value="Edit"> </p>
            
         

            <p> <input class="btn btn-outline-danger removebutton" type="submit" id='remove' value="Remove"> </p>
            

        </form>
    </div>

    <script>
        $(document).ready(function() {

            $("#edit").on('click', function(e) {

                e.preventDefault();
                var remove = 0;
                var ID = <?php echo $rowId ?>;
                var date = $("#date").val();
                var title = $("#title").val();
                var descript = $("#descript").val();

                $.ajax({
                    url: "Ajax/appointmentajax.php",
                    type: "POST",
                    data: {
                        date: date,
                        title: title,
                        descript: descript,
                        ID: ID,
                        remove: remove

                    },
                    cache: false,
                    success: function(result) {
                        console.log("Success");
                        location.reload();
                    }
                })
            });
            $("#remove").on('click', function(e) {

                e.preventDefault();
                var remove = 1;
                var ID = <?php echo $rowId ?>;
                
                $.ajax({
                    url: "Ajax/appointmentajax.php",
                    type: "POST",
                    data: {
                        ID: ID,
                        remove: remove

                    },
                    cache: false,
                    success: function(result) {
                        console.log("Success");
                        window.location.href = "manageappointments.php";
                    }
                })
            });
        });
    </script>
</body>