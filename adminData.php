<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(to right, #7F7FD5, #86A8E7, #91EAE4); /* Light yellow background */
            color: #333; /* Dark text color */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(to right, #7F7FD5, #86A8E7, #91EAE4); /* White container background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Drop shadow effect */
        }
        h1 {
            text-align: center;
            color: #333; /* Dark text color */
        }
        .admin-info {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #d4edda; /* Light green background */
        }
        .admin-info h2 {
            margin-top: 0;
            color: #155724; /* Dark green text color */
            background-color: #c3e6cb; /* Light green header background */
            padding: 10px;
            border-radius: 5px;
        }
        .admin-info p {
            margin: 5px 0;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Data</h1>
        <?php
        // Your PHP code to retrieve and display admin data goes here
        // Database connection parameters
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "hall_management_system";

        // Create connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to retrieve data from the admin table
        $sql = "SELECT ID, Name, Email, Password, PhoneNo FROM admin";

        // Execute the query
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="admin-info">';
                echo '<h2>ID: ' . $row["ID"] . '</h2>';
                echo '<p>Name: ' . $row["Name"] . '</p>';
                echo '<p>Email: ' . $row["Email"] . '</p>';
                echo '<p>Password: ' . $row["Password"] . '</p>';
                echo '<p>Phone Number: ' . $row["PhoneNo"] . '</p>';
                echo '</div>';
                echo '<hr>';
            }
        } else {
            echo "<p>No records found</p>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
