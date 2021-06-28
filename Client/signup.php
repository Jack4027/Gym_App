<?php
session_start();
include("../conn.php");

if (isset($_SESSION['name'])) {

    header("location: dash.php");
} else {
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
    <link rel="stylesheet" href="../css/Css/signup.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Sign-Up</title>

    <script>
      
        $(document).ready(function() {

            $("#form").on("click", function(e) {
             
                var first = $('#first').val();
                var surname = $('#surname').val();
                var address = $('#address').val();
                var postcode = $('#postcode').val();
                var contact = $('#contact').val();
                var email = $('#email').val();
                var password = $('#password').val();


                if ((!first)||(!surname)||(!address)||(!postcode)||(!contact)||(!email)||(!password)) {
                    alert("Missing Field");
                }


            });
        });
    </script>
</head>

<body>

    <div class='header'>

        <h1 class='text-info'>Welcome To Gymifi</h1>

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
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="#">Sign-Up</a>
                        </li>

                        <li>
                            <a href="team.php">The Team</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="row sign-uphead">

            <h2 class='text-info'> Sign Up Below:</h2>

        </div>

        <div class="row data">

            <div class="col sign-uphead">
                <h5>First Name: </h5>

            </div>
            <div class="col-8 sign-up">

                <form class="sign-upform" method='POST' action='signup.php'>

                    <input class="form-control" type="text" id='first' name='name'>

            </div>

        </div>



        <div class="row data">

            <div class="col sign-uphead">
                <h5>Last Name:</h5>

            </div>

            <div class="col-8 sign-up">
                <input class="form-control" type="text" id='surname' name='surname'>

            </div>
        </div>


        <div class="row data">

            <div class="col sign-uphead">
                <h5>Address:</h5>

            </div>
            <div class="col-8 sign-up">
                <input class="form-control" type="text" id='address' name='address'>

            </div>

        </div>


        <div class="row data">

            <div class="col sign-uphead">
                <h5>Postcode:</h5>

            </div>
            <div class="col-8 sign-up">
                <input class="form-control" type="text" id='postcode' name='post'>

            </div>
        </div>

        <div class="row data">

            <div class="col sign-uphead">
                <h5>Contact Number:</h5>

            </div>

            <div class="col-8 sign-up">

                <input class="form-control" type="text" id='contact' name='contact'>

            </div>

        </div>
 
        <div class="row data">

            <div class="col sign-uphead">
                <h5>Email:</h5>

            </div>
            <div class="col-8 sign-up">
                <input class="form-control" type="text" id='email' name='email'>

            </div>
        </div>


        <div class="row text-info data">

            <div class="col sign-uphead">
                <h5>Password:</h5>

            </div>
            <div class="col-8 sign-up">
                <input class="form-control" type="text" id='password' name='password'>

            </div>

        </div>


        <div class="row data">

            <div class="col sign-uphead">
                <h5>Gender:</h5>

            </div>
            <div class="col-8 sign-up">

                <select class="gender-select" name="gendersel">

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

                <select class="goal-select" name="fitness-goal">
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


                <p> <input class="btn btn-outline-success formbutton" id="form" type="submit" name='form' value="Sign-Up"> </p>

                </form>
            </div>

        </div>

    </div>
    <?php

    if (
        !empty($_POST['form']) && !empty($_POST['name']) && !empty($_POST['gendersel']) && !empty($_POST['address'])
        && !empty($_POST['post']) && !empty($_POST['contact']) && !empty($_POST['surname']) &&
        !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['fitness-goal'])
    ) {

        $name = trim($_POST['name']);
        $gender = $_POST['gendersel'];
        $address = $_POST['address'];
        $postcode = $_POST['post'];
        $telephone = trim($_POST['contact']);
        $surname = trim($_POST['surname']);
        $password = $_POST['password'];
        $email = trim($_POST['email']);
        $goal = $_POST['fitness-goal'];

        $_SESSION['goalId'] = $goal;
        
        $_SESSION['name'] = trim($_POST['name']);
        $_SESSION['surname'] = trim($_POST['surname']);
       
       if ($gender = 1) {
            if ($goal = 1) {
                $coach = 5;
            } else if ($goal = 2) {
                $coach = 6;
            } else if ($goal = 3) {
                $coach = 1;
            }
        } else if ($gender = 2) {
            if ($goal = 1) {
                $coach = 2;
            } else if ($goal = 2) {
                $coach = 4;
            } else if ($goal = 3) {
                $coach = 3;
            }
        }
        
        $_SESSION['coachId'] = $coach;

        $queryCN = "SELECT First_Name FROM Gymifi_Coaches Where Id='$coach' ";

        $resultCN = $conn->query($queryCN);
      
        while($rowCN=$resultCN->fetch_assoc()) {
      
          $coachfirst = $rowCN['First_Name'];
      
          $_SESSION['coach_first']=$coachfirst;
        }

        $insertdetails = "INSERT INTO Gymifi_User_Details (First_Name_Client,Surname_Client,Gender,Address,Postcode,Contact_Number,
            Password,Email,Fitness_Goal,Coach,Logged_In) VALUES ('$name','$surname','$gender','$address','$postcode','$telephone',
    '$password','$email','$goal','$coach',true)";


$result = $conn->query($insertdetails);

if (!$result) {
    echo $conn->error;
} else {
    
    $query2 = "SELECT ID FROM Gymifi_User_Details WHERE Email = '$email' ";
        
    $result2 = $conn->query($query2);
    
    while ($row2 = $result2->fetch_assoc()) {
        $id = $row2['ID'];
        $_SESSION['id'] = $id;
    }
            $id = $_SESSION['id'];
            $LogInIns = "INSERT INTO Gymifi_Login_Table (Coach,User) VALUES (null,'$id')";

            $result5 = $conn->query($LogInIns);
        }

       
    } else {
    }
    ?>

    </div>



</body>

</html>