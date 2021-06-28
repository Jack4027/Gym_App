<?php
include("../conn.php");
session_start();
$admin = $_SESSION['admin'];
$adminId = $_SESSION['adminId'];
$groupId = $_GET["groupId"];

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
    <link rel="stylesheet" href="../css/AdminCss/message.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title> <?php echo $admin ?>'s Window</title>
</head>

<body>

    <div class='row header'>

        <div class='col text-info'>

            <h1>Hello <?php echo $admin ?> Welcome to the Chat Window</h1>
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


        <div class='row ml-1 mt-3'>

            <h3>Add Members to Group</h3>
        </div>

        <div class='row'>

            <div class="col-5 ml-1">

                <form action="viewgroup.php" class="has-text-centered" method="POST">

                    <h5>Add Member</h5>


                    <select id="add1">
                        <option id="useradd" value="0">-----------</option>
                        <?php
                        $user = "SELECT ID, First_Name_Client, Surname_Client
                    FROM Gymifi_User_Details";

                        $result = $conn->query($user);

                        if (!$result) {
                            $conn->error;
                        } else {

                            while ($row = $result->fetch_assoc()) {

                                $userId = $row['ID'];
                                $first = $row['First_Name_Client'];
                                $surname = $row['Surname_Client'];
                                echo "<option id='useradd' value = '$userId'> $first $surname </option>";
                            }
                        }

                        ?>

                    </select>

            </div>
            <div class="col-5 ml-1">

                <form action="viewgroup.php" class="has-text-centered" method="POST">

                    <h5>Add Member</h5>


                    <select id="add2">
                        <option id="useradd" value="0">-----------</option>
                        <?php
                        $user = "SELECT ID, First_Name_Client, Surname_Client
                     FROM Gymifi_User_Details";

                        $result = $conn->query($user);

                        if (!$result) {
                            $conn->error;
                        } else {

                            while ($row = $result->fetch_assoc()) {

                                $userId = $row['ID'];
                                $first = $row['First_Name_Client'];
                                $surname = $row['Surname_Client'];
                                echo "<option id='useradd' value = '$userId'> $first $surname </option>";
                            }
                        }

                        ?>

                    </select>

            </div>
        </div>

        <div class="row">
            <div class="col-5 ml-1">

                <form action="viewgroup.php" class="has-text-centered" method="POST">

                    <h5>Add Member</h5>


                    <select id="add3">
                        <option id="useradd" value="0">-----------</option>
                        <?php
                        $user = "SELECT ID, First_Name_Client, Surname_Client
    FROM Gymifi_User_Details";

                        $result = $conn->query($user);

                        if (!$result) {
                            $conn->error;
                        } else {

                            while ($row = $result->fetch_assoc()) {

                                $userId = $row['ID'];
                                $first = $row['First_Name_Client'];
                                $surname = $row['Surname_Client'];
                                echo "<option id='useradd' value = '$userId'> $first $surname </option>";
                            }
                        }

                        ?>

                    </select>

            </div>
            <div class="col-5 ml-1">

                <form action="viewgroup.php" class="has-text-centered" method="POST">

                    <h5>Add Member</h5>


                    <select id="add4">
                        <option id="useradd" value="0">-----------</option>
                        <?php
                        $user = "SELECT ID, First_Name_Client, Surname_Client
                        FROM Gymifi_User_Details";

                        $result = $conn->query($user);

                        if (!$result) {
                            $conn->error;
                        } else {

                            while ($row = $result->fetch_assoc()) {

                                $userId = $row['ID'];
                                $first = $row['First_Name_Client'];
                                $surname = $row['Surname_Client'];
                                echo "<option id='useradd' value = '$userId'> $first $surname </option>";
                            }
                        }

                        ?>

                    </select>

            </div>
        </div>
        <div class='row'>
            <div class="col-5 ml-1">

                <form action="viewgroup.php" class="has-text-centered" method="POST">

                    <h5>Add Member</h5>


                    <select id="add5">
                        <option id="useradd" value="0">-----------</option>
                        <?php
                        $user = "SELECT ID, First_Name_Client, Surname_Client
                        FROM Gymifi_User_Details";

                        $result = $conn->query($user);

                        if (!$result) {
                            $conn->error;
                        } else {

                            while ($row = $result->fetch_assoc()) {

                                $userId = $row['ID'];
                                $first = $row['First_Name_Client'];
                                $surname = $row['Surname_Client'];
                                echo "<option id='useradd' value = '$userId'> $first $surname </option>";
                            }
                        }

                        ?>

                    </select>

            </div>
            <div class="col-5 ml-1">

                <form action="viewgroup.php" class="has-text-centered" method="POST">

                    <h5>Add Member</h5>


                    <select id="add6">
                        <option id="useradd" value="0">-----------</option>
                        <?php
                        $user = "SELECT ID, First_Name_Client, Surname_Client
                        FROM Gymifi_User_Details";

                        $result = $conn->query($user);

                        if (!$result) {
                            $conn->error;
                        } else {

                            while ($row = $result->fetch_assoc()) {

                                $userId = $row['ID'];
                                $first = $row['First_Name_Client'];
                                $surname = $row['Surname_Client'];
                                echo "<option id='useradd' value = '$userId'> $first $surname </option>";
                            }
                        }

                        ?>

                    </select>

            </div>
        </div>
        <div class='row ml-1 mt-3 mb-5'>
            <button class="btn btn-outline-success addbtn" type="submit" id="add"> Add </button>
        </div>

        </form>

        <script>
            $(document).ready(function() {

                $("#add").on('click', function(e) {

                    e.preventDefault();
                    var group = <?php echo $groupId ?>;
                    var add1 = $("#add1").val();
                    var add2 = $("#add2").val();
                    var add3 = $("#add3").val();
                    var add4 = $("#add4").val();
                    var add5 = $("#add5").val();
                    var add6 = $("#add6").val();


                    $.ajax({
                        url: "Ajax/groupaddajax.php",
                        type: "POST",
                        data: {
                            group: group,
                            add1: add1,
                            add2: add2,
                            add3: add3,
                            add4: add4,
                            add5: add5,
                            add6: add6

                        },
                        cache: false,
                        success: function(result) {
                            console.log("Success");
                            location.reload();
                        }
                    });
                });



            });
        </script>

        <div class="row ml-1">

            <div class=col-6>
                <h3> View Group Schedule -> </h3>

            </div>
            <div class='col-5'>
                <button class='btn btn-outline-success' type='button'><a href='groupschedule.php?groupId=<?php echo $groupId ?>&week=1'>Group Schedule</a></button>
            </div>

        </div>
    </div>

</body>

</html>