<?php
session_start(); // Start the session

// Database connection
include '../../php/db_connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['error_message'] = array("");
    $_SESSION['success_message'] = array("");
    if (is_uploaded_file($_FILES['students_csv']['tmp_name'])) {
        $csvFile = fopen($_FILES['students_csv']['tmp_name'], 'r');
        fgetcsv($csvFile); // Skipping the first line as it usually contains column headers

        while (($line = fgetcsv($csvFile)) !== FALSE) {
            $student_id = $line[0];
            $strand_id = $line[1];
            $student_fname = $line[2];
            $student_mname = $line[3];
            $student_lname = $line[4];
            $student_email = $line[5];
            $student_strand = $line[6];
            $student_gradelevel = $line[7];
            $student_gender = $line[8];
            $student_address = $line[9];
            $student_birthdate = $line[10];
            $student_guardian = $line[11];
            $student_guardian_contact = $line[12];
            $student_guardian_address = $line[13];
            $student_guardian_work = $line[14];
            $student_2ndguardian = $line[15];
            $student_2ndguardian_contact = $line[16];
            $student_2ndguardian_address = $line[17];
            $student_2ndguardian_work = $line[18];
            $student_username = $line[19];
            $student_password = $line[20];
           
            $fullname = $student_fname . " " . $student_lname;


        $hashed_password = password_hash($student_password, PASSWORD_BCRYPT);
        $user_type = "Student";


        if (preg_match("/^\d+$/", $student_username)) {
            echo "Valid";
        } else {
            $_SESSION['error_message'][] = "Student ID should be a number";
            continue;

        }
        
        $birthdate = new DateTime($student_birthdate);
        $now = new DateTime();

        $min_birthdate = $now->sub(new DateInterval('P5Y'));

            // Check if the birthdate is at least 5 years ago
            if ($birthdate > $min_birthdate) {
                $_SESSION['error_message'][] = "Student birthdate should be at least 5 years ago. Triggered by student ID: $student_id and username: $student_username";
                header("Location: ../../views/admin/students/index.php");
                exit();
            }

        // Check for user duplication
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? OR user_username = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

    
        $stmt->bind_param("ss", $student_id, $student_username);
        $stmt->execute();
        $result = $stmt->get_result();

      
        if ($result->num_rows > 0) {
           

            $_SESSION['error_message'][] = "Error: Duplicate user ID or username. Please check your CSV file and try again.\nTriggered by student ID: $student_id and username: $student_username";

        } else {
            // Insert into users table
            $stmt = $conn->prepare("INSERT INTO users (user_id, user_fullname, user_username, user_password, user_type) VALUES (?, ?, ?, ?, ?)");
            
            if (!$stmt) {
                
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("sssss", $student_id, $fullname, $student_username, $hashed_password, $user_type);
            
            
            
            if ($stmt->execute()) {
                // Insert into student_accounts table
                $stmt = $conn->prepare("INSERT INTO student_accounts (student_id, student_fname, student_mname, student_lname, student_gender, student_birthdate, student_address, student_email, student_strand, strand_id, student_gradelevel, student_guardian, student_guardian_contact, student_guardian_address, student_guardian_work, student_2ndguardian, student_2ndguardian_contact, student_2ndguardian_address, student_2ndguardian_work, student_username, student_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                if (!$stmt) {
               
                    throw new Exception("Error preparing statement: " . $conn->error);
                }
                $stmt->bind_param("sssssssssssssssssssss", $student_id, $student_fname, $student_mname, $student_lname, $student_gender, $student_birthdate, $student_address, $student_email, $student_strand, $strand_id, $student_gradelevel, $student_guardian, $student_guardian_contact, $student_guardian_address, $student_guardian_work, $student_2ndguardian, $student_2ndguardian_contact, $student_2ndguardian_address, $student_2ndguardian_work, $student_username, $hashed_password);
                if ($stmt->execute()) {
                    $_SESSION['success_message'][] = "User ID: $student_id and username: $student_username added successfully";
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
        header("Location: ../../views/admin/students/index.php");

}}