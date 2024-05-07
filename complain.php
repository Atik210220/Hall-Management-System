<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "hall_management_system";

// Establish connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data from the form
$studentName = $_POST['studentName'];
$roomNo = $_POST['roomNo'];
$mobileNo = $_POST['mobileNo'];
$studentEmail = $_POST['studentEmail'];
$details = $_POST['details'];
$complainDate =$_POST['complainDate'];
// SQL query to insert data into the database
$sql = "INSERT INTO complain (studentName, roomNo, mobileNo, studentEmail,complainDate, details)
        VALUES ('$studentName', '$roomNo', '$mobileNo', '$studentEmail','$complainDate', '$details')";

if ($conn->query($sql) === TRUE) {
    echo "Complaint submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
