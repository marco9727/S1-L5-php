<?php 
include __DIR__ . '/includes/db.php';

$id = $_GET['id'];

// select che recupera i dati di questo id

include __DIR__ . '/includes/initialHtml.php'; ?>

<div class="container">


    <h1 class="text-center">Modifica Libro</h1>
    
    <form action="/S1-L5/logica-modifica.php" method="POST" novalidate>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" value="">
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore</label>
            <input type="text" class="form-control" id="autore" name="autore">
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">Genere</label>
            <input type="text" class="form-control" id="genere" name="genere">
        </div>
        <div class="mb-3">
            <label for="anno_pubblicazione" class="form-label">Anno di Rilascio</label>
            <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione">
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
</div>



<?php include __DIR__ . '/includes/endHtml.php';

