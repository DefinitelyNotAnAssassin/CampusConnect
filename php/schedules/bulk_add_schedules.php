<?php
session_start(); // Start the session
include "../../php/db_connect.php";

// Check connection
if ($conn->connect_error) {
    $_SESSION['error_message'] = "Connection failed: " . $conn->connect_error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $_SESSION['error_message'] = array("");
        $_SESSION['success_message'] = array("");
        // Check if file is uploaded
        if (isset($_FILES['schedules_csv']) && $_FILES['schedules_csv']['error'] == 0) {
            // Get the uploaded file
            $csv_file = $_FILES['schedules_csv']['tmp_name'];

            // Open the file for reading
            if (($handle = fopen($csv_file, "r")) !== FALSE) {
                // Skip the first line (header)
                fgetcsv($handle);

                // Loop over each line in the file
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    // Get the data
                    $subject_id = $data[0];
                    $schedule_subject_name = $data[1];
                    $strand_id = $data[2];
                    $schedule_strand_name = $data[3];
                    $start_time = $data[4];
                    $end_time = $data[5];
                    $schedule_time = $start_time . " - " . $end_time;
                    $schedule_days = explode("|", $data[6]); // Assuming days are separated by "|"

                  
                    if (!empty($subject_id) && !empty($start_time) && !empty($end_time) && !empty($strand_id) && !empty($schedule_days)) {
                        // Check if start time and end time are the same
                        if ($start_time == $end_time) {
                            throw new Exception("Same start time and end time Error.");
                        }
            
                        // Check if the schedule conflicts with existing schedules
                        $conflict = false;
                        $conflict_message = "";
            
                        // Query to check for conflicting schedules
                        $conflict_query = "SELECT * FROM schedules WHERE subject_id = ? AND strand_id = ? AND schedule_time = ? AND schedule_day = ?";
            
                        // Prepare and bind
                        $check_conflict_stmt = $conn->prepare($conflict_query);
            
                        if ($check_conflict_stmt) {
                            foreach ($schedule_days as $day) {
                                $check_conflict_stmt->bind_param("iiss", $subject_id, $strand_id, $schedule_time, $day);
                                $check_conflict_stmt->execute();
                                $result = $check_conflict_stmt->get_result();
            
                                if ($result->num_rows > 0) {
                                    $conflict = true;
                                    $conflict_message .= "There is a conflicting schedule for $day. ";
                                }
                            }
                        } else {
                            $_SESSION['error_message'][] = "Erorr adding schedules. $conn->error. Triggered by $subject_id, $strand_id, $schedule_subject_name, $schedule_strand_name, $schedule_time, $day";
                            throw new Exception("Error preparing statement: " . $conn->error);
                        }
            
                        if (!$conflict) {
                            // Prepare and bind
                            $insert_stmt = $conn->prepare("INSERT INTO schedules (subject_id, strand_id, schedule_subject_name, schedule_strand_name, schedule_time, schedule_day) VALUES (?, ?, ?, ?, ?, ?)");
            
                            // Check if the statement is prepared successfully
                            if ($insert_stmt) {
                                // Loop through each selected day
                                foreach ($schedule_days as $day) {
                                    // Execute the statement for each day
                                    $insert_stmt->bind_param("iissss", $subject_id, $strand_id, $schedule_subject_name, $schedule_strand_name, $schedule_time, $day);
                                    $insert_stmt->execute();
                                }
                                // Set success message
                               
                                $_SESSION['success_message'][] = "Schedule $schedule_subject_name | $schedule_strand_name added successfully";
                            } else {
                                $_SESSION['error_message'][] = "Erorr adding schedules. $conn->error. Triggered by $subject_id, $strand_id, $schedule_subject_name, $schedule_strand_name, $schedule_time, $day";
                                throw new Exception("Error preparing statement: " . $conn->error);
                            }
                        } else {
                            $_SESSION['error_message'][] = $conflict_message;
                        }
                    } else {
                        // Set error message if any required field is empty
                        $_SESSION['error_message'][] = "All fields are required";
                    }
                
                
                }

                // Close the file
                fclose($handle);
            } else {
                throw new Exception("Error opening file.");
            }
        } else {
            throw new Exception("No file uploaded or error in upload.");
        }
    } catch (Exception $e) {
        $_SESSION['error_message'] = $e->getMessage();
    } finally {
        // Close the connection
        $conn->close();

        // Redirect to index page

        $_SESSION['error_message'] = implode("<br>", $_SESSION['error_message']);
        $_SESSION['success_message'] = implode("<br>", $_SESSION['success_message']);

        if ($_SESSION['error_message'] == "") {
            unset($_SESSION['error_message']);
        }
        if ($_SESSION['success_message'] == "") {
            unset($_SESSION['success_message']);
        }
        
        header("Location: ../../views/admin/schedules/index.php");
        exit(); // Ensure that subsequent code is not executed after redirection
    }
}