<?php
session_start();
include("../conn.php");

$admin = $_SESSION['admin'];
$adminId= $_SESSION['adminId'];
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
    <link rel="stylesheet" href="../css/AdminCss/managecontent.css">
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

            <h1>Manage Your Content <?php echo $admin ?></h1>
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

            <div class='col-4'>
                <h3>Enter Class Details:</h3>
            </div>
            <div class='col-8'>

                <form class="has-text-centered" method='POST' action='addclass.php'>

            </div>
        </div>
        <div class='row'>

            <div class='col-4'>
                <h5>Sport</h5>
            </div>
            <div class='col-8'>
                <input class="form-control" type="text" name='sport'>
            </div>
        </div>
        <div class='row'>

            <div class='col-4'>
                <h5>Size</h5>
            </div>
            <div class='col-8'>
                <input class="form-control" type="text" name='size'>
            </div>
        </div>
        <div class='row'>

            <div class='col-4'>
                <h5>Date/Time</h5>
            </div>
            <div class='col-8'>
                <div class = 'input-group date' id='datepicker'>
                <input class="form-control" data-date-format="dd/mm/yyyy hh:mm" type="datetime-local" name='datetime'>
        </div>
            </div>
        </div>
        <div class='row'>

            <div class='col-4'>
                <h5>Duration</h5>
            </div>
            <div class='col-8'>

                    <input class= 'form-control'  type="text" name='duration'>
                
                <p> <input class="btn btn-outline-success photobutton" type="submit" value="Insert" name='addclass'></p>
            </div>
        </div>

        <?php
            if(isset($_POST['addclass'])) {

                $sport = $conn->real_escape_string($_POST['sport']);
                $size = $conn->real_escape_string($_POST['size']);
                $datetime = $conn->real_escape_string($_POST['datetime']);
                $duration = $conn->real_escape_string($_POST['duration']);

                $query = "INSERT INTO Gymifi_Classes (Class,Author,Size,DateTime,Duration) VALUES 
                ('$sport','$adminId','$size','$datetime','$duration') ";

                $result = $conn->query($query);

                if(!$result) {
                    $conn->error;
                } else {
                    echo "<p class = 'text-success'><strong> $sport Added</strong></p>";
                }
            }
        ?>
    </div>
</body>

</html>