<?php

function createAgenda (string $name, INT $is_public, INT $id_user, string $guests): void 
{
    require './database/db.php';
    $sql = "INSERT INTO agendas (name, is_public, id_user, guests) VALUES (:name, :is_public, :id_user, :guests)";
    $query = $connection->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':is_public', $is_public, PDO::PARAM_INT);
    $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $query->bindParam(':guests', $guests, PDO::PARAM_STR);
    $query->execute();
}

function deleteAgenda(INT $id): void 
{
    require './database/db.php';
    $sql = "DELETE FROM agendas WHERE id = ?";
    $query = $connection->prepare($sql);
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute();
}