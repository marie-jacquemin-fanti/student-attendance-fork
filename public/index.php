<?php

include '../db/queries.php';

$title = '';


switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        $title = 'Page d’accueil';
        include '../views/home.php';
        break;
    case '/presences':
        $title = 'Prendre les présences';
        include '../views/attendances/index.php';
        break;
    case '/etudiants':
        $title = 'Tous les étudiants';
        include '../views/students/index.php';
        break;
    default:
        $title = '404';
        include '../views/404.php';
}
