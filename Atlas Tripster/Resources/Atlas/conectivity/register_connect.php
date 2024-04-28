<?php

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];


    $conn = new mysqli('localhost','root','atlas');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else
    {
        $stmt=$conn->prepare("INSERT INTO users(username, email,password) VALUES(?,?,?)");  
        $stmt->bind_param("sssssi", $username, $email, $password);
        $stmt->execute();
        echo "registration SUccessfully ... ";
        $stmt->close();
        $conn->close();

    }

?>