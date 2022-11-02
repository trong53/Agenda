<?php

function getAgendasID(INT $id_user, string $email) : array 
{
    require './database/db.php';
    $email = "%$email%";

    $query = "SELECT id FROM agendas WHERE id_user = ? OR guests LIKE ?";
    $sql = $connection->prepare($query);

    $sql->bindParam(1, $id_user, PDO::PARAM_INT);
    $sql->bindParam(2, $email, PDO::PARAM_STR);
    $sql->execute();
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($sql as $agenda) {
        $agendasID[] = $agenda['id'];
    }
    return $agendasID;
}

function getAgendasIDbyFilter(INT $id_user, string $email, INT $is_public) : array 
{
    require './database/db.php';
    $email = "%$email%";

    $query = "SELECT id FROM agendas WHERE (id_user = ? OR guests LIKE ?) AND is_public = ?";
    $sql = $connection->prepare($query);

    $sql->bindParam(1, $id_user, PDO::PARAM_INT);
    $sql->bindParam(2, $email, PDO::PARAM_STR);
    $sql->bindParam(3, $is_public, PDO::PARAM_INT);
    $sql->execute();
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($sql as $agenda) {
        $agendasID_byFilter[] = $agenda['id'];
    }
    return $agendasID_byFilter;
}

function getAgendabyID(INT $id_user, string $query) : array {
    require './database/db.php';
    $sql = $connection->prepare($query);
    $sql->bindParam(1, $id_user, PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function getAgendaCollaboratif(string $email, string $query) : array {
    require './database/db.php';
    $email = "%$email%";
    $sql = $connection->prepare($query);
    $sql->bindParam(1, $email, PDO::PARAM_STR);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function nbPost(string $id_agenda) : int {
    require './database/db.php';

    $query = "SELECT COUNT(*) AS nb_posts FROM events WHERE $id_agenda"; 
    $sql = $connection->prepare($query);
    $sql->execute();
    $result = $sql->fetch();
    $nbPost = $result['nb_posts'];
    return $nbPost;
}

function getEvents(string $id_agenda, string $filterEvent, $first, $perPage) : array {
    require './database/db.php';

    if ($filterEvent==='dateRecent') {
        $query = "SELECT * FROM events WHERE $id_agenda ORDER BY startdate LIMIT $first, $perPage";
    }elseif ($filterEvent==='dateFar') {
        $query = "SELECT * FROM events WHERE $id_agenda ORDER BY startdate DESC LIMIT $first, $perPage";
    }elseif ($filterEvent==='event') {
        $query = "SELECT * FROM events WHERE ($id_agenda) AND (type = 'event') LIMIT $first, $perPage";
    }elseif ($filterEvent==='task') {
        $query = "SELECT * FROM events WHERE ($id_agenda) AND (type = 'task') LIMIT $first, $perPage";
    }
    $sql = $connection->prepare($query);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function getEventbyIDevent(INT $id_event) : array {
    require './database/db.php';
    $query = "SELECT * FROM events WHERE id = ?";
    $sql = $connection->prepare($query);
    $sql->bindParam(1, $id_event, PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}