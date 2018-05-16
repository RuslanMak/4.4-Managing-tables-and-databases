<?php

require_once 'config.php';

try {
    // sql to create table
    $sql = "CREATE TABLE MyGuests2 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phone VARCHAR(50),
    reg_date TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

    // use exec() because no results are returned
    $pdo->exec($sql);
    echo "Table MyGuests created successfully" . "<br>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

//$dbo = null;

echo "<a href='index.php'>Go to home</a>";