<?php

require_once 'db.php';

$queries = [
    "CREATE TABLE IF NOT EXISTS events
    (
        id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id_user INT(4) NOT NULL,
        id_agenda INT(4) NOT NULL,
        name VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
        description TEXT COLLATE 'utf8_general_ci',
        guests VARCHAR(500),
        type VARCHAR(50),
        startdate DATE NOT NULL,
        starthour VARCHAR(50),
        enddate DATE,
        endhour VARCHAR(50)
    )" ,
    
    "CREATE TABLE users
    (
        id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
        password VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
        email VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ",
    
    
    "CREATE TABLE agendas
    (
        id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        is_public BOOL NOT NULL,
        id_user INT(4) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        guests VARCHAR(500)
    ) "
   
];

foreach ($queries as $query) {
    try {
        $statement = $connection->prepare($query);
        $statement->execute();
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() .'<br/>';
    }
}
