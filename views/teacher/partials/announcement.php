<?php
// Fetch the latest announcement based on date_created
// Include database connection
include "../../../php/db_connect.php";

$sql = "SELECT * FROM announcement ORDER BY date_created DESC LIMIT 1";
$result = $conn->query($sql);

// Initialize variables for announcement data
$announcement_message = "There are currently no announcements.";
$datetime = "No date available.";
$announcement_image = "../../../images/logo.jpg"; // Default image path if no announcement found

// Check if the query executed successfully
if ($result && $result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $announcement_message = $row['message'];
    $datetime = $row['datetime'];
    $announcement_image = "../" . $row['file']; // Assuming 'file' column stores the image file path
}

// Close the database connection
$conn->close();
?>

<div class="h-screen w-full mx-auto card lg:card-side bg-base-300 shadow-xl">
    
    <div class="w-full h-full border border-black flex ">


            <img src="<?php echo $announcement_image; ?>" class = "w-1/2 h-full object-contain" alt="">
            <div class ="w-1/2 h-full overflow-y-auto max-w-[50%] text-justify mx-12 flex flex-col">
            <div class="w-full flex flex-col items-center justify-center mb-8">
            <h2 class="card-title ">New Announcement</h2>
            <p>Announcement set at date: <?php echo $datetime; ?><br> </p>

            </div>

            <div class="w-full h-full flex flex-col items-center justify-center space-y-2">
                <h1>Announcement message: <?php echo $announcement_message; ?></h1>
            </div>
           
            
                </div>
    </div>


</div>