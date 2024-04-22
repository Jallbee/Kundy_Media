<?php
// Database connection parameters
$servername = "192.185.2.183";
$username = "jennifer_kmadmin";
$password = "Jennykm24";
$dbname = "jennifer_KundyMedia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive form data
if(isset($_POST['drinkname']) && isset($_POST['description'])) {
    $drinkName = $_POST['drinkname'];
    $description = $_POST['description'];
} else {
    die("Invalid form data");
}

// Insert data into the database
$sql = "INSERT INTO `Alcohol Suggestions` (drinkname,description) VALUES ('$drinkName', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
