<?php
$servername = "mysql-data";
$username = "admin";
$password = "admin";
$db_name = "db";

$dsn = "mysql:dbname=$db_name;host=$servername";

// Create connection
$conn = new PDO($dsn, $username, $password);

// Check connection
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
?>