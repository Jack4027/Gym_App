<?php

session_start();

if (isset($_SESSION['name'])) {

  $name = $_SESSION['name'];
  $surname = $_SESSION['surname'];
  $confirmation = "Logged In as $name $surname";
} else {

  $confirmation = "";
}

if(isset($_SESSION['admin'])) {

$adminfirst = $_SESSION['admin'] ;
$adminsur = $_SESSION['adminsur'] ;

$adminconf = "Logged In as Admin: $adminfirst $adminsur";

} else {
  $adminconf = "";
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
  <link rel="stylesheet" href="../css/Css/index.css">
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

      <div class="adminconfirm text-danger">

      <?php echo "<h4> <strong> $adminconf </strong> </h4>"; ?>

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
              <a href="#">Home</a>
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
              <a href="team.php">The Team</a>
            </li>
          </ul>
        </div>

      </nav>

    </div>

    <div class="row text-dark">
      <div class="col">
        <h4>
          Welcome To Gymifi the Online Web App For Building the Best You
        </h4>

        <p> Here at Gymifi we will show you what your capable of doing and support you every step of the way. </p>

        <p> We provide personalised training programs from experienecd professioals who really care for their clients, this includes fitness guidelines,
          mental wellness guidelines, Eating guidelines as well as motivation for all of these practices. With their help and your commitment we promise
          you proper chaneg in your life. </p>

        <p>
          When you sign up you will have a core program designed to achieve your personal fitness goals as well as the option to join
          any of our numerous health classes in various sports. Whether you are an experienced pro or a complete novice here we want
          to make exercise as enjoyable and as bonding as we can so we encourage these classes on all of our members as they are great
          fun and an excellent way to indulge in exercise.

        </p>

        <p><strong>Your Journey Starts Here......<button class="btn btn-outline-success sign-up-btn" type="button"><a href="signup.php">Sign-Up</a></button></strong></p>

        <img class="image1" src="../img/img/pacquiao.jpg" alt="Pacquiao">


      </div>
      <div class="col-3 ">

        <img class="image2" src="../img/img/gymifi-index.jpg" alt="Deadlift">
        <img class="image2" src="../img/img/boxing.jpg" alt="Motivation">

      </div>
    </div>




  </div>

</body>

</html>