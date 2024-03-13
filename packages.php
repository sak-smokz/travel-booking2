<?php
// PHP code to connect to the database and fetch package details
$servername = "127.0.0.1";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "travel_agency"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch package details
$sql = "SELECT * FROM packages WHERE package_id = 1"; // Change the condition as needed

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the first row (assuming there's only one result)
    $row = $result->fetch_assoc();
    $package_details = array(
        'package_name' => $row["package_name"],
        'description' => $row["description"],
        'price' => $row["price"],
        'duration' => $row["duration"],
        'destination' => $row["destination"],
        'departure_date' => $row["departure_date"],
        'image_url' => $row["image_url"]
    );
} else {
    echo "0 results";
}

$conn->close();

// Convert package details array to JSON format
echo json_encode($package_details);
?>
