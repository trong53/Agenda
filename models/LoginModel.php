<?php

function checkSignIn($email, $password) {
    
    require './database/db.php';
    
    $sql = $connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $sql -> bindparam(1, $email);
    $sql -> bindparam(2, $password);

    $sql->execute();
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION = null;
    if (!empty($sql[0])){
        $_SESSION = $sql[0];
    }
    return $_SESSION;
}