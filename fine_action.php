<?php 
$vehicle_number = $_POST['vnumber'];
$license_number = $_POST['lnumber'];
$violation = $_POST['violation'];
$email = $_POST['email'];
$offense = $_POST['offense'];
$l_violation = strtolower($violation);

$connection = mysqli_connect('localhost', 'root', '', 'e_challan');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

$query = "SELECT id FROM id_unique;";
$result = mysqli_query($connection, $query);

$BillID = 'B'.$result->fetch_assoc()['id'];
mysqli_query($connection, "UPDATE id_unique SET id = id + 1;");
$fine_amt = '0';
if($offense == '1'){
    $fine_amt = mysqli_query($connection, "SELECT fine FROM violation WHERE violation = '$violation';")->fetch_assoc()['fine'];
}
else if($offense == '2'){
    $fine_amt = mysqli_query($connection, "SELECT fine_1 FROM violation WHERE violation = '$violation';")->fetch_assoc()['fine_1'];
}

$penalty = 0;
$total_fine = $fine_amt + $penalty;
$today = date("Y-m-d");
$due_date = date('Y-m-d', strtotime($today. ' + 30 days'));


mysqli_query($connection, "INSERT INTO fine (Bill_no, Vehicle_no, Licenese_no, violation, fine_amt, penalty, total_fine, email, due_pay_date) VALUES ('$BillID', '$vehicle_number', '$license_number', '$violation', '$fine_amt', '$penalty', '$total_fine', '$email', '$due_date');");
header('Location: fines.php');
?>