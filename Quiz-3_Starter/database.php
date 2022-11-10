<?php
    $dsn = 'mysql:host=127.0.0.1;dbname=my_guitar_shop1';
    $username = 'me';
    $password = '1';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?> 