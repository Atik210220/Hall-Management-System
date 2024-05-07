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

// Retrieve user inputs
$Email = $conn->real_escape_string($_POST["Email"]);
$Password = $conn->real_escape_string($_POST["Password"]);
$user_type = $conn->real_escape_string($_POST["user_type"]);

// Check if user type is "admin"
if ($user_type == "admin") {
    // Construct SQL query to check if email and password are correct for admin
    $sql = "SELECT Email FROM admin WHERE Email = '$Email' AND Password = '$Password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Admin credentials are correct, redirect to admin page
        header("Location: admin.html");
        exit;
    } else {
        // Admin credentials are incorrect
        echo "Invalid email or password for admin.";
    }
} else {
    // For other user types, check the student database
    // Construct SQL query to check if email and password are correct for student
    $sql = "SELECT Email, Password, user_type FROM student WHERE Email = '$Email' AND Password = '$Password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $student_exists = false;
            while ($row = $result->fetch_assoc()) {
                $student_user_type = $row["user_type"];
                if ($student_user_type == $user_type) {
                    $student_exists = true;
                    break;
                }
            }
            if ($student_exists) {
                // Redirect the user based on the user type
                if ($user_type == "Residential Student") {
                    header("Location: rst_view.html?Email=" . urlencode($Email));
                    exit;
                } elseif ($user_type == "Non Residential Student") {
                    header("Location: non_rst_view.html?Email=" . urlencode($Email));
                    exit;
                }
            } else {
                echo "Invalid user type selection";
            }
        } else {
            echo "Invalid user";
        }
    } else {
        echo "Query failed: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
