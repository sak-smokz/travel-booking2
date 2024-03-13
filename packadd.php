<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "travel_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$package_id = $_POST['package-id']; // Retrieve package ID from the form
$package_name = $_POST['package-name'];
$description = $_POST['description'];
$price = $_POST['price'];
$duration = $_POST['duration'];
$destination = $_POST['destination'];
$departure_date = $_POST['departure-date'];
$image_url = $_POST['image-url'];

// Check if package ID already exists
$check_sql = "SELECT * FROM packages WHERE package_id = '$package_id'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    // Package ID already exists
    // Close the database connection
    $conn->close();
    // Show error message and redirect
    echo "<script>alert('Package ID already exists!'); window.location='packadd.html';</script>";
} else {
    // Package ID does not exist, proceed with insertion
    // Prepare SQL statement to insert data into packages table
    $sql = "INSERT INTO packages (package_id, package_name, description, price, duration, destination, departure_date, image_url) 
            VALUES ('$package_id', '$package_name', '$description', '$price', '$duration', '$destination', '$departure_date', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();
        // Show success message and redirect
        echo "<script>alert('New package added successfully!'); window.location='packadd.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>