<?php


include __DIR__ . "/includes/db.php";

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();
?>
 <?php 
 include  __DIR__ . "/includes/initialHtml.php"; ?>

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
    <?php

include __DIR__ . "/includes/endHtml.php";
