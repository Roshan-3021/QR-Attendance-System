<?php

include '../db.php';

$name = $_POST['user'];
$password = md5($_POST['password']);


$sql = "UPDATE `teachers` SET `password`='$password' WHERE `username`='$name'";

if ($conn->query($sql) === TRUE) {
  echo "<script>
alert('Password Updated');
window.location.href='dashboard.php';
</script>";
} else {
  echo "Error updating record: " . $conn->error;
}



?>