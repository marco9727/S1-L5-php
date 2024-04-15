<?php

$host = 'localhost';
$db   = 'gestione_libreria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// comando che connette al database
$pdo = new PDO($dsn, $user, $pass, $options);

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli libro</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title"><?= $row['titolo'] ?></h1>
                        <h2 class="card-subtitle mb-3"><?= $row['autore'] ?></h2>
                        <p class="card-text"><strong>Genere:</strong> <?= $row['genere'] ?></p>
                        <p class="card-text"><strong>Anno di pubblicazione:</strong> <?= $row['anno_pubblicazione'] ?></p>
                        <a href="/S1-L5/modifica.php?id=<?= $row['id'] ?>" class="btn btn-primary">Modifica</a>
                        <a href="/S1-L5/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>