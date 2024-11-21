<?php
function getConnection() {
    $dsn = "mysql:host=localhost;dbname=aura_database;charset=utf8";
    $username = "root"; // Username MySQL
    $password = ""; // Password MySQL
    try {
        return new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        die("Koneksi ke database gagal: " . $e->getMessage());
    }
}
?>
