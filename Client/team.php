<?php
include("../conn.php");
session_start();
if (isset($_SESSION['name'])) {

  $name = $_SESSION['name'];
  $surname = $_SESSION['surname'];
  $confirmation = "Logged In as $name $surname";
} else {

  $confirmation = "";
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
  <link rel="stylesheet" href="../css/Css/team.css">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <title>Welcome!</title>
</head>

<body>

  <div class='row header'>

    <div class='col'>

      <h1 class = 'text-info'>Welcome To Gymifi</h1>

      <div class="confirm">

        <?php echo "<h4> <strong> $confirmation </strong> </h4>"; ?>
      </div>
    </div>
    <div class='col-2'>

      <button class="btn btn-outline-dark adbut" type="button">

        <a class='adminlink' href="../Admin/adminlogin.php">Admin</a>

      </button>
    </div>
  </div>

  <div class="container-fluid text-info index-container">
    <div class="row">

      <nav class="navbar navbar-dark bg-dark navbar-expand-md">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar1">


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
              <a href="signup.php">Sign-Up</a>
            </li>
            <li>
              <a href="dash.php">Dashboard</a>
            </li>
            <li>
              <a href="#">The Team</a>
            </li>
          </ul>
        </div>

      </nav>

    </div>
<?php

$query = "SELECT First_Name,Surname,Photo_Path,Photo_Name,Specialist_Areas,Bio From Gymifi_Coaches";

$result = $conn->query($query);

if(!$result) {
    $conn->error;
} else {

    while ($row=$result->fetch_assoc()) {

        $first =$row['First_Name'];
        $surname = $row['Surname'];
        $special = $row['Specialist_Areas'];
        $bio = $row['Bio'];
        $path = $row['Photo_Path'];
        $photoname = $row['Photo_Name'];

        echo "<div class='row'>
           <div class='col-6'>
           <h4 class='trainerhead'> $first $surname </h4>
           <p><strong> Specialist Area's:</strong></p>
           <p> $special </p>
           <p><strong> Bio: </strong></p>
           <p> $bio </p>
           </div>
           <div class='col-6'>
           <img class = biophotos src='$path' alt ='$photoname'>
           </div> 
        </div>";
    }

}


?>


</div>

</body>

</html>