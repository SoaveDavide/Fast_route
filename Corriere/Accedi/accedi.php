<?php
require_once  '../header/header.php';
require_once '../DbConnection.php';

$config = require  '../DBconfig.php';

$db = fast_route\Db_connection::getDB($config);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparazione query per ottenere la password hashata
    $query = "SELECT password FROM personale WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    //recupero il risultato della query
    $row = $stmt->fetch();

    //converto la password dal database hashata
    $hashed_password = password_hash($row['password'], PASSWORD_DEFAULT);

    if (password_verify($password, $hashed_password)) {
        echo "<p>Login riuscito! Benvenuto.</p>";
        // Reindirizza l'utente
        header("Location: ../homepage/homepage.php");
        exit();
    } else {
        echo "<p style='color: red;'>Email o password errata.</p>";
    }
}
?>

<div class="container">
    <form method="post" action="accedi.php">
        <h3>Accedere all'account personale</h3>

        <label for="email">Inserisci l'email personale</label>
        <input id="email" name="email" type="text" required>

        <label for="password">Inserisci la password</label>
        <input id="password" name="password" type="password" required>
        <br>
        <input type="submit" value="Accedi">
    </form>
</div>

<?php require_once'../footer/footer.php'; ?>
