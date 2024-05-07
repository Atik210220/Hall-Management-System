<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hall_management_system";

// Establish connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if title and content are provadminIDed
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        // Retrieve the form data
        $adminID = $_POST['adminID'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO notices (adminID,title, content) VALUES (?,?, ?)");
        $stmt->bind_param("sss",$adminID, $title, $content);

        // Execute the SQL statement
        if ($stmt->execute() === TRUE) {
            echo "Notice uploaded successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // If the required fields are not provadminIDed, display an error message
        echo "Title and content are required!";
    }
}
?>
