<?php 
include __DIR__ . "/includes/db.php";

// Verifica che tutti i campi siano stati forniti
if (!isset($_POST['id'], $_POST['titolo'], $_POST['autore'], $_POST['anno_pubblicazione'], $_POST['genere'])) {
    
    echo "Si è verificato un errore: mancano dei dati.";
    exit;
}

// Recupera i dati dal modulo
$id = $_POST['id'];
$titolo = $_POST['titolo'];
$autore = $_POST['autore'];
$anno_pubblicazione = $_POST['anno_pubblicazione'];
$genere = $_POST['genere'];

// Verifica che l'anno di pubblicazione sia un numero positivo
if (!is_numeric($anno_pubblicazione) || $anno_pubblicazione < 0) {
    echo "Si è verificato un errore: l'anno di pubblicazione non è valido.";
    exit;
}

// Preparo ed eseguo la query di aggiornamento
$stmt = $pdo->prepare("UPDATE libri SET titolo = :titolo, autore = :autore, anno_pubblicazione = :anno_pubblicazione, genere = :genere WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'titolo' => $titolo,
    'autore' => $autore,
    'anno_pubblicazione' => $anno_pubblicazione,
    'genere' => $genere,
]);

// Reindirizza l'utente alla pagina principale dopo l'aggiornamento
header("Location: /S1-L5/index.php");
exit;
?>