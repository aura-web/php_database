<?php
require 'config.php'; // Menggunakan koneksi dari config.php

$pdo = getConnection();

// Cek apakah ID ada di URL
if (!empty($_GET['id'])) {
    $id = (int)$_GET['id']; // Pastikan ID adalah angka

    // Ambil data lama berdasarkan ID
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$customer) {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak diberikan.");
}

// Jika form disubmit, proses update data
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
            $sql = "UPDATE customers SET name = :name, email = :email WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':id' => $id
            ]);
            $message = "Data berhasil diperbarui!";
            header("Location: view.php"); // Redirect setelah update
            exit;
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
    <title>Update Data</title>
</head>
<body>
    <h1>Update Data Customer</h1>

    <?php if (!empty($message)): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="update.php?id=<?= htmlspecialchars($id) ?>">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($customer['name']) ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($customer['email']) ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
