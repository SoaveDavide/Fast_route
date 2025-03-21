<?php
namespace fast_route;

use PDO;
use PDOException;

class Db_connection
{
    private static ?PDO $db = null; // Usa "null" per evitare errori

    public static function getDB(array $config): PDO
    {
        if (self::$db === null) {
            try {
                self::$db = new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);
            } catch (PDOException $e) {
                die("Errore di connessione al database: " . $e->getMessage());
            }
        }
        return self::$db;
    }
}
