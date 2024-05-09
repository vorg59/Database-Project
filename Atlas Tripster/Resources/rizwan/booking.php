<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $phone = $_POST['phone'];
    $destination = $_POST['destination'];
    $DDate = $_POST['DDate'];
    $RDate = $_POST['RDate'];
    $persons = $_POST['persons'];
    $please = $_POST['please'];
    $price = $_POST['price'];
   
    if ($please === 'economy') {
        $price = 2000;
    } 
    elseif ($please === 'silver') {
        $price = 10000;
    }
    elseif ($please === 'gold') {
        $price = 10000;
    }elseif ($please === 'platinum') {
        $price = 25000;
    } else {
        // Handle invalid class selection
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Invalid class selection.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>';
        exit; // Stop further execution
    }
    
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
    else{ 
        // Submit these to the database
        // Sql query to be executed 
        $sql = "INSERT INTO booking_info (Name, phone, Email, destination, DDate, RDate, persons, please, price) VALUES ('$Name', '$phone', '$Email', '$destination', '$DDate', '$RDate', '$persons', '$please', '$price')";
        $result = mysqli_query($conn, $sql);

        if($result){
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your booking has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>';
            $booking_id = mysqli_insert_id($conn); // Get the ID of the last inserted row
            header("Location: confirm.php?id=$booking_id");
            exit;
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issue and your booking was not submitted successfully! We regret the inconvenience caused!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATLAS TRIPSTER | Booking</title>
    <link rel="stylesheet" href="BookingStyle.css">
    <link rel="stylesheet" href="style.css">
    <script src="/Atlas Tripster/Resources/Atlas/JS/backend1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://kit.fontawesome.com/476f5c0c88.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><div class="brand"><h1 class="animate__heartBeat"><img src="logo2.png"></div></h1></a>
            <div class="menu">
                <a href="index.php">Home</a>
                <a href="booking.php">Booking</a>
                <a href="travelpackages.php">Packages</a>
                <a href="login.php">Login/Sign Up</a>
                <a href="wishlistwithlogin.php">Wishlist</a>
            </div>
        </nav>

</header>
<div class="backgrnd">
    <div class="booking-form">
        <h2>Online Booking</h2>
        <form action="booking.php" method="post">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" required>

            <label for="Email">Email</label>
            <input type="text" name="Email" id="Email" required>

            <label for="Email">Phone</label>
            <input type="text" name="phone" id="phone" required>

            <label for="Destination">Destination</label>
            <select name="destination" id="destination" required>
                <option value="select">Select</option>
                <option value="Paris">Paris</option>
                <option value="London">London</option>
                <option value="Dubai">Dubai</option>
                <option value="New York">Switzerland</option>
                <option value="Switzerland">Paris</option>
                <option value="Netherland">Netherland</option>
                <option value="Shenghai">Shenghai</option>
                <option value="Chicago">Chicago</option>
                
            </select>

            <label for="Departure-date">Departure</label>
            <input type="date" class="date-in" name="DDate" id="DDate" required>

            <label for="Return-date">Return</label>
            <input type="date" class="date-in" name="RDate" id="RDate" required>

            <label for="personss">Passengers</label>
            <input type="number" name="persons" id="persons" required>
            
            <label for="Name">Name</label>
            <input type="text" name="please" id="please" required>
            <button type="submit" class="submit">Submit</button>
            <a href="pay.php">Proceed</a>

        </form>
    </div>
</div>
<footer>
    <div class="row">
        <div class="col">
            <img src="logo2.png" class="flogo">
            <p>Our website will streamline the entire travel planning process.</p>
        </div>
        <div class="col">
            <h2>Offices</h2>
            <div class="cont">
                <li><i class="fa-solid fa-location-dot"></i><a href="https://google.com/maps/dir//fast+university+location+map/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x391903f08ebc7e8b:0x47e934f4cd34790?sa=X&ved=2ahUKEwjEwZq4u9iEAxXWh_0HHaEECLcQ9Rd6BAhgEAA"> 852-B Milaad St, Block B Faisal Town</a></li>
                <li><i class="fa-regular fa-envelope"></i><a href="mailto:l227757@lhr.nu.edu.pk">l227757@lhr.nu.edu.pk</a></li>
                <li><i class="fa-solid fa-phone"></i><a href="tel:(042) 111 128 128">(042) 111 128 128</a></li>
            </div>
        </div>
        <div class="col">
            <h2>Links</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About us</a></li>
            </ul>
        </div>
        <div class="col">
            <h2>Websites</h2>
            <div class="socialicons">
                <a href="https://www.facebook.com"><i class="fa-brands fa-facebook-f"></i></i></a>
                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="https://www.nu.edu.pk/"><i class="fab fa-twitter"></i></a>
  
            </div>
        </div>
    </div>
    <hr><p class="copy"></p>
  </footer>
</body>
</html>