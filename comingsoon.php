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
    
    <br><br>
    
    <marquee direction="right" loop="-1" nowrap> 
        <b>comingsoon<b>
    </marquee>
    
   

<!-- Footer -->
<footer>
    <p class="copyright">Copyright 2024 - e-Challan, Government Of India</p>
</footer>

<!-------- js for toggle menu -------->
<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>
</body>
</html>
