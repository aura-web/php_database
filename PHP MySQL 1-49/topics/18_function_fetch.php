<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

$sql = "SELECT * FROM customers WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => 'alice@example.com']);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo "Nama: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'];
} else {
    echo "Data tidak ditemukan.";
}
?>
