
<?php
//print_r($_POST);
session_start();
$id = $_GET['id'];

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
$sql = $pdo->prepare("DELETE FROM users WHERE id = '$id'");
$sql->execute();
$_SESSION['messege'] = "successfully deleted";
header('Location:index.php');
?>


