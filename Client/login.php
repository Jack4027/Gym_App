<?php
session_start();

if (isset($_SESSION['name'])) {

    header("location: dash.php");
};

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
    <link rel="stylesheet" href="../css/Css/login.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      
        $(document).ready(function() {

            $("#form").on("click", function(e) {
             
                var email = $('#email').val();
                var password = $('#password').val();

               

                if ((!email)||(!password)) {
                    alert("Missing Email And/Or Password");
                }

            });
        });
    </script>
    <title>Log-In</title>
</head>

<body>

    <div class='header text-info'>

        <h1>Login</h1>
    </div>
    <div class="container-fluid text-info logcontainer">

        <div class="row">
            <nav class="navbar navbar-dark bg-dark navbar-expand-md">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbar1">


                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
                        <li>
                            <a href="#">Login</a>
                        </li>
                        <li>
                            <a href="signup.php">Sign-Up</a>
                        </li>
                        <li>
                            <a href="team.php">The Team</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="row loghead">

            <h2> Enter Login Details Below:</h2>

        </div>

        <div class="row">

            <div class="col loghead">
                <h3>Username: </h3>

            </div>
            <div class="col-9 login">

                <form class="has-text-centered" method='POST' action='login.php'>

                    <input class="form-control" type="text" id="email" name='userLog-In'>

            </div>

        </div>

        <div class="row">

            <div class="col loghead">
                <h3>Password:</h3>

            </div>
            <div class="col-9 login">
                <input class="form-control" type="password" id="password" name='passLog-In'>

                <p> <input class="btn btn-outline-success formbutton" id="form" type="submit" value="login" name='Log-In'> </p>

                </form>
            </div>
        </div>
    </div>

    <?php

    include("../conn.php");

    if (isset($_POST['Log-In'])) {

        $email = $conn->real_escape_string(trim($_POST['userLog-In']));

        $passw = $conn->real_escape_string($_POST['passLog-In']);

        // echo "<p> $username $passw </p>";

        $auth = "SELECT * FROM Gymifi_User_Details WHERE Email = '$email' AND Password = '$passw' ";
        // SELECT * FROM `Gymifi_User_Details` WHERE Email = 'john@gmail.com' AND Password = 'john1234';

        $result = $conn->query($auth);

        $numrows = $result->num_rows;

        if ($numrows > 0) {

            while ($row = $result->fetch_assoc()) {

                $name = $row['First_Name_Client'];
                $surname=$row['Surname_Client'];
                $iddata = $row['ID'];
                $coachID = $row['Coach'];
                $goalId = $row['Fitness_Goal'];
                $_SESSION['name'] = $name;
                $_SESSION['surname']=$surname;
                $_SESSION['id'] = $iddata;
                $_SESSION['coachId'] = $coachID;
                $_SESSION['goalId'] = $goalId;
                
            }

            $id = $_SESSION['id'];

            $LogInToTrue = "UPDATE Gymifi_User_Details SET Logged_In = true WHERE ID ='$id' ";

            $result2 = $conn->query($LogInToTrue);

            $LogInIns = "INSERT INTO Gymifi_Login_Table (Coach,User) VALUES (null,'$id')";

            $result3 = $conn->query($LogInIns);

            header("location: dash.php");

            $queryCN = "SELECT First_Name FROM Gymifi_Coaches Where Id='$coachID' ";

            $resultCN = $conn->query($queryCN);
          
            while($rowCN=$resultCN->fetch_assoc()) {
          
              $coachfirst = $rowCN['First_Name'];
          
              $_SESSION['coach_first']=$coachfirst;
            }
            //echo "<p> $auth</p>";
            //echo "<p> number of rows: $numrows</p>";
        }

        echo "<p class = 'text-danger ml-4'> <strong> Incorrect Email or Password.</strong> </p>";
    }

    ?>



</body>

</html>