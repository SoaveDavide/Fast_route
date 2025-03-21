<?php
require_once  '../header/header.php';
require_once '../DbConnection.php';

$config = require  '../DBconfig.php';

$db = fast_route\Db_connection::getDB($config);
?>
<?php
require_once  '../footer/footer.php';
