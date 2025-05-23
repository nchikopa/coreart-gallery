<?php

// Declaire and intialize variables 
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Connect to Database (MySQL)

$conn = new mysqli('localhost', 'root', '', 'coreart_gallery');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into contact_details(name, email, subject, message values(?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    echo "Email Sent!!!";
    $stmt->close();
    $conn->close();
}
