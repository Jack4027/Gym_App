<?php
include("../conn.php");
session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];

if (!$name) {

  header("location: login.php");
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
  <link rel="stylesheet" href="../css/Css/dash.css">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <title> <?php echo $name ?>'s Dashboard</title>
</head>

<body>

  <div class='row header'>

    <div class='col'>

      <h1 class='text-info'>Welcome To Your Gymifi Dashboard <?php echo $name ?></h1>
    </div>
    <div class='col-2'>

      <button class="btn btn-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>

    </div>
  </div>

  <div class="container-fluid index-container">
    <div class="row">

      <nav class="navbar navbar-dark bg-dark navbar-expand-md">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar1">


          <ul class="navbar-nav mr-auto">
            <li>
              <a href="#">Dashboard</a>
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
              <a href="traininglog.php?logweek=1">Training-Log</a>
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

    <div class="row">

      <h4 class='text-info'>
        Hello <?php echo $name ?> what do you want to look at today?
      </h4>
    </div>

    <div class='icons'>
      <div class='row'>
        <div class='col-6 bg-dark'>
          <a href="coach.php">

            <img src="../img/img/maletrainer.jpg" alt="coach" class='coach'>
            <div class='link coac'>
              Your Coach
            </div>
          </a>
        </div>
        <div class='col-6 bg-dark'>
          <a href="fitnessschedule.php?week=1">

            <img src="../img/img/barbell.jpg" alt="schedule" class='schedule'>
            <div class='link schc'>
              Training Schedule
            </div>
          </a>
        </div>
      </div>

      <div class='row'>
        <div class='col-6 bg-dark'>
          <a href="traininglog.php?logweek=1">

            <img src="../img/img/log.jpg" alt="training-log" class='log'>
            <div class='link trc'>
              Training-Log
            </div>
          </a>
        </div>
        <div class='col-6 bg-dark'>
          <a href="personaldetails.php">

            <img src="../img/img/malepd2.jpg" alt="personal details" class='pd'>
            <div class='link perc'>
              Personal Details
            </div>
          </a>
        </div>
      </div>

    </div>

  </div>

</body>



</html>