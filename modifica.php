<?php 
include __DIR__ . '/includes/db.php';

$id = $_GET['id'];

// Query per recuperare i dati del libro in base all'ID
$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$id]);
$libro = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se il libro è stato trovato
if (!$libro) {
    // Gestione del caso in cui il libro non viene trovato
    echo "Libro non trovato";
    exit; // Esce dallo script
}

// Estrai i valori dal risultato della query
$titolo = $libro['titolo'];
$autore = $libro['autore'];
$genere = $libro['genere'];
$anno_pubblicazione = $libro['anno_pubblicazione'];

include __DIR__ . '/includes/initialHtml.php'; 
?>

<div class="container">
    <h1 class="text-center">Modifica Libro</h1>
    
    <form action="/S1-L5/logica-modifica.php" method="POST" novalidate>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" value="<?= htmlspecialchars($titolo) ?>">
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore</label>
            <input type="text" class="form-control" id="autore" name="autore" value="<?= htmlspecialchars($autore) ?>">
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">Genere</label>
            <input type="text" class="form-control" id="genere" name="genere" value="<?= htmlspecialchars($genere) ?>">
        </div>
        <div class="mb-3">
            <label for="anno_pubblicazione" class="form-label">Anno di Rilascio</label>
            <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" value="<?= htmlspecialchars($anno_pubblicazione) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
</div>

<?php include __DIR__ . '/includes/endHtml.php'; ?>





