<?php
require 'Database.php';
require 'Integral.php';

$config = require 'config.php';
$db = new Database($config['host'], $config['db'], $config['user'], $config['pass']);
$integral = new Integral($db);

if (isset($_GET['lower'], $_GET['upper'], $_GET['result'])) {
    $lower = (float)$_GET['lower'];
    $upper = (float)$_GET['upper'];
    $result = (float)$_GET['result'];

    $integral->save($lower, $upper, $result);
    echo 'Data saved successfully';
} else {
    echo 'Invalid parameters';
}
?>
