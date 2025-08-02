<?php
include_once "DB-Connection.php";

$sql = "SELECT * FROM students";
$result =$conn->query($sql);
if ($result && $result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
        ?>
    <table border="1" width="1000" align="center">
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['date_of_birth'] ?></td>
        </tr>
    </table>
    <?php
    endwhile;
else:
    echo "<tr><td colspan='5'>No students found.</td></tr>";
endif;
?>