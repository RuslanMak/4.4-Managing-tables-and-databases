<?php

require_once "function.php";
require_once 'config.php';

// список таблиц
listTable();

// кнопка на создание таблицы
buttonAddTable();

echo "<h3>Выбирете таблицу для подробной информации</h3>";
formTable();
