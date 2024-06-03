<?php
class Integral
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function save($lowerBound, $upperBound, $result)
    {
        $this->db->query('INSERT INTO integrals (lower_bound, upper_bound, result) VALUES (?, ?, ?)', [$lowerBound, $upperBound, $result]);
    }

    public function getAll()
    {
        $stmt = $this->db->query('SELECT * FROM integrals ORDER BY timestamp DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
