<?php
require_once '../header/header.php';
require_once '../DbConnection.php';

$config = require '../DBconfig.php';
$db = fast_route\Db_connection::getDB($config);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $codice_numerico = $_POST['codice'];
    $data_ritiro = $_POST['consegna'];
    $stato = 'ritirato';

    try {
        // Inserimento nella tabella ritirare
        $query = "INSERT INTO ritirare (numero_plico, data_ritiro) VALUES (:codice_numerico, :data_ritiro)";
        $stm = $db->prepare($query);
        $stm->bindValue(':codice_numerico', $codice_numerico, PDO::PARAM_INT);
        $stm->bindValue(':data_ritiro', $data_ritiro, PDO::PARAM_STR);
        $stm->execute();

        // Aggiornamento dello stato nella tabella plichi
        $query = "UPDATE plichi SET stato = :stato WHERE codice_numerico = :codice_numerico";
        $stm = $db->prepare($query);
        $stm->bindValue(':codice_numerico', $codice_numerico, PDO::PARAM_INT);
        $stm->bindValue(':stato', $stato, PDO::PARAM_STR);
        $stm->execute();

        echo "<p>Plico ritirato con successo!</p>";
    } catch (PDOException $e) {
        echo "<p>Errore: " . $e->getMessage() . "</p>";
    }
}
?>

<div class="container">
    <form method="post" action="inserimento_ritiro.php"> <!-- Corretto il file -->
        <h3>Inserimento di un plico per il ritiro</h3>

        <label for="codice">Inserisci il codice numerico</label>
        <input id="codice" name="codice" type="number" required>

        <label for="consegna">Inserisci la data di ritiro</label>
        <input id="consegna" name="consegna" type="date" required>

        <input type="submit" value="Inserisci">
    </form>
</div>

<?php
require_once '../footer/footer.php';
?>
