<?php
//declare password
$pw="wsSl6R27ywFNJBCv";

//declare MySQL username
$user = "jboston01";

//declare webserver
$webserver = "jboston01.lampt.eeecs.qub.ac.uk";

//declare DB  
$db = "jboston01";

//mysqli api library in PHP to connect to the DB
$conn = new mysqli($webserver, $user, $pw, $db);

if($conn->connect_error){
    echo "Connection failed: ".$conn->connect_error;
}