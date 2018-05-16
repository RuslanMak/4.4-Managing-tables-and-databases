<?php

require_once 'config.php';

// добавить таблицу
function addTable()
{
    global $pdo;
    $q = $pdo->query('SELECT id FROM MyGuests2');

    if($q != true) {
        echo "<br>" . "<a href='add.php'>Добавить новую таблицу</a>" . "<br>";
    }
}

// список таблиц
function listTable()
{
    global $pdo;
    $allTable = $pdo->query('SHOW TABLES');

    while($result = $allTable->fetch()) {
        echo $result[0] . '<br>';
    }
}

// информация о таблицэ
function tableToDescribe($tableToDescribe)
{
    global $pdo;

    $statement = $pdo->query('DESCRIBE ' . $tableToDescribe);

    //Fetch our result.
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    //For the sake of this tutorial, I will loop through the result
    //and print out the column names and their types.
    foreach($result as $column){
        echo $column['Field'] . ' - ' . $column['Type'], '<br>';
    }

    //The result should be an array of arrays,
    //with each array containing information about the columns
    //that the table has.
    echo "<br>";
//    echo "<pre>";
    var_dump($result);
}