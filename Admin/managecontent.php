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
  <link rel="stylesheet" href="../css/AdminCss/colour.css">
  <link rel="stylesheet" href="../css/AdminCss/managecontent.css">
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

      <h1>Manage Your Content <?php echo $admin ?></h1>
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
              <a href="admin.php">Dashboard</a>
            </li>
            <li>
              <a href="../Client/index.php">Main Index</a>
            <li>
              <a href="registerclients.php">Register Clients</a>
            </li>
            <li>
              <a href="#">Manage Content</a>
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

    <div class='row'>

      <div class='col-4'>
        <a href="addclass.php"><div id = 'addlink'>add class</div>
          <svg class="bi bi-plus addc" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">

            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
      <div class="col-4">
        <a href="subclass.php"><div id='remlink'>remove class</div>

          <svg class="bi bi-dash subc" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"></path>
        </svg>
      </a>
      </div>
      <div class="col-4">
        <a href="editinfo.php"><div id='editlink'>edit personal</div>

          <svg class="bi bi-person-square pers" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"></path>
          <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
        </svg>
      </a>
      </div>
    </div>
  </div>
</body>

</html>