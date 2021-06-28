<?php
include("../conn.php");
session_start();
$admin = $_SESSION['admin'];
$adminId = $_SESSION['adminId'];
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
                            <a href="#">Groups</a>
                        </li>
                        <li>
                            <a href="tracker.php">Manage History/Performance</a>
                        </li>
                    </ul>
                </div>

            </nav>

        </div>

        <div class='row ml-3'>

            <h3>Current Groups</h3>
        </div>

        <table class="table table-striped table-dark groups">


            <thead>
                <tr>
                    <th scope="col">Group Name</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php

                $query = "SELECT * FROM Gymifi_Group_List WHERE Coach = '$adminId' ";

                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {

                    $groupId = $row['ID'];
                    $Group = $row['Name'];

                    echo " <tr> 
<td><strong>$Group</strong></td>
<td> <button class='btn btn-outline-success' type='button'><a href='viewgroup.php?groupId=$groupId'>View Group</a></button>
<button class='btn btn-outline-success' type='button'><a href='groupchat.php?groupId=$groupId'>Group Chat</a></button>
</td>
</tr>
";
                }

                ?>

            </tbody>
        </table>

        <div class='row ml-3'>

            <h3>Create a Group </h3>
        </div>

        <div class='row'>

            <div class="col-3 ml-3">

                <form action="group.php" class="has-text-centered" method="POST">

                    <h5>Group Name</h5>
            </div>

            <div class="col-9">

                <input class="form-control" type="text" id="group_name">

                <button class="btn btn-outline-success mt-3 mb-3 creategroupbtn" type="submit" id="creategroup">Create Group</button>
            
        
            </div>
        </form>
            
        </div>

    </div>

    <script>
        $(document).ready(function() {

            
            $('#creategroup').on('click', function (e) {

                e.preventDefault();
                console.log('java');
                var groupname = $('#group_name').val();
                
                var coach = <?php echo $adminId ?>;

                
                $.ajax({
                    url: "Ajax/creategroupajax.php",
                    type: "POST",
                    data: {
                        groupname: groupname,
                        coach: coach
                    },
                    cache: false,
                    success: function (result) {
                        console.log("Success");
                        location.reload();
                    }
                });
            });
        });
    </script>

</body>

</html>