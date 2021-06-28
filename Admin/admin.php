<?php
session_start();
$admin = $_SESSION['admin'];

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
  <link rel="stylesheet" href="../css/AdminCss/admin.css">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <title> <?php echo $admin ?>'s Dashboard</title>
</head>

<body>

  <div class='row header'>

    <div class='col text-info'>

      <h1>Welcome To Your Gymifi Dashboard <?php echo $admin ?></h1>
    </div>
    <div class='col-2'>

      <button class="btn btn-outline-danger logout" type="button"><a href="../logout.php">Log-Out</a></button>

    </div>
  </div>

  <div class="container-fluid text-info admin-container">
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
              <a href="../Client/index.php">Main Index</a>
            <li>
              <a href="registerclients.php">Register Clients</a>
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
              <a href="tracker.php">Manage History/Performance</a>
            </li>
          </ul>
        </div>

      </nav>

    </div>

    <div class="row ml-1">

      <h4>
        Lets get started <?php echo $admin ?>
      </h4>


    </div>

    <div class='icons'>
      <div class='row'>
        <div class='col-4 bg-dark'>
          <a href="registerclients.php">
            Register Clients

            <svg class="bi bi-person-plus" width="80%" height="80%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM6 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zm4.5 0a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z" clip-rule="evenodd" />
              <path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd" />
            </svg>

          </a>
        </div>
        <div class='col-4 bg-dark'>
          <a href="managecontent.php">
            Manage Content

            <svg class="bi bi-layout-text-window" width="80%" height="80%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd" />
              <path fill-rule="evenodd" d="M11 15V4h1v11h-1zm4.5-11H.5V3h15v1zM3 6.5a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm0 3a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm0 3a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>

        <div class='col-4 bg-dark'>
          <a href="tracker.php">
            Manage History/Performance

            <svg class="bi bi-gem" width="80%" height="80%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3.1.7a.5.5 0 01.4-.2h9a.5.5 0 01.4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 01-.8 0L.1 5.3a.5.5 0 010-.6l3-4zm11.386 3.785l-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004l.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495l5.062-.005L8 13.366 5.47 5.495zm-1.371-.999l-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l2.92-.003 2.193 6.82L1.5 5.5zm7.889 6.817l2.194-6.828 2.929-.003-5.123 6.831z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </div>

      <div class='row' style="height: 33%;">
        <div class='col-4 bg-dark'>
          <a href="manageclients.php">
            Manage Clients

            <svg class="bi bi-people" width="80%" height="80%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002.002zM11 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zM6.936 9.28a5.88 5.88 0 00-1.23-.247A7.35 7.35 0 005 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 015 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>

        <div class='col-4 bg-dark'>
          <a href="manageappointments.php?week=1">
            Manage Appointments

            <svg class="bi bi-calendar" width="80%" height="80%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd" />
              <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>

        <div class='col-4 bg-dark'>
          <a href="message.php">
            Message

            <svg class="bi bi-chat-square-dots" width="80%" height="80%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M0 2a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-2.5a1 1 0 00-.8.4l-1.9 2.533a1 1 0 01-1.6 0L5.3 12.4a1 1 0 00-.8-.4H2a2 2 0 01-2-2V2zm5 4a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm3 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </div>

    </div>

  </div>



  </div>

</body>

</html>