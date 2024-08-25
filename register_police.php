<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "e_challan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $namee = $_POST['namee'];
    $pass = $_POST['pass'];
    $confirm_password = $_POST['confirm_password'];
    $station_id = $_POST['station_id'];
    $age = $_POST['age'];
    $phone_number = $_POST['phone_number'];

    //Valid
    if (empty($pass) || empty($confirm_password) || empty($station_id) || empty($namee) || empty($age) || empty($phone_number)) {
        die("Error: All fields are required");
    } elseif ($pass !== $confirm_password) {
        die("Error: Passwords do not match");
    } elseif ($age < 18) {
        die("Error: Age must be above 18");
    } else {
        $query = "INSERT INTO police (pass, station_id, namee, age, phone_number) 
                  VALUES ('$pass', '$station_id', '$namee', $age, '$phone_number')";
        if (mysqli_query($conn, $query)) {
            mysqli_close($conn);
            header("Location: login_police.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <header>
    </header>
    <div class="container">
        <div class="login-box">
            <h2>Register</h2>
            <form action="register_police.php" method="post" enctype="multipart/form-data">                <div class="textbox">
                    <input type="text" placeholder="Name" name="namee" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="pass" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Confirm Password" name="confirm_password" required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Station ID" name="station_id" required>
                </div>
                
                <div class="textbox">
                    <input type="number" placeholder="Age" name="age" required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Phone Number" name="phone_number" required>
                </div>
                
                <input type="submit" class="btn" value="Register">
            </form>
            <div class="register-container">
                <a href="login_police.php" class="register-link">Login</a>
            </div>
        </div>
    </div>


    </script>
</body>
</html>