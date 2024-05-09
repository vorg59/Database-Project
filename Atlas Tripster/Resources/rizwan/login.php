<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['user-name'];
    $password = $_POST['password'];

    // Connecting to the Database
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "atlas";

    // Create a connection
    $conn = mysqli_connect($servername, $db_username, $db_password, $database);
    // Check connection
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{ 
        // Check if user exists in the database
        $sql = "SELECT * FROM signup WHERE name='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            // Redirect user to index.php
            header("Location: index.php");
            exit();
        }
        else{
            // Display alert if login credentials are incorrect
            echo '<script>alert("Invalid username or password!");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATLAS TRIPSTER | Login</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://kit.fontawesome.com/476f5c0c88.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><div class="brand" ><img class="topic" src="logo2.png"><h1 class="topic2">ATLAS TRIPSTER</h1></div></a>
            <div class="menu">
                <a href="index.php">Home</a>
                <a href="booking.php">Booking</a>
                <a href="travelpackages.php">Packages</a>
                <a href="login.php">Login/Sign Up</a>
                <a href="wishlistwithlogin.php">Wishlist</a>
            </div>
        </nav>
    </header>
    <div class="h">
        <div class="form">
            <div class="buttonbox">
                <div id="btn"></div>
                <a href="login.php" class="t">Login</a>
                <a href="Register.php" class="t">Sign Up</a>
            </div>
            <div class="socialiconss">
                <a href="https://www.facebook.com"><i class="fa-brands fa-facebook-f"></i></i></a>
                <a href="https://www.apple.com/"><i class="fab fa-apple"></i></a>
                <a href="https://www.nu.edu.pk/"><i class="fab fa-google"></i></a>
            </div>
            <form id="login" class="inputgroup">
                <input type="text" class="inputfield" id="username" name="username" placeholder="User name" required>
                <input type="password" class="inputfield" id="password" name="password" placeholder="Password" required>
                <input type="checkbox" class="check" id="remember-me"><label for="remember-me">Remember me</label>
                <button type="submit" class="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
