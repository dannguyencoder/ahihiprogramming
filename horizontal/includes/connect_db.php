<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ahihiprogramming';

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Database connect failed";
    die($e);
//    header('Location: /maintainance.php');
}