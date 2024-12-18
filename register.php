<?php

$conn = new mysqli('localhost', 'root', '', 'registration');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['Username']; 
    $email = $_POST['Email'];       
    $date = $_POST['Date'];     
    $gender = $_POST['Gender'];     
    $address = $_POST['Address'];   
    $password = $_POST['password']; 

    
    if (!empty($username) && !empty($email) && !empty($date) && !empty($gender) && !empty($address) && !empty($password)) {
        
        $sql = "INSERT INTO users (Username, Email, DateOfBirth, Gender, Address, Password) 
                VALUES ('$username', '$email', '$date', '$gender', '$address', '$password')";

      
        if ($conn->query($sql) === TRUE) {
            echo "Registration Successful";
            header('Location: login.html'); 
            exit();
        } else {
            echo "Error: " . $conn->error; 
        }
    } else {
        echo "Please fill out all fields."; 
    }
}


$conn->close()
?>