<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Verify OTP</h2>
    <form action="change_password.php" method="post">
        <label for="otp">OTP:</label>
        <input type="text" id="otp" name="otp" required><br><br>
        <input type="hidden" name="license_number" value="<?php echo $_POST['license_number']; ?>">
        <button type="submit" name="submit_otp">Verify OTP</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Verify OTP</h2>
    <form action="change_password.php" method="post">
        <label for="otp">OTP:</label>
        <input type="text" id="otp" name="otp" required><br><br>
        <input type="hidden" name="license_number" value="<?php echo $_POST['license_number']; ?>">
        <button type="submit" name="submit_otp">Verify OTP</button>
    </form>
</body>
</html>
