<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Fines</title>
    <link rel="stylesheet" href="styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            white-space: nowrap; /* Prevent line break */
            overflow: hidden; /* Hide overflowing content */
            text-overflow: ellipsis; /* Show ellipsis (...) for overflow */
        }
        th {
            background-color: #f2f2f2;
        }
        .printButton {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .printButton:hover {
            background-color: #0056b3;
        }
        @media print {
            .navbar {
                display: none;
            }
        }
    </style>
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
                <li><a href="fines_user.php">Fines</a></li>
                <li><a href="home.php">Account</a></li>
            </ul>
        </nav>
        <a href="comingsoon.php"><img src="logo1.png" width="30px" height="30px"></a>
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>

    <header>
        <h1>Search Fines by Vehicle Number</h1>
    </header>
    <div class="search-container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="vehicle_number" placeholder="Enter Vehicle Number" required>
            <button type="submit" name="search_submit">Search</button>
        </form>
    </div>

    <div class="center-table">
        <table border="2">
            <?php
            // Establish database connection
            $connection = mysqli_connect('localhost', 'root', '', 'e_challan');
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            if(isset($_POST['search_submit'])) {
                $vehicle_number = mysqli_real_escape_string($connection, $_POST['vehicle_number']);

                $query = "SELECT * FROM fine WHERE Vehicle_no = '$vehicle_number';";

                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<tr><th>BillID</th><th>Violation</th><th>Total Fine</th><th>Email</th><th>Due Date</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        $x = $row['Bill_no'];
                        echo "<tr><td><a href='fine_ind1.php?BillID=$x'>".$row['Bill_no']."</a></td><td>".$row['Violation']."</td><td>".$row['total_fine']."</td><td>".$row['email']."</td><td>".$row['due_pay_date']."</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No fines found for this vehicle number.</td></tr>";
                }
            }

            echo "</table>";

            mysqli_close($connection);
            ?>
        </table>
    </div>
</div>
</body>
</html>
