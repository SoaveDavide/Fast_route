<?php
require_once '../header/header.php';
require_once '../DbConnection.php';

$config = require '../DBconfig.php';
$db = fast_route\Db_connection::getDB($config);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codice_numerico = $_POST['codice'];
    $stato = 'consegnato';
    $numero_telefono = $_POST['numero_telefono'];
    $email = $_POST['email'];
    $cf = $_POST['cf'];
    $data_consegna = $_POST['consegna'];

    // Inserimento nella tabella plichi
    $query = "INSERT INTO plichi (codice_numerico, email, stato, numero_telefono, cf_destinatario) 
              VALUES (:codice_numerico, :email, :stato, :numero_telefono, :cf_destinatario)";

    $stm = $db->prepare($query);
    $stm->bindValue(':codice_numerico', $codice_numerico);
    $stm->bindValue(':stato', $stato);
    $stm->bindValue(':numero_telefono', $numero_telefono);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':cf_destinatario', $cf);
    $stm->execute();

    // Inserimento nella tabella consegnare
    $query = "INSERT INTO consegnare (codice_numerico, data_consegna) VALUES (:codice_numerico, :data_consegna)";
    $smt  = $db->prepare($query);
    $smt->bindValue(':data_consegna', $data_consegna);
    $smt->bindValue(':codice_numerico', $codice_numerico);
    $smt->execute();
}
?>

<div class="container">
    <form method="post" action="inserimento_plico.php">
        <h3>Inserimento di un plico per la consegna</h3>

        <label for="codice">Inserisci il codice numerico</label>
        <input id="codice" name="codice" type="number" required>

        <label for="number">Inserisci il numero di telefono del cliente</label>
        <input id="number" name="numero_telefono" type="text" required>

        <label for="email">Inserisci l'email del personale che gestisce il plico</label>
        <input id="email" name="email" type="text" required>

        <label for="cf">Inserisci il codice fiscale del destinatario</label>
        <input id="cf" name="cf" type="text" required>

        <label for="consegna">Inserisci la data di consegna</label>
        <input id="consegna" name="consegna" type="date" required>

        <input type="submit" value="Inserisci">
    </form>
</div>

<?php
require_once '../footer/footer.php';
?>
