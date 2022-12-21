<?php 
    
    $host = '127.0.0.1';
    $db = 'ddd';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'book.php';
    require_once 'admindb.php';
    $crud = new crud($pdo);
    $admin = new admin($pdo);
    $book = new book($pdo);
?>