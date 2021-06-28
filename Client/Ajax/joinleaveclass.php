
<?php
include ("../../conn.php");
if (isset($_POST['join'])) {

  $query2 = "INSERT INTO Gymifi_Class_Takers (Class, Taker) VALUES ('$classid', '$id') ";

  $result2 = $conn->query($query2);

  if (!$result2) {
    echo $conn->error;
  }
}

?>

<?php
if (isset($_POST['leave'])) {

  $query3 = "DELETE Gymifi_Class_Takers WHERE Class = '$classid' && Taker = '$id' ";

  $result3 = $conn->query($query3);

  if (!$result3) {
    echo $conn->error;
  }
}
?>