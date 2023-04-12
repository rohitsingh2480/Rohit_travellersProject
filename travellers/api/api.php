<?php

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travellers_detail";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from database
$sql = "SELECT * FROM travellers";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Return data as JSON
    header('Content-Type: application/json');
    header('Accept: application/json');

    echo json_encode($data);
} else {
    echo "No data found";
}

$conn->close();

?>
