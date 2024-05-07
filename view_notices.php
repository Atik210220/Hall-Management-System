<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="home.css">
    <style> body { background-image: url("BB-Hall_01.jpeg");
	 background-size: cover;
	 background-repeat:no-repeat;
     background-position: center; } 
	</style>
    <title>View Notices</title>

</head>
<body>
<div class="container">
		<h1 class="title">Khulna University Students Hall</h1>
		<a href="home.html" class="button">Home</a>
		<a href="view_notices.php" class="button">Noticeboard</a>
		<a href="login.html" class="button">Login</a>
		<a href="index.html" class="button">Registration</a>
		</div>
       
	</div>
<div class="notice">
<?php
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

$sql = "SELECT * FROM notices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<h2>Title: ' . $row["title"] . '</h2>'. "<br>";
        echo '<p>Content: ' . $row["content"] . '</p>'. "<br>";
        echo "Created At: " . $row["created_at"]. "<br><hr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
  </div>
</body>
</html>
