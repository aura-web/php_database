<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Query dengan prepared statement
$sql = "SELECT * FROM customers WHERE email = :email";
$stmt = $pdo->prepare($sql);

$email = 'john.doe@example.com';
$stmt->bindParam(':email', $email);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo "Nama: " . $result['name'] . "<br>";
    echo "Email: " . $result['email'];
} else {
    echo "Data tidak ditemukan.";
}
?>
