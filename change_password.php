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

if(isset($_POST['submit_otp'])) {
    $license_number = $_POST['license_number'];
    $otp_entered = $_POST['otp'];

    // Verify OTP
    $sql_verify = "SELECT * FROM users WHERE license_number = '$license_number' AND otp = '$otp_entered'";
    $result_verify = $conn->query($sql_verify);

    if ($result_verify->num_rows > 0) {
        // Redirect to change password form
        header("Location: change_password_form.php?license_number=$license_number");
        exit();
    } else {
        echo "Invalid OTP. Please try again.";
    }
}

$conn->close();
?>
