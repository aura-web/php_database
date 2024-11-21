<?php
$pdo = new PDO('mysql:host=localhost;dbname=aura_database;charset=utf8', 'root', '');
echo "Koneksi berhasil!";

$pdo = null; // Menutup koneksi
echo "Koneksi ditutup.";
?>
