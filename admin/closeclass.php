<?php

include '../db.php';

$id = $_GET['id'];

$sql = "UPDATE `attendance` SET `status`='inactive' WHERE `id`='$id'";

if ($conn->query($sql) === TRUE) {
  echo "<script>
alert('Attedance Closed');
window.location.href='dashboard.php';
</script>";
} else {
  echo "Error updating record: " . $conn->error;
}


?>