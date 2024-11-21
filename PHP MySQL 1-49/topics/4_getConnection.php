<?php
function getConnection() {
    $dsn = "mysql:host=localhost;dbname=aura_database;charset=utf8";
    $username = "root";
    $password = "";
    try {
        return new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}

// Menggunakan fungsi getConnection
$pdo = getConnection();
echo "Koneksi berhasil!";
?>
