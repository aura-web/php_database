<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Contoh input berbahaya dari user
$user_input = "' OR 1=1 -- ";

$sql = "SELECT * FROM customers WHERE name = '$user_input'";
$stmt = $pdo->query($sql); // Query ini berisiko terhadap SQL Injection

foreach ($stmt as $row) {
    echo $row['name'] . " - " . $row['email'] . "<br>";
}

// **Hindari cara ini di aplikasi nyata.**
// Gunakan prepared statement untuk keamanan.
?>
