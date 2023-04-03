<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=web_lab3';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $ex) {
    echo $ex->GetMessage();
}

?>