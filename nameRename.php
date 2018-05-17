<?php

require_once 'config.php';

$tableName = $_GET['tableName'];
$oldNameColumn = $_GET['oldNameColumn'];
$newNameColumn = $_GET['newNameColumn'];
$newNameQuery = $pdo->query ('ALTER TABLE `' . $tableName . '` CHANGE `' . $oldNameColumn . '` `' . $newNameColumn . '` INT');
echo "Имя столбца изменено на " . $newNameColumn . "<br>";

echo "<h4><a href='index.php'>Перейти на главную страницу</a></h4>";