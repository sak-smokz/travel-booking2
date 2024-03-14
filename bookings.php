<?php
// Database connection parameters
$servername = "127.0.0.1"; // Change this if your MySQL server is on a different host
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "travel_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $package_name = $_POST["package"];

    // Prepare SQL statement to insert data into the booking table
    $stmt = $conn->prepare("INSERT INTO booking (email, package_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $package_name);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Booking submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
