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
    $license_number = $_POST['license_number'];
    $pass = $_POST['pass'];
    $confirm_password = $_POST['confirm_password'];
    $vehicle_number = $_POST['vehicle_number'];
    $namee = $_POST['namee'];
    $email_id = $_POST['email_id'];
    $age = $_POST['age'];
    $phone_number = $_POST['phone_number'];

    //Valid
    if (empty($license_number) || empty($pass) || empty($confirm_password) || empty($namee) || empty($age) || empty($phone_number)) {
        die("Error: All fields are required");
    }

    if ($pass !== $confirm_password) {
        die("Error: Passwords do not match");
    }

    if (!preg_match("/^[a-zA-Z]{2}[0-9]{2}\s[0-9]{11}$/", $license_number)) {
        die("Error: Invalid license number format. Please enter in the format AA00 00000000000.");
    }

    if (!empty($vehicle_number) && !preg_match("/^[a-zA-Z]{2}[0-9]{2}\s[a-zA-Z]{2}[0-9]{4}$/", $vehicle_number)) {
        die("Error: Invalid vehicle number format. Please enter in the format AA00 AA0000 or leave blank if no vehicle.");
    }

    if ($age < 18 || $age > 33) {
        die("Error: Age must be between 18 and 33");
    }

    $check_query = "SELECT * FROM driver WHERE license_number = '$license_number'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('License number already registered. Please use a different license number.');</script>";
    } else {
        if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
            $pdfFile = $_FILES['pdfFile'];
            $pdfFileName = $pdfFile['name'];
            $pdfTmpName = $pdfFile['tmp_name'];
            $pdfSize = $pdfFile['size'];

            // Check file type
            $pdfFileType = strtolower(pathinfo($pdfFileName, PATHINFO_EXTENSION));
            if ($pdfFileType !== 'pdf') {
                die("Error: Only PDF files are allowed.");
            }

            // $uploadDirectory = "uploads/";
            // $uploadFilePath = $uploadDirectory . $pdfFileName;
            // if (!move_uploaded_file($pdfTmpName, $uploadFilePath)) {
            //     die("Error: Failed to move uploaded file.");
            // }
        }

        $query = "INSERT INTO driver (namee, email_id, license_number, vehicle_number, phone_number, age, pass, pdfFile) VALUES ('$namee', '$email_id', '$license_number', '$vehicle_number', '$phone_number', $age, '$pass', '$pdfFileName')";

        if (mysqli_query($conn, $query)) {
            mysqli_close($conn);
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
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
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="textbox">
                    <input type="text" placeholder="License Number" name="license_number" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="pass" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Confirm Password" name="confirm_password" required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Vehicle Number" name="vehicle_number">
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Name" name="namee" required>
                </div>
                <div class="textbox">
                    <input type="email" placeholder="Email ID" name="email_id" required>
                </div>
                <div class="textbox">
                    <input type="number" placeholder="Age" name="age" required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Phone Number" name="phone_number" required>
                </div>
                <div class="textbox">
                    <input type="file" placeholder="License Card" name="pdfFile" accept="application/pdf">
                </div>
                
                <input type="submit" class="btn" value="Register">
            </form>
            <div class="register-container">
                <a href="login.php" class="register-link">Login</a>
            </div>
        </div>
    </div>
</body>
</html>
