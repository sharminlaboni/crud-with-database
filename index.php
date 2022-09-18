<?php
//print_r($_POST);
session_start();
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
$sql = $pdo->query('SELECT*FROM users');
$users=$sql->fetchAll();
//print_r($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data table</title>
</head>
<body>
    <a class="submit" href="./create.php">Create user</a>
    <?php
    if (isset($_SESSION['messege'])){
        echo $_SESSION['messege'];
        session_destroy();
    }
    
    ?>

    <table border=1>
        <thead>
            <tr>
                <th>serial</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
                <?php $i=0;foreach($users as $key =>$user){?>
                 
                <tr>   
                <td><?=++$i?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['address']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['phone']?></td>
                <td>
                <a class="submit" href="show.php?id=<?=$user['id']?>">show</a>
                <a class="submit" href="edit.php?id=<?=$user['id']?>">Edit</a>
                <a class="submit" onclick="alert('Delete user')" href="delete.php?id=<?=$user['id']?>">Delete</a>
                </td>   
                </tr>
                <?php } ?>
            
        </tbody>
    </table>
</body>
</html>