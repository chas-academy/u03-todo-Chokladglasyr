<?php

$servername = 'mariadb';
$username = 'root';
$password = 'todo-ida';
$dbname = 'u03-ida';

try {
    $conn = new PDO ("mysql:host $servername;dbname=$dbname", $username, $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMOD_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]
    );
} catch (PDOException $e) {
    //Logga felmeddelandet:
    error_log("Database connection failed: " . $e->getMessage());
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


?>