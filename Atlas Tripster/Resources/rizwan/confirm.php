<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "atlas";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

// Retrieve the last booking data from the database
$sql = "SELECT * FROM booking_info ORDER BY id DESC LIMIT 1"; // Assuming 'id' is the primary key
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Display the retrieved data in the HTML
    echo "<h2>Last Booking Information</h2>";
    echo "<p>Name: " . $row['Name'] . "</p>";
    echo "<p>Email: " . $row['Email'] . "</p>";
    echo "<p>Phone: " . $row['phone'] . "</p>";
    echo "<p>Destination: " . $row['destination'] . "</p>";
    echo "<p>Departure Date: " . $row['DDate'] . "</p>";
    echo "<p>Return Date: " . $row['RDate'] . "</p>";
    echo "<p>Passengers: " . $row['persons'] . "</p>";
    echo "<p>Class: " . $row['please'] . "</p>";
    echo "<p>Price: " . $row['price'] . "</p>";
} else {
    echo "No booking data found.";
}

// Close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="pay.php">checkout</a>
</body>
</html>
