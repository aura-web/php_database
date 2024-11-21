<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Menambahkan data baru ke tabel customers
$sql = "INSERT INTO customers (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => 'Charlie',
    ':email' => 'charlie@example.com'
]);

// Mendapatkan ID terakhir yang ditambahkan
$lastId = $pdo->lastInsertId();
echo "ID terakhir yang dimasukkan adalah: " . $lastId;
?>
