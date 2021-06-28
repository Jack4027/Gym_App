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
    <link rel="stylesheet" href="../css/AdminCss/manageappointments.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title> <?php echo $admin ?>'s Dashboard</title>
</head>

<body>

    <div class='row header'>

        <div class='col text-info'>

            <h1><?php echo $admin ?>'s Calendar</h1>
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
                            <a href="#">Manage Appointments</a>
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

        <div id="caleandar">

        </div>
        
        <link rel="stylesheet" href="caleandar/css/theme2.css">
        
        <script src="caleandar/js/caleandar.js"></script>
        
        <?php

$query = "SELECT * FROM Gymifi_Coaches_Appointments WHERE Coach = '$adminId' ";

$result = $conn->query($query);

?>


<script>
    
    <?php

echo "var events = [";

while ($row = $result->fetch_assoc()) {
    
    $ID = $row['ID'];
    $Title = $row['Title'];
    $Day = $row['Date'];
    
    $newDay = date('Y,m-1,d', strtotime($Day));
    
    echo " {
        'Date': new Date($newDay),
        'Title': '$Title',
        'Link': 'appointment.php?rowId=$ID'
    },";
}

echo "];";

?>

var settings = {
    Color: '',
    LinkColor: '',
    NavShow: true,
    NavVertical: false,
    NavLocation: '',
    DateTimeShow: true,
    DateTimeFormat: 'mmm, yyyy',
    DatetimeLocation: '',
    EventClick: '',
    EventTargetWholeDay: false,
    DisabledDays: [],
    
};

var element = document.getElementById('caleandar');
caleandar(element, events, settings);


</script>


<style>
    .cld-main {
        height: 100%;
        width: 100%;
    }
    </style>
    
</div>

<div class = 'row'>

<div class = 'col'>
</div>

<div class = 'col-8'> 
<form class="has-text-centered" action="appointment.php" method="POST">

<table class="table table-striped table-dark edittable">

    <h5 class='tableheading mt-5 text-info'>Enter a Date for your Diary</h5>
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
<p> <input class="btn btn-outline-success insertbtn" type="submit" id='insert' value="Insert"> </p>

</form>
</div>
<div class='col'></div>
</div>

<script>

$(document).ready(function() {

    $("#insert").on('click',function(e){

        e.preventDefault();
        var coach = <?php echo $adminId ?>;
        var date = $("#date").val();
        var title = $("#title").val();
        var descript = $("#descript").val();

        $.ajax({
            url: "Ajax/insertappointmentajax.php",
            type: "POST",
            data: {
                date: date,
                title: title,
                descript: descript,
                coach: coach
                
            },
            cache: false,
            success: function (result) {
                console.log("Success");
                location.reload();
            }
        })
    });
});
</script>
</body>


</html>