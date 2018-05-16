<?php

require_once 'config.php';

// создание новой таблицы
function addTable()
{
    global $pdo;
    $sql = "CREATE TABLE NewMyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phone VARCHAR(50),
    reg_date TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

    // use exec() because no results are returned
    $pdo->exec($sql);
    echo "Таблица 'NewMyGuests' была создана успешно!" . "<br>";
}

// кнопка на создание таблицы
function buttonAddTable()
{
    global $pdo;
    // проверка на существование таблицы
    $q = $pdo->query('SELECT id FROM NewMyGuests');
    if($q != true) {
        echo "<br>" . "<a href='add.php'>Добавить новую таблицу</a>" . "<br>";
    }
}

// форма для выбора таблицы
function formTable()
{
    echo "<form method='POST' action='table.php'>";
    echo "  <select name='table'>";

    global $pdo;
    $allTable = $pdo->query('SHOW TABLES');
    while($result = $allTable->fetch()) {
        echo "<option value='" . "$result[0]" . "'>" . "$result[0]" . "</option>";
    }

    echo "  </select>";
    echo "  <input type='submit' value='Просмотреть информацию' />";
    echo "</form>";
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

// информация о таблице
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