<?php
session_start();
include("../conn.php");
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (!$name) {

  header("location: login.php");
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

  <script>

    $(document).ready(function(){

      $(".editbutton").on('click',function(e){

        var name = $("#name").val();
        var surname = $("#surname").val();
        var address = $("#address").val();
        var postcode = $("#postcode").val();
        var contact = $("#contact").val();

        if((!name)||(!surname)||(!address)||(!postcode)||(!contact)){

          alert("Missing Field");
        }
      });
    });
  </script>
</head>

<body>

  <div class='row header'>

    <div class='col text-info'>

      <h1>Welcome To Your Personal Details <?php echo $name ?></h1>
    </div>
    <div class='col-2'>

      <button class="btn btn-outline-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>

    </div>
  </div>

  <div class="container-fluid text-dark index-container">
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
              <a href="classes.php">Classes</a>
            </li>
            <li>
              <a href="clientgroup.php">Groups</a>
            </li>
            <li>
              <a href="#">Personal Details</a>
            </li>
            <li>
              <a href="yourperformance.php?week=1">Your Performance</a>
            </li>

          </ul>
        </div>

      </nav>

    </div>
    <?php

    $query = "SELECT Gymifi_User_Details.First_Name_Client,Gymifi_User_Details.Surname_Client,Gymifi_User_Details.Address,Gymifi_User_Details.Postcode,Gymifi_User_Details.Contact_Number,Gymifi_User_Details.Password
,Gymifi_User_Details.Email,Gymifi_Fitness_Goals.Fitness_Goal FROM Gymifi_User_Details INNER JOIN Gymifi_Fitness_Goals ON Gymifi_User_Details.Fitness_Goal=Gymifi_Fitness_Goals.Id 
WHERE Gymifi_User_Details.ID='$id' ";

    $result = $conn->query($query);

    if (!$result) {
      echo $conn->error;
    } else {

      $numrows = $result->num_rows;

      if ($numrows > 0) {

        while ($row = $result->fetch_assoc()) {
          $name = $row['First_Name_Client'];
          $surname = $row['Surname_Client'];
          $address = $row['Address'];
          $post = $row['Postcode'];
          $telephone = $row['Contact_Number'];
          $email = $row['Email'];
          $goal = $row['Fitness_Goal'];
        }
        echo " 
<div class = 'row mb-3'>
<div class = 'col-3 text-info'>
<h3> Personal Details</h3>
</div>
<div class = 'col-9 text-info'>
<h3> Enter Updated Values </h3>
</div>
</div>
<div class = 'row mb-3'>
<div class = 'col-3'>
<p>First Name: $name</p>
</div>
<div class= 'col-9'>
<form class = 'edit-form' method='POST' action='personaldetails.php'>

<input class='form-control' type='text' name='editname' id='name'>

</div>
</div>
<div class = 'row mb-3'>

<div class='col-3'>
<p>Surname: $surname</p>
</div>
<div class='col-9'>
<input class='form-control' type='text' name='editsurname' id='surname'>
</div>
</div>
<div class = 'row mb-3'>
<div class = 'col-3'>
<p>Address: $address</p>
</div>
<div class ='col-9'>
<input class='form-control' type='text' name='editaddress' id='address'>
</div>
</div>
<div class = 'row mb-3'>
<div class = 'col-3'>
<p>Postcode: $post</p>
</div>
<div class = 'col-9'>
<input class='form-control' type='text' name='editpost' id='postcode'>
</div>
</div>
<div class = 'row mb-3'>
<div class = 'col-3'>
<p>Contact: $telephone</p>
</div>
<div class = 'col-9'>
<input class='form-control' type='text' name='editphone' id='contact'>
</div>
</div>
<div class = 'row mb-3'>
<div class = 'col-3'>
<p>Fitness Goal: $goal</p>
</div>
<div class = 'col-9'>
<select class='goal-edit' name='editgoal'>";


        $goals = "SELECT * FROM Gymifi_Fitness_Goals";
        $result = $conn->query($goals);
        while ($row = $result->fetch_assoc()) {
          $iddata = $row['Id'];
          $goaldata = $row['Fitness_Goal'];

          echo "<option value ='$iddata'> $goaldata</option>";
        }
        echo "
</select>
</div>
</div>
<div class = 'row ml-2'>
<p> <input class='btn btn-outline-success editbutton' type='submit' name='edit' value='Edit Data'> </p>
</div>
</form>";
      }
    }
    ?>

    <?php
    if ((isset($_POST['edit']))&&(!empty($_POST['editname']))&&(!empty($_POST['editsurname']))&&(!empty($_POST['editpost']))
    &&(!empty($_POST['editphone']))) {

      $ename = $_POST['editname'];
      $esurname = $_POST['editsurname'];
      $eaddress = $_POST['editaddress'];
      $epost = $_POST['editpost'];
      $ephone = $_POST['editphone'];
      $egoal = $_POST['editgoal'];

      $query2 = "UPDATE Gymifi_User_Details SET First_Name_Client='$ename',Surname_Client='$esurname',Address='$eaddress',
        Postcode='$epost',Contact_Number='$ephone', Fitness_Goal='$egoal' WHERE ID='$id' ";

      $result2 = $conn->query($query2);

      if (!$result2) {
        $conn->error;
      } else {
        echo "<strong><p style= color:'green'> Personal Details Updated </p></strong>";
      }
    }

    ?>

  </div>
</body>

</html>