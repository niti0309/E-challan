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

if(isset($_POST['submit_password'])) {
    $license_number = $_POST['license_number'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new password matches confirm password
    if ($new_password === $confirm_password) {
        // Update password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql_update_password = "UPDATE users SET password = '$hashed_password', otp = NULL WHERE license_number = '$license_number'";
        if ($conn->query($sql_update_password) === TRUE) {
            echo "<script>alert('Password updated successfully.');</script>";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "New password and confirm password do not match.";
    }
}

$conn->close();
?>
