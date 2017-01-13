<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . '/api/db/connection.php';
$dsn = DB_DSN;

$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);



$stmt = $pdo->query('SELECT * FROM hotels');


while ($row = $stmt->fetch())
{
    echo $row['id'] . "\n";
}


?>