<?php
session_start();
//print_r($_POST);
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
//DATABASE CONNECT
$servername = "localhost";
$username = "root";
$password = "";
//$dbname = "my_db";
try{
    $pdo = new PDO("mysql:host=$servername;dbname=my_db", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo" connected sucessfully";
}
catch(PDOException $e){
echo "Connection failed:" . $e->getMessage();
}
//insert
$sql = "INSERT INTO users (name, address, email, phone) VALUES (:name, :address,:email, :phone)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'name' => $name,
    'address' => $address,
    'email' => $email,
    'phone' => $phone
]);
$_SESSION['messege'] = "successfully created";
header('Location:index.php');
?>
