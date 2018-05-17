<?php

require_once 'config.php';

$tableName = $_GET['table'];
$column = $_GET['nameColumn'];
$result = $pdo->query ("ALTER TABLE `" . $tableName . "` DROP COLUMN `" . $column ."`");
if ($result == true) {
    echo 'Столбец удален';
} else {
    echo 'Error';
}
echo '<br>';

echo "<h4><a href='index.php'>Перейти на главную страницу</a></h4>";