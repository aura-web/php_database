<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

$sql = "INSERT INTO customers (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':name' => 'Bob',
    ':email' => 'bob@example.com'
]);

echo "Data berhasil ditambahkan!";
?>
