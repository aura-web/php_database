<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Query dengan prepared statement
$sql = "INSERT INTO customers (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);

$name = 'Azalia Aura';
$email = 'azaliaaura@example.com';

$stmt->execute([':name' => $name, ':email' => $email]);

echo "Data berhasil ditambahkan!";
?>
