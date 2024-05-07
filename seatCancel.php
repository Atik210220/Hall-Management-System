<?php
// Establish connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$database = "hall_management_system";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Get data from the form
$ID = $_POST['ID'];
$checkOutDate = $_POST['checkOutDate'];

// Check if ID exists in the database
$sql_check_id = "SELECT * FROM student WHERE ID='$ID'";
$result = $conn->query($sql_check_id);

if ($result->num_rows > 0) {
    // Update allotment table with the checkout date
    if(isset($_POST['checkOutDate'])) {
        $sql_update_allotment = "UPDATE allotment SET checkOutDate='$checkOutDate' WHERE ID='$ID'";
        $conn->query($sql_update_allotment);
        $checkOutDate = $_POST['checkOutDate'];
       // Update student table to mark as 'residential' status as 'no'
    $sql_update_student = "UPDATE student SET user_type='Non Residential Student' WHERE ID='$ID'";
    $conn->query($sql_update_student);

    } else {
        // Handle the case where the checkOutDate key is not set
        echo "checkOutDate is not set in the POST data.";
    }
   

    
    echo "Check out successful!";
} else {
    echo "ID not found in the database.";
}

// Close the connection
$conn->close();
?>
