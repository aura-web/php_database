<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Input dari user (contoh input dari form GET)
$name = $_GET['name'] ?? '';

// Menggunakan prepared statement untuk keamanan
$sql = "SELECT * FROM customers WHERE name = :name";
$stmt = $pdo->prepare($sql);
$stmt->execute([':name' => $name]);

// Menampilkan hasil query
if ($stmt->rowCount() > 0) {
    foreach ($stmt as $row) {
        echo $row['name'] . " - " . $row['email'] . "<br>";
    }
} else {
    echo "Data tidak ditemukan.";
}
?>
