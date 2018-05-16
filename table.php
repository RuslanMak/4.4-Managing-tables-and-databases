<?php

require_once 'function.php';

$table = $_POST['table'];

if ($table) {
    echo "<h2>$table</h2>";
    tableToDescribe("$table");
} else {
    echo "Для просмотра информации о таблице перейдите на главную страницу и выберете таблицу!!!";
}

echo "<h4><a href='index.php'>Перейти на главную страницу</a></h4>";

