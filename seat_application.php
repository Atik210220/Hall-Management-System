<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "hall_management_system"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $studentName = mysqli_real_escape_string($conn, $_POST['studentName']);
    $studentId = mysqli_real_escape_string($conn, $_POST['studentId']);
    $hallName = mysqli_real_escape_string($conn, $_POST['hallName']);
    $session = mysqli_real_escape_string($conn, $_POST['session']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $term = mysqli_real_escape_string($conn, $_POST['term']);
    $applicationDate = mysqli_real_escape_string($conn, $_POST['applicationDate']);
    $ygpa = mysqli_real_escape_string($conn, $_POST['ygpa']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    // Check if the data already exists in the database
    $sql_check = "SELECT * FROM seat_application WHERE studentId='$studentId' AND term='$term' LIMIT 1";
    $result_check = $conn->query($sql_check);
    
    if ($result_check->num_rows == 0) {
        // Data does not exist, insert into database
        $sql = "INSERT INTO seat_application (studentName,  studentId, hall_name, session, gender, term, application_date,ygpa,address)
                VALUES ('$studentName', '$studentId', '$hallName', '$session', '$gender', '$term', '$applicationDate','$ygpa','$address')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Data already exists, do not insert
        echo "Data already exists in the database";
    }
}

// Close connection
$conn->close();
?>
