<?php
require_once  '../header/header.php';
require_once '../DbConnection.php';

$config = require  '../DBconfig.php';
$db = fast_route\Db_connection::getDB($config);

// Modifica della query per includere anche numero_telefono e cf_destinatario
$query = "SELECT 
    p.codice_numerico, 
    p.stato,
    c.data_consegna, 
    s.data_spedizione, 
    r.data_ritiro,
    cli.numero_telefono,        -- Aggiungi il numero di telefono del mittente
    dest.cf AS cf_destinatario  -- Aggiungi il codice fiscale del destinatario
FROM 
    fast_route.plichi p
JOIN 
    fast_route.consegnare c ON p.codice_numerico = c.codice_numerico
JOIN 
    fast_route.spedire s ON p.codice_numerico = s.numero_plico
JOIN 
    fast_route.ritirare r ON p.codice_numerico = r.numero_plico
JOIN 
    fast_route.clienti cli ON p.numero_telefono = cli.numero_telefono  
JOIN 
    fast_route.destinatari dest ON p.cf_destinatario = dest.cf;";

$stmt = $db->prepare($query);
$stmt->execute();

// Output della dashboard
echo '<table class="table-styled"> ';
echo '<thead>';
echo '<tr>';
echo '<th>Codice numerico</th>';
echo '<th>Stato del plico</th>';
echo '<th>Numero di telefono del mittente</th>';
echo '<th>Codice fiscale del destinatario</th>';
echo '<th>Data di consegna</th>';
echo '<th>Data di spedizione</th>';
echo '<th>Data di ritiro</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['codice_numerico'] . '</td>';
    echo  '<td>' . $row['stato'] . '</td>';
    echo '<td>' . $row['numero_telefono'] . '</td>';
    echo '<td>' . $row['cf_destinatario'] . '</td>';
    echo '<td>' . $row['data_consegna'] . '</td>';
    echo '<td>' . $row['data_spedizione'] . '</td>';
    echo '<td>' . $row['data_ritiro'] . '</td>';
    echo '</tr>';  // Aggiungi la chiusura della riga della tabella
}

echo '</tbody>';
echo '</table>';

$stmt->closeCursor();
?>
<?php
require_once  '../footer/footer.php';
?>
