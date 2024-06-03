<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require 'Database.php';
require 'Integral.php';

$config = require 'config.php';
$db = new Database($config['host'], $config['db'], $config['user'], $config['pass']);
$integral = new Integral($db);

$rows = $integral->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Integral Results</title>
</head>
<body>
    <h1>Integral Results</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Lower Bound</th>
            <th>Upper Bound</th>
            <th>Result</th>
            <th>Timestamp</th>
        </tr>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['lower_bound']) ?></td>
            <td><?= htmlspecialchars($row['upper_bound']) ?></td>
            <td><?= htmlspecialchars($row['result']) ?></td>
            <td><?= htmlspecialchars($row['timestamp']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
