<?php

session_start();
if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
  $surname = $_SESSION['surname'];
  $confirmation = "Logged In as $name $surname";
} else {

  $confirmation = "";
}
if (isset($_SESSION['admin'])) {

  $adminfirst = $_SESSION['admin'];
  $adminsur = $_SESSION['adminsur'];

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
  <link rel="stylesheet" href="../css/Css/about.css">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <title>About Gymifi</title>
</head>

<body>

  <div class='text-info header'>

    <h1>About Gymifi</h1>

    <div class="confirm">

      <?php echo "<h4> <strong> $confirmation </strong> </h4>"; ?>
    </div>
    
    <div class="adminconfirm text-danger">

      <?php echo "<h4> <strong> $adminconf </strong> </h4>"; ?>

    </div>
  </div>

  <div class="container-fluid text-info about-container">
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
              <a href="#">About</a>
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

    <div class='row text-dark'>
      <div class='col'>
        <p id='about'>Gymifi is a group of professional sport and fitness coaches who specialise in delivering
          high quality fitness regimes and support for clients in order to provide a top quality service.
          All of our coaches are passionate about sport and exercise so we hope that this enthusiasm will rub
          off on you.
        </p>
        <p>If you have any questions regarding what we do or the support that we provide please do not hesitate
          to contact us below.
        </p>
        <p>We hope to see you soon. Gymifi.</p>
      </div>
      <div class='col-2'>


      </div>
    </div>
    <div class='row text-dark'>
      <div class="col-12 col-sm-9 col-md-6 border border-info rounded-pill bord">

        <div class='content'>

          <h4 id="contact-head">Contact Details:</h4>

          <ul id='contact'>
            <li>Telephone : 02890787554</li>
            <li>Email : support@gymifi.co.uk</li>
            <li>Address: 97 Minope Road, Belfast</li>
            <li>Postcode: BT2 9YY</li>
          </ul>
        </div>

      </div>

      <div class='col'>


      </div>
    </div>
  </div>










</body>

</html>