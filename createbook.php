<?php 
include __DIR__ . "/includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica che tutti i campi siano stati forniti
    if (!isset($_POST['titolo'], $_POST['autore'], $_POST['anno_pubblicazione'], $_POST['genere'])) {
        // Gestione del caso in cui mancano dei dati
        echo "Si è verificato un errore: mancano dei dati.";
        exit;
    }

    // Recupera i dati dal modulo
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];

    // Verifica che l'anno di pubblicazione sia un numero positivo
    if (!is_numeric($anno_pubblicazione) || $anno_pubblicazione < 0) {
        echo "Si è verificato un errore: l'anno di pubblicazione non è valido.";
        exit;
    }

    // Prepara e esegui la query per l'inserimento di un nuovo libro
    $stmt = $pdo->prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) VALUES (:titolo, :autore, :anno_pubblicazione, :genere)");
    $stmt->execute([
        'titolo' => $titolo,
        'autore' => $autore,
        'anno_pubblicazione' => $anno_pubblicazione,
        'genere' => $genere,
    ]);

    // Reindirizza l'utente alla home page dopo l'inserimento
    header("Location: /S1-L5/index.php");
    exit;
}

include __DIR__ . "/includes/initialHtml.php"
?>


<div class="container">
    <h1 class="my-4">Aggiungi un nuovo libro</h1>
    
    <!-- Modulo per aggiungere un nuovo libro -->
    <form action="/S1-L5/index.php" method="POST">
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" required>
        </div>
        <div class="form-group">
            <label for="autore">Autore</label>
            <input type="text" class="form-control" id="autore" name="autore" required>
        </div>
        <div class="form-group">
            <label for="anno_pubblicazione">Anno di pubblicazione</label>
            <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" required>
        </div>
        <div class="form-group">
            <label for="genere">Genere</label>
            <input type="text" class="form-control" id="genere" name="genere" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
</div>

<?php 
include __DIR__ . "/includes/endHtml.php"; ?>
