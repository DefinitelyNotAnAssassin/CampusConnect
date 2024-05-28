<?php
session_start(); // Start the session

// Database connection
include '../../php/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['error_message'] = array("");
    $_SESSION['success_message'] = array("");
    if (is_uploaded_file($_FILES['teachers_csv']['tmp_name'])) {
        $csvFile = fopen($_FILES['teachers_csv']['tmp_name'], 'r');
        fgetcsv($csvFile); // Skipping the first line as it usually contains column headers

        while (($line = fgetcsv($csvFile)) !== FALSE) {
            $teacher_id = $line[0];
            $teacher_strand_id = $line[1];
            $teacher_fname = $line[2];
            $teacher_mname = $line[3];
            $teacher_lname = $line[4];
            $teacher_gender = $line[5];
            $teacher_birthdate = $line[6];
            $teacher_address = $line[7];
            $teacher_email = $line[8];
            $teacher_strand = $line[9];
            $teacher_username = $line[10];
            $teacher_password = $line[11];

            $fullname = $teacher_fname . " " . $teacher_lname;

            $hashed_password = password_hash($teacher_password, PASSWORD_BCRYPT);
            $user_type = "Teacher";

            $birthdate = new DateTime($teacher_birthdate);
            $now = new DateTime();

            $min_birthdate = $now->sub(new DateInterval('P5Y'));

            // Check if the birthdate is at least 5 years ago
            if ($birthdate > $min_birthdate) {
                $_SESSION['error_message'][] = "Teacher birthdate should be at least 5 years ago. Triggered by teacher ID: $teacher_id and username: $teacher_username";
                header("Location: ../../views/admin/teachers/index.php");
                exit();
            }

            // Check for user duplication
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? OR user_username = ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }

            $stmt->bind_param("ss", $teacher_id, $teacher_username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $_SESSION['error_message'][] = "Error: Duplicate user ID or username. Please check your CSV file and try again.\nTriggered by teacher ID: $teacher_id and username: $teacher_username";
            } else {
                // Insert into users table
                $stmt = $conn->prepare("INSERT INTO users (user_id, user_fullname, user_username, user_password, user_type) VALUES (?, ?, ?, ?, ?)");
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $conn->error);
                }
                $stmt->bind_param("sssss", $teacher_id, $fullname, $teacher_username, $hashed_password, $user_type);

                if ($stmt->execute()) {
                    // Insert into teacher_accounts table
                    $stmt = $conn->prepare("INSERT INTO teacher_accounts (teacher_id, teacher_strand_id, teacher_fname, teacher_mname, teacher_lname, teacher_gender, teacher_birthdate, teacher_address, teacher_email, teacher_strand, teacher_username, teacher_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    if (!$stmt) {
                        throw new Exception("Error preparing statement: " . $conn->error);
                    }
                    $stmt->bind_param("ssssssssssss", $teacher_id, $teacher_strand_id, $teacher_fname, $teacher_mname, $teacher_lname, $teacher_gender, $teacher_birthdate, $teacher_address, $teacher_email, $teacher_strand, $teacher_username, $hashed_password);
                    if ($stmt->execute()) {
                        $_SESSION['success_message'][] = "User ID: $teacher_id and username: $teacher_username added successfully";
                    } else {
                        throw new Exception("Error: " . $stmt->error);
                    }
                } else {
                    throw new Exception("Error: " . $stmt->error);
                }
            }
        }

        fclose($csvFile);
        $conn->close();
        $_SESSION['error_message'] = implode("<br>", $_SESSION['error_message']);
        $_SESSION['success_message'] = implode("<br>", $_SESSION['success_message']); 
        // check if there are any error messages
        if ($_SESSION['error_message'] == "") {
            unset($_SESSION['error_message']);
        } 
        if ($_SESSION['success_message'] == "") {
            unset($_SESSION['success_message']);
        }
        header("Location: ../../views/admin/teachers/index.php");
    }
}