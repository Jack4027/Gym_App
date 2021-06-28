<?php
session_start();

include("../conn.php");
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
    <link rel="stylesheet" href="../css/AdminCss/registerclients.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Register Clients</title>
</head>

<script>
    $(document).ready(function() {

        $(".formbutton").on("click", function(e) {

            var name = $("#name").val();
            var surname = $("#surname").val();
            var address = $("#address").val();
            var postcode = $("#postcode").val();
            var gend = $("#gend").val();
            var contact = $("#contact").val();
            var email = $("#email").val();
            var goal = $("#goal").val();

            if ((!name) || (!surname) || (!address) || (!postcode) || (!contact) || (!email)) {

                alert("Missing Field");
            }

        });
    });
</script>

<body>

    <div class='row header'>
        <div class='col text-info'>

            <h1>Who would you like to register <?php echo $admin ?>? </h1>
        </div>
        <div class='col-2'>
            <button class="btn btn-outline-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>
        </div>
    </div>

    <div class="container-fluid text-info sign-upcontainer">
        <div class="row">
            <nav class="navbar navbar-dark bg-dark navbar-expand-md">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbar1">


                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a href="admin.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="../Client/index.php">Main Index</a>
                        <li>
                            <a href="#">Register Clients</a>
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
                            <a href="tracker.php">Manage History</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="row sign-uphead">

            <h2 class='text-info'> Register Client:</h2>

        </div>

        <div class="row data">

            <div class="col sign-uphead">
                <h5>First Name: </h5>

            </div>
            <div class="col-8 sign-up">

                <form class="sign-upform" method='POST' action='registerclients.php'>

                    <input class="form-control" id='name' type="text" name='name'>

            </div>

        </div>


        <div class="row data">

            <div class="col sign-uphead">
                <h5>Last Name:</h5>

            </div>

            <div class="col-8 sign-up">
                <input class="form-control" id='surname' type="text" name='surname'>


            </div>
        </div>

        <div class="row data">

            <div class="col sign-uphead">
                <h5>Address:</h5>

            </div>
            <div class="col-8 sign-up">
                <input class="form-control" id='address' type="text" name='address'>


            </div>

        </div>

        <div class="row data">

            <div class="col sign-uphead">
                <h5>Postcode:</h5>

            </div>
            <div class="col-8 sign-up">
                <input class="form-control" id='postcode' type="text" name='post'>


            </div>
        </div>
        <div class="row data">

            <div class="col sign-uphead">
                <h5>Contact Number:</h5>

            </div>

            <div class="col-8 sign-up">

                <input class="form-control" id='contact' type="text" name='contact'>

            </div>

        </div>

        <div class="row data">

            <div class="col sign-uphead">
                <h5>Email:</h5>

            </div>
            <div class="col-8 sign-up">
                <input class="form-control" id='email' type="text" name='email'>

            </div>
        </div>


        <div class="row data">

            <div class="col sign-uphead">
                <h5>Gender:</h5>

            </div>
            <div class="col-8 sign-up">

                <select class="gender-select" id='gend' name="gendersel">

                    <?php

                    $query4 = "SELECT * FROM Gender_ID";
                    $result4 = $conn->query($query4);

                    while ($row4 = $result4->fetch_assoc()) {
                        $idgend = $row4['Id'];
                        $gend = $row4['Gender'];

                        echo "<option value='$idgend'>$gend</option>";
                    }

                    ?>

                </select>
            </div>
        </div>
        <div class="row data">

            <div class="col sign-uphead">
                <h5>Fitness Goals:</h5>

            </div>
            <div class="col-8 sign-up">

                <select class="goal-select" id='goal' name="fitness-goal">
                    <?php

                    $query3 = "SELECT * FROM Gymifi_Fitness_Goals";
                    $result3 = $conn->query($query3);

                    while ($row3 = $result3->fetch_assoc()) {
                        $iddata = $row3['Id'];
                        $goaldata = $row3['Fitness_Goal'];

                        echo "<option value='$iddata'>$goaldata</option>";
                    }

                    ?>

                </select>


                <p> <input class="btn btn-outline-success formbutton" type="submit" name='form' value="Sign-Up"> </p>

                </form>
            </div>

        </div>

    </div>

    <?php


    if (
        isset($_POST['form']) && !empty($_POST['name'])  && !empty($_POST['address'])
        && !empty($_POST['post']) && !empty($_POST['contact']) && !empty($_POST['surname']) && !empty($_POST['email'])
    ) {

      
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $gender = $_POST['gendersel'];
        $address = $_POST['address'];
        $postcode = $_POST['post'];
        $telephone = trim($_POST['contact']);
        $email = $conn->real_escape_string($_POST['email']);
        $goal = $_POST['fitness-goal'];

        $insert = "INSERT INTO Gymifi_User_Details (First_Name_Client,Surname_Client,Gender,Address,Postcode,Contact_Number,
          Password,Email,Fitness_Goal,Coach,Logged_In) VALUES ('$name','$surname','$gender','$address','$postcode','$telephone',
  'Gymifi','$email','$goal','$adminId','0') ";


        $result = $conn->query($insert);

        if (!$result) {
            echo $conn->error;
        } else {
            echo "<p class= 'text-success'><strong> $name Added.</strong></p>";
        }
    } else {
    }
    ?>

    </div>


</body>

</html>