<?php
session_start();
require 'Database.php';
require 'User.php';

$config = require 'config.php';
$db = new Database($config['host'], $config['db'], $config['user'], $config['pass']);
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userId = $user->login($username, $password);
    if ($userId) {
        $_SESSION['user_id'] = $userId;
        header('Location: data.php');
    } else {
        echo 'Invalid credentials';
    }
}
?>
<form method="POST" action="login.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <button type="submit">Login</button>
</form>
<a href="register.php">Register</a>
