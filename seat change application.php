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

        // Check if form submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Extract data from POST request
            $studentEmail = $_POST["studentEmail"];
            $currentRoomNo = $_POST["currentRoomNo"];
            $preferredRoomNo = $_POST["preferredRoomNo"];

            // Prepare SQL statement
            $sql = "INSERT INTO seat_change_application (studentEmail, currentRoomNo, preferredRoomNo) VALUES ('$studentEmail', '$currentRoomNo', '$preferredRoomNo')";

            // Execute SQL statement
            if ($conn->query($sql) === TRUE) {
                echo "Application submitted successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close connection
        $conn->close();
        ?>