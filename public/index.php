<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include '../db/queries.php';

$title = '';
const PUBLIC_PATH = __DIR__;
const VIEWS_DIR = PUBLIC_PATH.'/../views';

switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        $title = 'Page d’accueil';
        include VIEWS_DIR.'/home.php';
        break;
    case '/presences':
        $title = 'Prendre les présences';
        include VIEWS_DIR.'/attendances/index.php';
        break;
    case '/etudiants':
        $title = 'Tous les étudiants';
        include VIEWS_DIR.'/students/index.php';
        break;
    default:
        $title = '404';
        include VIEWS_DIR.'/404.php';
}
