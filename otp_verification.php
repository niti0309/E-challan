<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate OTP
    if ($_POST['otp'] == $_SESSION['otp']) {
        // Redirect to password change page
        header("Location: change_password.php");
        exit;
    } else {
        // Incorrect OTP, show error message
        $error = "Incorrect OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <h2>OTP Verification</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="otp">Enter OTP sent to <?php echo $_SESSION['phone']; ?>:</label><br>
        <input type="text" id="otp" name="otp" required><br><br>
        <input type="submit" value="Verify OTP">
    </form>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
