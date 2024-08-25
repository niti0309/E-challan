<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body> 
      
<div class="container">
    <div class="navbar">
        <div class="logo">
            <a href="home_police.php"><img src="logoo.png" width="125px" ></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="home_police.php">Home</a></li>
                <li><a href="fine_slip.php">Generate Fine</a></li>
                <li><a href="fines.php">Receipts</a></li>
            </ul>
        </nav>
        <a href="home.php"><img src="logo1.png" width="30px" height="30px"></a>
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
    
  
<body>
    <header>
    </header>
    <table border=2>
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'e_challan');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = "SELECT * FROM fine;";
        $result = mysqli_query($connection, $query);
        echo "<tr><th>BillID</th><th>Violation</th><th>Total Fine</th><th>Email</th><th>Due Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $x = $row['Bill_no'];
            echo "<tr><td><a href='fine_ind.php?BillID=$x'>".$row['Bill_no']."</a></td><td>".$row['Violation']."</td><td>".$row['total_fine']."</td><td>".$row['email']."</td><td>".$row['due_pay_date']."</td></tr>";
        }
        ?>
    </table>
</body>
</html>