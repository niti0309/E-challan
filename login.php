<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_challan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userInputUsername = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInputUsername = $_POST["username"];
    $userInputPassword = $_POST["password"];
   
    $username = mysqli_real_escape_string($conn, $userInputUsername);
    $password = mysqli_real_escape_string($conn, $userInputPassword);

    $sql =  "SELECT * FROM driver WHERE pass = '$password' AND license_number = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        header("Location: home.php");
        exit();
    } else {
        echo '<script>alert("Invalid Password")</script>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <header>
    </header>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="textbox">
                    <input type="text" placeholder="License Number" name="username" value="<?php echo htmlspecialchars($userInputUsername); ?>" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
            <div class="register-container">
                <a href="register.php" class="register-link">Register</a><br>
            </div>           
        </div>
    </div>
</body>
</html>
