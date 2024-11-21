<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Membuat tabel baru
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    total_price DECIMAL(10, 2),
    order_date DATE
)";
$pdo->exec($sql);

echo "Tabel orders berhasil dibuat!";
?>
