<?php
require_once '../header/header.php';
require_once '../DbConnection.php';

$config = require '../DBconfig.php';

$db = fast_route\Db_connection::getDB($config);

?>
<div class="container">
    <h2>Traccia il tuo plico</h2>
    <form method="post" action="singolo.php">
        <label for="codice_numerico">Inserisci il codice del plico:</label>
        <input type="number" name="codice_numerico" id="codice_numerico" required class="form-control mb-2">
        <input type="submit" value="Invia" class="btn btn-primary">
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $codice_numerico = $_POST['codice_numerico'];

    // Query corretta con il binding del parametro
    $query = "SELECT codice_numerico, stato FROM plichi WHERE codice_numerico = :codice_numerico";

    $stmt = $db->prepare($query);
    $stmt->bindValue(':codice_numerico', $codice_numerico, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch();

    if ($row) {
        echo '<div class="container mt-4">';
        echo '<table class="table table-bordered">';
        echo '<thead class="table-dark">';
        echo '<tr>';
        echo '<th>Codice Numerico</th>';
        echo '<th>Stato del Plico</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['codice_numerico']) . '</td>';
        echo '<td>' . htmlspecialchars($row['stato']) . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<div class="container mt-4 alert alert-warning">Plico non trovato. Controlla il codice inserito.</div>';
    }

    $stmt->closeCursor();
}

require_once '../footer/footer.php';
?>
