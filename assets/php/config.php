<?php
    /* Connect to a MySQL database using driver invocation */
    $dsn = 'mysql:dbname=blog_db;host=localhost';
    $user = 'root';
    $password = 'root';

    try {
        $pdo = new PDO($dsn, $user, $password);
        echo 'Connection performed with success';
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

?>