<?php
require_once  '../header/header.php';
require_once '../DbConnection.php';

$config = require  '../DBconfig.php';

$db = fast_route\Db_connection::getDB($config);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $numero_telefono = $_POST['numero_telefono'];
    $email = $_POST['email'];
    $cognome = $_POST['cognome'];
    $punteggio = $_POST['punteggio'];

    // Correzione della query SQL
    $query = "INSERT INTO clienti (numero_telefono, nome, cognome, email, punteggio) 
              VALUES (:numero_telefono, :nome, :cognome, :email, :punteggio)";
    $stm = $db->prepare($query);
    $stm->bindValue(':numero_telefono', $numero_telefono);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':cognome', $cognome);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':punteggio', $punteggio);

    // Esegui la query
    $stm->execute();
}
?>

<div class="container">
    <form method="post" action="inserimento_cliente.php">
        <h3>Inserimento di un cliente</h3>

        <label for="email">Inserisci l'email del cliente</label>
        <input id="email" name="email" type="text" required>

        <label for="number">Inserisci il numero di telefono</label>
        <input id="number" name="numero_telefono" type="text" required>

        <label for="nome">Inserisci il nome</label>
        <input id="nome" name="nome" type="text" required>

        <label for="cognome">Inserisci il cognome</label>
        <input id="cognome" name="cognome" type="text" required>

        <label for="punteggio">Inserisci il punteggio</label>
        <input id="punteggio" name="punteggio" type="number" min = 0 required>
        <br>

        <input type="submit" value="Inserisci">
    </form>
</div>

<?php require_once'../footer/footer.php'; ?>
