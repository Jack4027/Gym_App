<?php
session_start();



if (isset($_SESSION['name'])) {

    header("location: ../Client/index.php");
};

if(isset($_SESSION['admin'])) {

    header ("location: admin.php");
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
    <link rel="stylesheet" href="../css/AdminCss/admin.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Log-In</title>
</head>

<body>

    <div class='header text-info'>

        <h1>Admin Login</h1>
    </div>
    <div class="container-fluid text-info adlogcontainer">

        <div class="row">
            <nav class="navbar navbar-dark bg-dark navbar-expand-md">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbar1">


                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a href="../Client/index.php">Home</a>
                        </li>
                        <li>
                            <a href="../Client/about.php">About</a>
                        </li>
                        <li>
                            <a href="../Client/login.php">Login</a>
                        </li>
                        <li>
                            <a href="../Client/signup.php">Sign-Up</a>
                        </li>
                        <li>
                            <a href="../Client/dash.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="../ / ">The Team</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="row adloghead">

            <h2> Enter Admin Login Details Below:</h2>

        </div>

        <div class="row">

            <div class="col adloghead">
                <h3>Username: </h3>

            </div>
            <div class="col-9 adlogin">

                <form class="has-text-centered" method='POST' action='adminlogin.php'>

                    <input class="form-control" type="text" id ="email" name='aduser'>

            </div>

        </div>

        <div class="row">

            <div class="col adloghead">
                <h3>Password:</h3>

            </div>
            <div class="col-9 adlogin">
                <input class="form-control" type="password" id="password" name='pass'>

            </div>
        </div>

        <div class="row">

            <div class="col adloghead">
                <h3>Admin-Key: </h3>

            </div>
            <div class="col-9 adlogin">

                <input class="form-control" type="text" id="key" name='adkey'>

                <p> <input class="btn btn-outline-danger formbutton" id="form" type="submit" value="Admin Log-In" 
                name='adLog-In'></p>

                </form>
            </div>

        </div>
    </div>

    <?php

include("../conn.php");

    if (isset($_POST['adLog-In'])) {

        $email = $conn->real_escape_string(trim($_POST['aduser']));
        $password = $conn->real_escape_string($_POST['pass']);
        $key = $conn->real_escape_string(trim($_POST['adkey']));

        $auth = "SELECT * FROM Gymifi_Coaches WHERE Email = '$email' AND Password ='$password' 
        AND Admin_Key = '$key' ";
       // SELECT * FROM Gymifi_Coaches WHERE Email = 'chrisG@gymifi.co.uk' AND Password='Chris12' 
       //AND Admin_Key = 'UI8754311';
        $result = $conn->query($auth);

            $numrows = $result->num_rows;

            if ($numrows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $admin = $row['First_Name'];
                    $adminsur = $row['Surname'];
                    $adminId = $row['Id'];
                    $_SESSION['admin'] = $admin;
                    $_SESSION['adminsur'] =$adminsur;
                    $_SESSION['adminId']=$adminId;
                    
                }
                $adminId = $_SESSION['adminId'];
                
                $LogInToTrue = "UPDATE Gymifi_Coaches SET Logged_In = true WHERE Id = '$adminId' ";

                $result2 = $conn->query($LogInToTrue);

                $LogInIns = "INSERT INTO Gymifi_Login_Table (Coach,User) VALUES ('$adminId',null)";

                $result3 = $conn->query($LogInIns);

                header("location: admin.php");
            } else {

                echo "<p class = 'text-danger ml-4'><strong>Incorrect Log-In Details.</strong> </p>";
            }
    }

    // $name = &conn->real_escape_string (trim($_POST['username']));
    ?>
    <script>
      
      $(document).ready(function() {

          $("#form").on("click", function(e) {
           
              var email = $('#email').val();
              var password = $('#password').val();
              var key2 = $('#key').val();
              if ((!email)||(!password)||(!key2)) {
                  alert("You are Missing a Field.");
              }

          });
      });
  </script>




</body>

</html>