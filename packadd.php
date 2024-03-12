<?php
// Include the database connection file
include 'connection.php';

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    
    $dest = $_POST['destination'];
    $images = $_POST['images'];
    $baseprice = $_POST['base-price'];
    $persons = $_POST['persons'];
    $totalprice = $_POST['total-price'];

    // SQL query to insert data into the 'menu' table
    $sql_insert = "INSERT INTO packages (item, price,Category) VALUES ('$item', '$price','$item_number')";

    // Perform the insertion
    if ($connect->query($sql_insert) === TRUE) {
        echo "<script>alert('package added succesfully added succesfully.');</script>";
    echo "<script>window.location.href='adminpage.php';</script>";
        exit();
    } else {
        // Handle errors if the insertion fails
        echo "Error: " . $sql_insert . "<br>" . $connect->error;
    }
}

// Close the database connection
$connect->close();
?>