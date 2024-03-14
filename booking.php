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

// Fetch packages from the database
$sql = "SELECT package_name FROM packages";
$result = $conn->query($sql);
$packages = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $packages[] = $row;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency</title>
    <link rel="stylesheet" href="booking.css"> <!-- Link to your CSS file -->
</head>
<body>
            <!--===========Nav Bar=================-->
            <section class="nav-bar">
                <div class="logo">Go Trip</div>
                <ul class="menu">
                    <li><a href="pro.html">home</a></li>
                    <li><a href="#">booking</a></li>
                    <li><a href="packages.php">package</a></li>
                    <li><a href="about_us.html">about us</a></li>
                    <li><a href="login.html">logout</a></li>
                </ul>
                </div>
    
            </section>

    <h1>Booking portal</h1>

    <form id="bookingForm" action="booking.php" method="post">

    <select id="package" name="package">
    <option value="" disabled selected>Select a Package</option>
    <?php foreach ($packages as $package): ?>
        <option value="<?php echo $package['package_name']; ?>"><?php echo $package['package_name']; ?></option>
    <?php endforeach; ?>
</select>


        <div id="packages-list" class="packages-list">
            <?php foreach ($packages as $package): ?>
                <div class="package-item">
                    <strong><?php echo $package['package_name']; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="booking-form" class="booking-form">
            <h2>Booking Form</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="button" onclick="submitBooking()">Submit Booking</button>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const packageSelect = document.getElementById("package");
            const bookingForm = document.getElementById("booking-form");

            packageSelect.addEventListener("change", function () {
                bookingForm.style.display = "block";
            });
        });

        function submitBooking() {
            const selectedPackageId = document.getElementById("package").value;
            const packageName = document.getElementById("package").options[document.getElementById("package").selectedIndex].text;
            const userName = document.getElementById("name").value;
            const userEmail = document.getElementById("email").value;

            alert(`Booking Confirmed!\nPackage: ${packageName}\nName: ${userName}\nEmail: ${userEmail}`);
        }
    </script>

</body>
</html>
