<?php
require 'config.php'; // Menggunakan koneksi dari config.php

$pdo = getConnection();

// Cek apakah ID ada di URL
if (!empty($_GET['id'])) {
    $id = (int)$_GET['id']; // Pastikan ID adalah angka

    try {
        // Hapus data berdasarkan ID
        $stmt = $pdo->prepare("DELETE FROM customers WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: view.php"); // Redirect kembali ke view.php
        exit;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    die("ID tidak diberikan.");
}
?>
