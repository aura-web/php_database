<?php
try {
    // Simulasi error koneksi
    $pdo = new PDO('mysql:host=localhost;dbname=wrong_db', 'root', '');
} catch (PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
