<?php
$servername = "localhost";
$username = "root"; // Default for local servers
$password = "";     // Default for local servers
$dbname = "appointment_db";

// 1. Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Capture data from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $phone = $_POST['phone_number'];
    $dept = $_POST['department'];
    $date = $_POST['pref_date'];
    $time = $_POST['pref_time'];
    $msg = $_POST['message'];

    // 3. Prepare and Insert
    $sql = "INSERT INTO appointments (user_name, user_email, phone_number, department, pref_date, pref_time, message) 
            VALUES ('$name', '$email', '$phone', '$dept', '$date', '$time', '$msg')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>