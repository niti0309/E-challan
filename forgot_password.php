<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_challan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the forgot password form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInputEmail = $_POST["email"];

    // Use mysqli_real_escape_string to prevent SQL Injection
    $email = mysqli_real_escape_string($conn, $userInputEmail);

    // // Generate OTP
    // $otp = rand(100000, 999999);

    // // Update the OTP in the database
    // $update_sql = "UPDATE driver SET otp = '$otp' WHERE email_id = '$email'";
    // $conn->query($update_sql);

    // Retrieve email associated with the provided email ID
    $email_sql = "SELECT email_id FROM driver WHERE email_id = '$email'";
    $email_result = $conn->query($email_sql);

    if ($email_result->num_rows === 1) {
        // Send OTP to the email address (You need to implement this part)

        echo "An OTP has been sent to the entered email ID. Please check and use it to reset your password.";
    } else {
        echo "Invalid Email ID.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <header>
    </header>
    <div class="container">
        <div class="login-box">
            <h2>Forgot Password</h2>
            <form class="" action="send.php" method="post">
                <div class="textbox">
                    <input type="email" placeholder="Email ID" name="email" required>
                </div>
                <input type="submit" class="btn" name="send" value="Send OTP">
            </form>
        </div>
    </div>
</body>
</html>

