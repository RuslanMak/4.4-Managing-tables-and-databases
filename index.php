<?php

include_once "config.php";


// список таблиц

function listTable()
{
    global $pdo;
    $allTable = $pdo->query('SHOW TABLES');

    while($result = $allTable->fetch()) {
        echo $result[0] . '<br>';
    }
}

listTable();


$q = $pdo->query('SELECT id FROM MyGuests2');

if($q != true) {
    echo "<br>" . "<a href='add.php'>Добавить новую таблицу</a>" . "<br>";
}


