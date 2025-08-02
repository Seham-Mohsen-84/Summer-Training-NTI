<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "training_system";
$port = "3307";
$conn = new mysqli($localhost, $username, $password, $dbname, $port);

$email = "ahmed@example.com";
$sql = "SELECT * FROM students WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}


?>
