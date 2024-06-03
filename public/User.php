<?php
class User
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function register($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $this->db->query('INSERT INTO users (username, password) VALUES (?, ?)', [$username, $hashedPassword]);
    }

    public function login($username, $password)
    {
        $stmt = $this->db->query('SELECT * FROM users WHERE username = ?', [$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user['id'];
        }
        return false;
    }
}
?>
