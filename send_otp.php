<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "driver";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit_license'])) {
    $license_number = $_POST['license_number'];

    // Check if license number exists in the database
    $sql = "SELECT * FROM users WHERE license_number = '$license_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        
        // Generate OTP
        $otp = mt_rand(100000, 999999);

        // Update OTP in the database
        $sql_update = "UPDATE users SET otp = '$otp' WHERE license_number = '$license_number'";
        if ($conn->query($sql_update) === TRUE) {
            // Send OTP to user's email
            $to = $email;
            $subject = "Forgot Password OTP";
            $message = "Your OTP is: $otp";
            $headers = "From: your_email@example.com"; // Change to your email

            if (mail($to, $subject, $message, $headers)) {
                echo "An OTP has been sent to your email. Please check your inbox.";
            } else {
                echo "Failed to send OTP. Please try again later.";
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "License number does not exist.";
    }
}

$conn->close();
?>
