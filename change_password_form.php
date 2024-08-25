<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
        <h2 style="color: #402d21;">Change Password</h2>

            <form action="update_password.php" method="post">
                 <div class="textbox">
                    <input type="text" placeholder="New Password" name="pass" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Confirm Password" name="confirm_pass" required>
                </div>
                <input type="submit" class="btn" value="Login">           
            </form>
        </div>
    
</body>
</html>



