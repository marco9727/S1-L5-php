<?php

// include __DIR__ . "/includes/db.php";

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



$search = $_GET["search"] ?? " ";



// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('SELECT * FROM libri WHERE titolo LIKE ? OR autore LIKE ?');  
$stmt->execute([
    "%$search%",
    "%$search%"
]);


include  __DIR__ . "/includes/initialHtml.php";
?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Libreria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/S1-L5/createbook.php">Aggiungi libro</a>
                </li>
                </ul>
                <form class="d-flex" action="" method="get">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cerca..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cerca</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="my-4">Elenco Libri</h1>
        <ul class="list-group">
            <?php foreach ($stmt as $row) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= "$row[titolo] - $row[autore] - $row[genere] - $row[anno_pubblicazione]" ?></span>
                    <div class="btn-group" role="group" aria-label="Azioni">
                        <a href="/S1-L5/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Dettagli</a>
                        <a href="/S1-L5/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Elimina</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div> <?php

include __DIR__ . "/includes/endHtml.php";
 