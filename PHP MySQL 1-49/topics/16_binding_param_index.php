<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Menggunakan tanda tanya (?) sebagai placeholder parameter
$sql = "INSERT INTO customers (name, email) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);

$name = 'Alice';
$email = 'alice@example.com';

$stmt->execute([$name, $email]);

echo "Data berhasil ditambahkan!";
?>
