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
$stmt = $pdo->query('SELECT * FROM libri');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
    <div class="container">
        <h1 class="my-4">Elenco Libri</h1>
        <ul class="list-group">
            <?php foreach ($stmt as $row) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= " $row[titolo] - $row[autore] - $row[genere] - $row[anno_pubblicazione]" ?></span>
                    <div class="btn-group" role="group" aria-label="Azioni">
                        <a href="/S1-L5/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Dettagli</a>
                        <a href="/S1-L5/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Elimina</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    
</body>
</html>