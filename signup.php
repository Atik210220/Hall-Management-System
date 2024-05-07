<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hall_management_system";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$ID = $_POST["ID"];
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$PhoneNo = $_POST["PhoneNo"];
$Password = $_POST["Password"];
$user_type = "Non Residential Student";
$sql = "SELECT * FROM student WHERE ID = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt,"s", $ID);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "The user already exists";
}
else{
    $sql = "INSERT INTO student (ID, Name, Email,PhoneNo,Password,user_type) VALUES (?, ?, ?, ?,?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssssss", $ID, $Name, $Email,$PhoneNo,$Password,$user_type);

    if (mysqli_stmt_execute($stmt)) {
        
            echo "Welcome!";
           // header("Location: st_view.html"); 
    } else {
        echo "Error!. mysqli_stmt_error($stmt)";
    }
}

mysqli_stmt_close($stmt);
$conn->close();
?>