<?php
// Initialize $data array
$data = array();

// Check if Email is provided in the URL
if(isset($_GET['Email'])) {
    // Get the Email from the URL
    $Email = $_GET['Email'];

    // Database connection
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

    // SQL query to retrieve student data based on Email
    $sql = "SELECT * FROM student WHERE Email = '$Email'";
    $result = $conn->query($sql);

    // Check if query execution was successful
    if ($result) {
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            echo "No data found for the provided Email.";
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Email not provided in the URL.";
    // Set default value for $Email or handle the case where it's not provided
    $Email = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Data</title>
<link rel="stylesheet" href="student_data.css">
</head>
<body>
<div class="container">
<h2>Student Data for <?php echo $Email; ?></h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Password</th>
        <th>User Type</th>
    </tr>
    <?php 
    // Check if $data is not empty before iterating over it
    if (!empty($data)) {
        foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row["ID"]; ?></td>
            <td><?php echo $row["Name"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
            <td><?php echo $row["PhoneNo"]; ?></td>
            <td><?php echo $row["Password"]; ?></td>
            <td><?php echo $row["user_type"]; ?></td>
        </tr>
    <?php 
        endforeach; 
    } else {
        // Handle case where $data is empty
        echo "<tr><td colspan='6'>No data found for the provided Email.</td></tr>";
    }
    ?>
</table>
</div>
</body>
</html>
