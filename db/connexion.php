<?php
require_once __DIR__.'/../vendor/autoload.php';
if (!isset($dotenv)){
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();
}

$connexion = $_ENV['db_connection'];
$host = $_ENV['db_host'];
$db_name = $_ENV['db_database'];
$user = $_ENV['db_username'];
$pass = $_ENV['db_password'];
$charset = $_ENV['db_charset'];
$dsn = "$connexion:host=$host;dbname=$db_name;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Erreur de connexion : '.$e->getMessage();
}
