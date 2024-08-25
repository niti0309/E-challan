<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body> 
<div class="container">
    <div class="navbar">
        <div class="logo">
            <a href="home.php"><img src="logoo.png" width="125px" ></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="home.php">Home</a></li>
                <li><a href="comingsoon.php">Fines</a></li>
                <li class="dropdown">
                    <a href="comingsoon.php" class="dropbtn">Payments</a>
                    <div class="dropdown-content">
                        <a href="comingsoon.php">Pay Fine</a>
                        <a href="comingsoon.php">View Receipts</a>
                    </div>
                </li>
                <li><a href="comingsoon.php">History</a></li>
                <li><a href="comingsoon.php">Account</a></li>
            </ul>
        </nav>
        <a href="comingsoon.php"><img src="logo1.png" width="30px" height="30px"></a>
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
</div>
<div class="container">
    <div class="table-section">
        <?php
        $billID = $_GET['BillID'];
        $connection = mysqli_connect('localhost', 'root', '', 'e_challan');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = "SELECT * FROM fine WHERE Bill_no = '$billID';";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_assoc();
        echo "<table border=2>";
        echo "<tr>";
        echo "<td><h3>Bill ID: </h3></td><td>".$row['Bill_no']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>Vehicle Number: </h3></td><td>".$row['Vehicle_no']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>License Number: </h3></td><td>".$row['Licenese_no']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>Violation: </h3></td><td>".$row['Violation']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>Fine: </h3></td><td>".$row['fine_amt']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>Penalty: </h3></td><td>".$row['penalty']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>Total Fine: </h3></td><td>".$row['total_fine']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>Email: </h3></td><td>".$row['email']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h3>Due Pay Date: </h3></td><td>".$row['due_pay_date']."</td>";
        echo "</tr>";
        echo "</table>";
        ?>
        <div class="register-container">
            <button onclick="printPage()" class="register-link">Print Page</button>
        </div>
    </div>
</div>

<script>
function printPage() {
    window.print();
}
</script>

</body>
</html>
