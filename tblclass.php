<?php

include 'db.php';

$sql = "SELECT * FROM teachers";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "username: " . $row["username"] . "<br>";
        echo "Password: " . $row["password"] . "<br>";
    }
} else {
    echo "No databases found.";
}

?>