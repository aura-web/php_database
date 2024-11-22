<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Pastikan tabel memiliki data sebelum di-query
$sql = "SELECT * FROM customers";
$stmt = $pdo->query($sql);

// Menampilkan hasil query
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['name'] . " - " . $row['email'] . "<br>";
    }
} else {
    echo "Tidak ada data di tabel customers.";
}
?>
