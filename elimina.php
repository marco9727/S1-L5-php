<?php


include __DIR__ . "/includes/db.php";

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('DELETE FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

header("Location: /S1-L5/");