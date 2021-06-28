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
  <link rel="stylesheet" href="../css/Css/classes.css">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title> Classes </title>
</head>

<body>

  <div class='row header'>

    <div class='col'>

      <h1 class='text-info'>Welcome To The Class Listings <?php echo $name ?></h1>
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
              <a href="dash.php">Dashboard</a>
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
              <a href="#">Classes</a>
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


          <?php

          $query = "SELECT * FROM Gymifi_Classes";

          $result = $conn->query($query);


          while ($row = $result->fetch_assoc()) {

            $classid = $row['Id'];
            $class = $row['Class'];
            $author = $row['Author'];
            $size = $row['Size'];
            $datetimeorg = $row['DateTime'];
            $datetime = date("d-m-Y H:i", strtotime($datetimeorg));
            $duration = $row['Duration'];


           echo "<table class='table table-striped table-dark classestable'>
            <thead>
              <tr>
                <th scope='col'>Class ID</th>
                <th scope='col'>Class</th>
                <th scope='col'>Instructor</th>
                <th scope='col'>Size</th>
                <th scope='col'>Date/Time</th>
                <th scope='col'>Duration</th>
                <th scope='col'>Join</th>
    
              </tr>
            </thead>
            <tbody>";
            echo "<tr>
            <form class='has-text-centered' method='POST' action='classes.php'>
             <th scope='row' id='classidajax'><strong>$classid</strong></th></div>
              <td><strong>$class</strong></td>
              <td>$author</td>
              <td>$size</td>
              <td>$datetime</td>
              <td>$duration</td>
              <td>
              <strong><p> <input class='btn btn-outline-success joinbtn' type='submit' aria-hidden='true' value='Join' name='join'></p></strong>
              <strong><p> <input class='btn btn-outline-danger leavebtn' type='submit' aria-hidden = 'true' value='Leave' name='leave'></p></strong>
              </form>
              
              ";


            $query2 = "SELECT * FROM Gymifi_Class_Takers WHERE Class = '$classid' AND Taker = '$id' ";

            $result2 = $conn->query($query2);

            $numrows =  $result2->num_rows;

            if ($numrows > 0) {
              echo "<p class = 'text-success'> <strong> You are part of this Class.</strong></p> </td></tr> ";
            } else {
              echo "<p class = 'text-danger'> <strong> You haven't joined this Class.</strong></p> </td></tr> ";
            }
          }



          ?>

        </tbody>
      </table>


    </div>

  </div>

  <script>
    $(document).ready(function() {

      $(".joinbtn").on('click', function(e) {

        e.preventDefault();
        console.log('java');

        var classajax = $(this).closest('table').find("#classidajax").text();
        var userajax = <?php echo $id ?>;
        var remove = 0;
        $.ajax({
          url: "Ajax/classesajax.php",
          type: "POST",
          data: {
            class: classajax,
            user: userajax,
            remove: remove
          },
          cache: false,
          success: function(resultajax) {
            console.log("success");
            location.reload();
          }
        });
      });

      $(".leavebtn").on('click', function(e) {

        e.preventDefault();

        var classajax = $(this).closest('table').find("#classidajax").text();
        var userajax = <?php echo $id ?>;
        var remove = 1;

        $.ajax({
          url: "Ajax/classesajax.php",
          type: "POST",
          data: {
            class: classajax,
            user: userajax,
            remove: remove
          },
          cache: false,
          success: function(resultajax) {
            console.log("success");
            location.reload();
          }
        });
      });

    });
  </script>
</body>




</html>