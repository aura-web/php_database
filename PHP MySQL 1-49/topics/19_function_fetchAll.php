<?php
require '../config.php'; // Path relatif ke config.php

$pdo = getConnection();

$sql = "SELECT * FROM customers";
$stmt = $pdo->query($sql);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    echo $row['name'] . " - " . $row['email'] . "<br>";
}
?>
