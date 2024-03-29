<?php

require_once './config.php';

try {
    $connection = new PDO(
        'mysql:host=' . CONFIG['database']['host'] . ';dbname=' . CONFIG['database']['db_name'] . ';charset=utf8',
        CONFIG['database']['user'],
        CONFIG['database']['password']
    );
} catch(\Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
