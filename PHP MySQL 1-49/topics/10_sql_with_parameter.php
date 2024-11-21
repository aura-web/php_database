<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Contoh query SQL dengan parameter
$sql = "SELECT * FROM customers WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => 'aura@example.com']); // Ganti dengan email yang sesuai

$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo "Nama: " . $result['name'] . "<br>";
    echo "Email: " . $result['email'];
} else {
    echo "Data tidak ditemukan.";
}
?>
