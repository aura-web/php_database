<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Menggunakan bindParam untuk mengikat parameter
$sql = "INSERT INTO customers (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);

$name = 'Robert';
$email = 'robert@example.com';

$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);

$stmt->execute();

echo "Data berhasil ditambahkan!";
?>
