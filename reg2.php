<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login/Sign Up Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f3fc;
    color: #8e44ad;
  }

  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
  }

  .login-form {
    width: 300px;
    margin: 20px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
  }

  input, button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
  }

  input {
    border: 1px solid #8e44ad;
  }

  button {
    background-color: #8e44ad;
    color: #ffffff;
    border: none;
    cursor: pointer;
  }

  button:hover {
    background-color: #9b59b6;
  }

  p a {
    color: #9b59b6;
    text-decoration: none;
  }

  p a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="container">
    <div class="login-form">
    <h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="text" placeholder="License Number" name="license_number" required>
        <input type="password" placeholder="Password" name="pass" required>
        <input type="password" placeholder="Confirm Password" name="confirm_password" required>
        <input type="text" placeholder="Vehicle Number" name="vehicle_number" required>
        <input type="text" placeholder="Name" name="namee" required>
        <input type="number" placeholder="Age" name="age" required>
        <input type="text" placeholder="Phone Number" name="phone_number" required>
        <button type="submit" name="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</div>

<?php
// Handling the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'e_challan');

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $license_number = $_POST['license_number'];
    $pass = $_POST['pass'];
    $confirm_password = $_POST['confirm_password'];
    $vehicle_number = $_POST['vehicle_number'];
    $namee = $_POST['namee'];
    $age = $_POST['age'];
    $phone_number = $_POST['phone_number'];
    echo $license_number; 
    if ($pass !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO driver (license_number, pass, vehicle_number, namee, age, phone_number) VALUES ('$license_number', '$hashedPassword', '$vehicle_number', '$namee', $age, '$phone_number')";
        if (mysqli_query($conn, $query)) {
            echo "Sign-up successful!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
