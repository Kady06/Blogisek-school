<?php


$host = DB_HOST;
$user = DB_USER;
$passwd = DB_PASSWORD;
$schema = DB_SCHEMA;
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;


try {
    $pdo = new PDO($dsn, $user, $passwd);
    

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->exec('SET NAMES utf8');
} catch (PDOException $e) {

    echo 'Database connection failed: ' . $e->getMessage();
    die();
}