<?php 
require_once('../connectMySQL.php');
$query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
    )";
    $result = $pdo->query($query);
    
    $forename = 'Bill';
    $surname = 'Smith';
    $username = 'bsmith';
    $password = 'mysecret';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    add_user($pdo, $forename, $surname, $username, $hash);
    $forename = 'Pauline';
    $surname = 'Jones';
    $username = 'pjones';
    $password = 'acrobat';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    add_user($pdo, $forename, $surname, $username, $hash);
    function add_user($pdo, $fn, $sn, $un, $pw)
    {
    $stmt = $pdo->prepare('INSERT INTO users VALUES(?,?,?,?)');
    $stmt->bindParam(1,$fn,PDO::PARAM_STR, 32);
    $stmt->bindParam(2,$sn,PDO::PARAM_STR, 32);
    $stmt->bindParam(3,$un,PDO::PARAM_STR, 32);
    $stmt->bindParam(4,$pw,PDO::PARAM_STR, 255);
    $stmt->execute([$fn,$sn,$un,$pw]);
  
    }
?>