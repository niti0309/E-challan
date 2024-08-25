<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="send_otp.php" method="post">
        <label for="license_number">License Number:</label>
        <input type="text" id="license_number" name="license_number" required><br><br>
        <button type="submit" name="submit_license">Send OTP</button>
    </form>
</body>
</html>
