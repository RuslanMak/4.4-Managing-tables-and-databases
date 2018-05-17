<?php

require_once "function.php";
require_once 'config.php';

// список таблиц
listTable();

// кнопка на создание таблицы
buttonAddTable();

echo "<h3>Выбирете таблицу для подробной информации</h3>";
formTable();

?>

<form method="POST">
    <input required type = 'text' name = 'field' value="<?php fieldText() ?>">
    <select name = 'type' required >
        <option value="<?php typeText() ?>"><?php typeText() ?></option>
        <option value="int">int</option>
        <option value="text">text</option>
        <option value="date">date</option>
    </select>
    <input type="submit" name="edit" value="Изменить"><input type="submit" name="add" value="Добавить">
</form>


<?php
foreach (columns() as $value) {
echo '<tr >';
    echo '  <td >' .$value['Field']. '</td >';
    echo '  <td >' .$value['Type']. '</td >';
    echo '  <td >' .$value['Null']. '</td >';
    echo '  <td >' .$value['Key']. '</td >';
    echo '  <td >' .$value['Default']. '</td >';
    echo '  <td >' .$value['Extra']. '</td >';
    echo '    <td>';
        if ($_GET['name'] !== 'tasks' && $_GET['name'] !== 'user') {  // Что бы не затрагивать таблицы других домашних заданий
        echo '  <a href = "?field=' . $value['Field'] .'&action=delete&name=' . $_GET['name'] .'">Удалить</a>';
        }
        echo '    </td>';
    echo '    <td>';
        if ($_GET['name'] !== 'tasks' && $_GET['name'] !== 'user') {  // Что бы не затрагивать таблицы других домашних заданий
        echo '  <a href = "?field=' . $value['Field'] .'&action=edit&name=' . $_GET['name'] .'">Изменить</a>';
        }
        echo '    </td>';
    echo '</tr >';
}
echo '</tbody>';
echo '</table><br>';


// Получим структуру таблицы
function columns() {
    global $pdo;
    $stmt = $pdo->prepare('SHOW COLUMNS FROM '. $_GET['name'] .'');
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}