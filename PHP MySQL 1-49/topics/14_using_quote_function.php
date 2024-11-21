<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Input dari user
$user_input = "' OR 1=1 -- ";
$safe_input = $pdo->quote($user_input); // Menambahkan tanda kutip dan escape karakter

$sql = "SELECT * FROM customers WHERE name = $safe_input";
$stmt = $pdo->query($sql);

foreach ($stmt as $row) {
    echo $row['name'] . " - " . $row['email'] . "<br>";
}
?>
