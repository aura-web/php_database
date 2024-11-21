<?php
require 'config.php'; // Menggunakan koneksi dari config.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $errors = [];

    // Validasi input
    if (empty($name)) {
        $errors[] = "Nama tidak boleh kosong.";
    }
    if (empty($email)) {
        $errors[] = "Email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    // Jika tidak ada error, simpan data
    if (empty($errors)) {
        try {
            $pdo = getConnection();
            $sql = "INSERT INTO customers (name, email) VALUES (:name, :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':name' => $name, ':email' => $email]);
            $message = "Data berhasil ditambahkan!";
        } catch (PDOException $e) {
            $errors[] = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
</head>
<body>
    <h1>Form Input Data</h1>
    <?php if (!empty($message)): ?>
        <p style="color: green;"><?= $message ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="insert.php">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
