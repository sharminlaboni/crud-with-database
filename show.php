
<?php

$id = $_GET['id'];
//DATABASE CONNECT
$servername = "localhost";
$username = "root";
$password = "";
//$dbname = "my_db";
try{
    $pdo = new PDO("mysql:host=$servername;dbname=my_db", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo" connected sucessfully";
}
catch(PDOException $e){
echo "Connection failed:" . $e->getMessage();
}
$sql = $pdo->query("SELECT*FROM users WHERE id = $id");
$user =$sql->fetch();
//print_r($user);
//die();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user data</title>
</head>
<body>
<a class="submit" href="index.php">List</a>

    <div>

        <div class="contrainer">
            <h1>User information</h1><hr>
            <p>Name:<b><?=$user['name']?></b></p>
            <p>Address:<b><?=$user['address']?></b></p>
            <p>Email:<b><?=$user['email']?></b></p>
            <p>Phone:<b><?=$user['phone']?></b></p>
        </div>
    </div>
</body>
</html>