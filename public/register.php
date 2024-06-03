<?php
require 'Database.php';
require 'User.php';

$config = require 'config.php';
$db = new Database($config['host'], $config['db'], $config['user'], $config['pass']);
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user->register($username, $password);
    header('Location: login.php');
}
?>
<form method="POST" action="register.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <button type="submit">Register</button>
</form>
