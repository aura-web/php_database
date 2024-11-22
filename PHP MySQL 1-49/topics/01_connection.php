<?php
// Menggunakan PDO untuk membuat koneksi ke database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=aura_database;charset=utf8', 'root', '');
    echo "Koneksi berhasil!";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
