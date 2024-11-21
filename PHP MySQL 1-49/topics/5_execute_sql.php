<?php
// Menggunakan execute() untuk menjalankan SQL
require '../config.php';  // Path relatif menuju config.php

$pdo = getConnection();

// Menghapus tabel jika sudah ada
$sql = "DROP TABLE IF EXISTS customers";
$pdo->exec($sql);

// Membuat tabel baru
$sql = "CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
)";
$pdo->exec($sql);

echo "Tabel berhasil dibuat!";
?>
