<?php

require_once 'config.php';

$tableName = $_GET['table'];
$column = $_GET['nameColumn'];
if ($_GET['typeColumn'] == 'int') {
    $fieldName = $pdo->query ('ALTER TABLE `' . $tableName . '` MODIFY `' . $column . '` INTEGER');
} else if ($_GET['typeColumn'] == 'date') {
    $fieldName = $pdo->query ('ALTER TABLE `' . $tableName . '` MODIFY `' . $column . '` DATE');
} else if ($_GET['typeColumn'] == 'text') {
    $fieldName = $pdo->query ('ALTER TABLE `' . $tableName . '` MODIFY `' . $column . '` TEXT');
}
echo 'Тип столбца изменен ' . "<br>";

echo "<h4><a href='index.php'>Перейти на главную страницу</a></h4>";