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
    $password = $_POST["password"];

    // SQL query to retrieve user with the given email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user with the given email exists
    if ($result->num_rows == 1) {
        // Fetch the user's data
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user["password"])) {
            // Password is correct, redirect to dashboard or user home page
            header("Location: pro.html");
            exit();
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid password');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
            exit(); // Stop further execution
        }
    } else {
        // User with the given email does not exist
        echo "<script>alert('User not found');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
        exit(); // Stop further execution
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
