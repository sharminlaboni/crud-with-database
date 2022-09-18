<?php
session_start();

//print_r($_POST);id
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$data=[
'id' => $id,
'name'=> $name,
'address'=>$address,
'email' =>$email,
'phone'=>$phone

];
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
//insert"
$sql = "UPDATE users SET name=:name, address=:address, email=:email, phone=:phone WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute($data);

$_SESSION['messege'] = "successfully updated";

header('Location:index.php');
?>