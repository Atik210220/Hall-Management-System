<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "hall_management_system";

// Establish connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$ID = $_POST['ID'];
$roomNo = $_POST['roomNo'];
$checkInDate = $_POST['checkInDate'];
$checkOutDate = isset($_POST['checkOutDate']) ? $_POST['checkOutDate'] : null; // Optional

// Retrieve user_type based on ID
$sql_user_type = "SELECT user_type FROM student WHERE ID = '$ID'";
$result_user_type = $conn->query($sql_user_type);

if ($result_user_type->num_rows > 0) {
    // Update user_type to "Residential Student"
    $sql_update_user_type = "UPDATE student SET user_type = 'Residential Student' WHERE ID = '$ID'";
    if ($conn->query($sql_update_user_type) === TRUE) {
        echo "User type updated to Residential Student successfully. ";
    } else {
        echo "Error updating user type: " . $conn->error;
    }

    // Check if the ID already exists in the allotment table
    $sql_check = "SELECT * FROM allotment WHERE ID = '$ID'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // ID exists, update the existing record
        $stmt = $conn->prepare("UPDATE allotment SET checkOutDate = ? WHERE ID = ?");
        $stmt->bind_param("ss", $checkOutDate, $ID);
    } else {
        // ID does not exist, insert a new record
        $stmt = $conn->prepare("INSERT INTO allotment (ID, roomNo, checkInDate, checkOutDate) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $ID, $roomNo, $checkInDate, $checkOutDate);
    }

    // Execute the statement
    if ($stmt->execute()) {
        if ($result_check->num_rows > 0) {
            echo "Check-Out Date updated successfully.";
        } else {
            echo "Allotment details inserted successfully.";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo "Error: User not found.";
}

// Close database connection
$conn->close();
?>
