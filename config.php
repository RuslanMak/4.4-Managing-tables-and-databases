<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "hw4-4";

try {
    $pdo = new PDO('mysql:host=localhost;dbname=hw4-4;charset=utf8', 'root', 'mysql');
//    $db = new PDO('mysql:host=localhost;dbname=rmakarov;charset=utf8', 'rmakarov', 'neto1741');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}



