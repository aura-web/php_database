<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

// Query data dari tabel customers
$sql = "SELECT * FROM customers";
$stmt = $pdo->query($sql);

// Menggunakan foreach untuk iterasi hasil query
if ($stmt->rowCount() > 0) {
    foreach ($stmt as $row) {
        echo $row['name'] . " - " . $row['email'] . "<br>";
    }
} else {
    echo "Tidak ada data.";
}
?>
