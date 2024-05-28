<?php
// Include your database connection file
include '../../../php/db_connect.php';

// Get the student ID from the POST request
$student_id = $_POST['student_id'];

// Prepare a SQL statement to check if the student ID exists
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();

// Create a response array
$response = array();

// Check if the student ID exists
if ($result->num_rows > 0) {
    $response['exists'] = true;
  
} else {
    $response['exists'] = false;
}

// Send the response as a JSON object
echo json_encode($response);
?>