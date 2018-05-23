<?php

require_once 'function.php';

$table = $_POST['table'];

if ($table) {
//    echo "<h2>$table</h2>";
//    tableToDescribe("$table");
} else {
    header("Location: index.php");
}

echo "<h4><a href='index.php'>Перейти на главную страницу</a></h4>";

echo '<h3>Таблица - ' . $table . '</h3>';
$result = $pdo->query ("
SELECT `COLUMN_NAME`, `COLUMN_TYPE`
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='hw4-4'
/** WHERE `TABLE_SCHEMA`='rmakarov' */
AND `TABLE_NAME`='$table';");
$result = $result->fetchAll(PDO::FETCH_ASSOC);
echo '<table border="1"><tr>';
foreach ($result as $row) {
    echo '<td>';
    echo 'Имя столбца - ' . $row['COLUMN_NAME'] .
        '<br />Тип столбца - ' . $row['COLUMN_TYPE'] .
        '<br /><a href="fieldRemove.php?table=' . $table . '&nameColumn=' . $row['COLUMN_NAME'] . ' ">Удалить столбец</a>' .
        '<br />Изменить тип на: '.
        '<a href="fieldRename.php?table=' . $table . '&nameColumn=' . $row['COLUMN_NAME'] . '&typeColumn=int ">INT</a>' . ' ' .
        '<a href="fieldRename.php?table=' . $table . '&nameColumn=' . $row['COLUMN_NAME'] . '&typeColumn=date ">DATE</a>' . ' ' .
        '<a href="fieldRename.php?table=' . $table . '&nameColumn=' . $row['COLUMN_NAME'] . '&typeColumn=text ">TEXT</a>' . ' ' .
        '<br />';
    $oldNameColumn = $row['COLUMN_NAME'];

?>

    <html>
    <head>
    </head>
    <body>
    <form action="nameRename.php" method="GET" enctype="multipart/form-data">
        <input type='text' name='newNameColumn' placeholder='Введите новое имя'/>
        <input type='hidden' name="tableName" value="<?php echo $table; ?>" />
        <input type='hidden' name="oldNameColumn" value="<?php echo $oldNameColumn; ?>" />
        <input type='submit' value='Изменить имя столбца'></form>
    </body>
    </html>

    <?php
    echo '</td>';
}

