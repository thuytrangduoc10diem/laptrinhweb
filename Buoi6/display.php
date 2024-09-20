<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b5_mydb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, firstname, lastname, reg_date FROM MyGuests";
$result = $conn->query($sql);

echo "<h2>Danh sách nhân viên</h2>";
echo "<table border='1'>
<tr>
<th>Id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Reg Date</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"]. "</td>
        <td>" . $row["firstname"]. "</td>
        <td>" . $row["lastname"]. "</td>
        <td>" . $row["reg_date"]. "</td>
        </tr>";
    }
} else {
    echo "0 kết quả";
}
echo "</table>";

$conn->close();
?>
