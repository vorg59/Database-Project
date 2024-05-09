<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $expiry = $_POST['expiry'];
    $cvv = $_POST['cvv'];
   
    
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
        $sql = "INSERT INTO pay (fullname, email, address, city, country, cardname, cardnumber,expiry, cvv) VALUES ('$fullname', '$email', '$address', '$city', '$country', '$cardname', '$cardnumber', '$expiry', '$cvv')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your booking has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>';
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
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atlas Tripster | Pay</title>
    <link rel="stylesheet" href="BookingStyle.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://kit.fontawesome.com/476f5c0c88.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <a href="index.html"><div class="brand"><h1 class="animate__heartBeat"><img src="logo2.png"></div></h1></a>
            <div class="menu">
                <a href="index.php">Home</a>
                <a href="booking.php">Booking</a>
                <a href="travelpackages.php">Packages</a>
                <a href="login.php">Login/Sign Up</a>
                <a href="wishlistwithlogin.php">Wishlist</a>
            </div>
        </nav>
    <div class="container">
        <form action="pay.php" method="post">
            <div class="row">
                <div class="col">
                    <h3 class="title">Information</h3>

                    <div class="inputbox">
                        <span>Full Name</span>
                        <input type="text" id="fullname" name="fullname" placeholder="Fatima Waseem">
                    </div>
                    <div class="inputbox">
                        <span>Email</span>
                        <input type="email" id="email" name="email" placeholder="fatima57@example.com">
                    </div>
                    <div class="inputbox">
                        <span>Address</span>
                        <input type="text" id="address" name="address" placeholder="street - town ">
                    </div>
                    <div class="inputbox">
                        <span>City</span>
                        <input type="text" id="city" name="city" placeholder="Lahore">
                    </div>
                    <div class="inputbox">
                        <span>Country</span>
                        <input type="text" id="country" name="country" placeholder="France">
                    </div>
                </div>

                <div class="col">
                    <h3 class="title">Payment</h3>

                    <div class="inputbox">
                        <img src="visa.png">
                    </div>
                    <div class="inputbox">
                        <span>Name on Card</span>
                        <input type="text" id="cardname" name="cardname" placeholder="Miss. Fatima">
                    </div>
                    
                    <div class="inputbox">
                        <span>Card Number</span>
                        <input type="number" id="cardnumber" name="cardnumber" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputbox">
                        <span>Expiry</span>
                        <input type="date" id="expiry" name="expiry" placeholder="Journey Start Date">
                    </div>
                    <div class="inputbox">
                        <span>CVV</span>
                        <input type="text" id="cvv" name="cvv" placeholder="1234">
                    </div>
                </div>
            </div>
            <button type="submit" class="submit-btn"><a href="index.php">Confirm</a></button>
        </form>
    </div>
    <footer>
        <div class="row">
            <div class="col">
                <a href="index.php"><img src="logo2.png" class="flogo"></a>
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
    <script>
  function redirectToConfirmPage() {
    window.location.href = "confirm.php";
  }
</script>
</body>
</html>
