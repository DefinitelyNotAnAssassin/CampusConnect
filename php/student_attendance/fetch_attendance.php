<?php
include "../../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the schedules table
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store the fetched data in an array
    $attendanceList = [];
    while ($row = $result->fetch_assoc()) {
        $attendanceList[] = $row;
        // add a new key to the array and assign a value
      
    }
} else {
    $attendanceList = [];
}

$conn->close();
