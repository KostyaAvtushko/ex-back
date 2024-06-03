<?php
class Database
{
    private $pdo;

    public function __construct($host, $db, $user, $pass)
    {
        $dsn = "pgsql:host=$host;dbname=$db";
        $this->pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
?>
