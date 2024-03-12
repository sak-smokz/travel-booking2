<?php
// Establish database connection
$conn = mysqli_connect('host', 'username', 'password', 'database');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch details including image from the database (replace 'your_table' with your actual table name)
$sql = "SELECT * FROM your_table WHERE id = 1"; // Assuming you want details for a specific ID (e.g., 1)
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Output JSON data
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    echo "No details found.";
}

// Close database connection
mysqli_close($conn);
?>
