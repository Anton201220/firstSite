<?php
$user = 'root';
$password = 'asDf';
$db = 'cars';
$host = 'localhost';
$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn,$user,$password);
?>