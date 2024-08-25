<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Generation</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <header>
    </header>
    <div class="container">
        <div class="login-box">
            <h2>Fine Generation</h2>
            <form action="fine_action.php" method="post">
                <div class="textbox">
                    <input type="text" placeholder="Vehicle Number" name="vnumber" required>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="License Number" name="lnumber" required>
                </div>
                <div class="textbox">
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'e_challan');
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                    }
                    $query = "SELECT violation FROM violation;";
                    $result = mysqli_query($connection, $query);
                    echo "<select name='violation' required>";
                    echo "<option value=''>Select Violation</option>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['violation']."'>".$row['violation']."</option>";
                    }
                    echo "</select>";
                    echo "<br>";
                    echo "<br>";
                    echo "<select name='offense'>";
                    echo "<option value=''>Select Offense</option>";
                    echo "<option value='1'>1st Offense</option>";
                    echo "<option value='2'>2nd Offense</option>";
                    echo "</select>";
                    ?>
                </div>
                <div class="textbox">
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <input type="submit" class="btn" value="Generate">
            </form>
        </div>
    </div>
</body>
</html>