<?php

function is_date(string $date) : bool {
    $dateArr = explode('-', $date);
    return checkdate($dateArr[1], $dateArr[2], $dateArr[0]);
}

function checkPlageDateEvent(INT $id_user, string $startdate, string $enddate) {
    require './database/db.php';
    $sql = $connection->prepare("SELECT id FROM events WHERE id_user = ? AND startdate = ? AND enddate = ?");
    $sql->bindParam(1, $id_user);
    $sql->bindParam(2, $startdate);
    $sql->bindParam(3, $enddate);

    $sql->execute();
    return $sql->fetchColumn();
}

function getGuests(string $invites) : string 
{
    require './database/db.php';
    $guests = '';
    
    $delimiters = array(',',';','|');
    $guest_emails = str_replace($delimiters, $delimiters[0], $invites);
    $email_Array = explode($delimiters[0], $guest_emails);
   
    foreach ($email_Array as $key => $email){

        $email = strtolower(trim($email));

        $sql = $connection->prepare("SELECT id FROM users WHERE email = ?");
        $sql->bindParam(1, $email);
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        if (!empty($sql[0])) {
            $guests .= $email . ',';
        }
    }
    return $guests = rtrim($guests,',');
}

function insertEvent(INT $id_user, INT $id_agenda, string $name, string $description, 
                    string $guests, string $type, string $startdate, string $starthour, 
                    string $enddate, string $endhour) : void
{
    require './database/db.php';
    
    $query = "INSERT INTO events (id_user, id_agenda, name, description, guests, type, startdate, starthour, enddate, endhour)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $sql = $connection->prepare($query);

    $sql->bindParam(1, $id_user);
    $sql->bindParam(2, $id_agenda);
    $sql->bindParam(3, $name);
    $sql->bindParam(4, $description);
    $sql->bindParam(5, $guests);
    $sql->bindParam(6, $type);
    $sql->bindParam(7, $startdate);
    $sql->bindParam(8, $starthour);
    $sql->bindParam(9, $enddate);
    $sql->bindParam(10, $endhour);

    $sql->execute();
}

function insertTask(INT $id_user, INT $id_agenda, string $name, string $description, 
                    string $type, string $startdate, string $starthour) : void
{
    require './database/db.php';
    
    $query = "INSERT INTO events (id_user, id_agenda, name, description, type, startdate, starthour)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $sql = $connection->prepare($query);

    $sql->bindParam(1, $id_user);
    $sql->bindParam(2, $id_agenda);
    $sql->bindParam(3, $name);
    $sql->bindParam(4, $description);
    $sql->bindParam(5, $type);
    $sql->bindParam(6, $startdate);
    $sql->bindParam(7, $starthour);

    $sql->execute();
}

function modifyEvent(INT $id_event, string $name, string $description, string $guests,
                    string $startdate, string $starthour, string $enddate, string $endhour) : void
{
    require './database/db.php';

    $query = "UPDATE events SET name=?, description=?, guests=?, startdate=?, starthour=?, enddate=?, endhour=?  
            WHERE id = ?";

    $sql = $connection->prepare($query);

    $sql->bindParam(1, $name);
    $sql->bindParam(2, $description);
    $sql->bindParam(3, $guests);
    $sql->bindParam(4, $startdate);
    $sql->bindParam(5, $starthour);
    $sql->bindParam(6, $enddate);
    $sql->bindParam(7, $endhour);
    $sql->bindParam(8, $id_event);

    $sql->execute();
}

function modifyTask(INT $id_event, string $name, string $description,
                    string $startdate, string $starthour) : void
{
    require './database/db.php';

    $query = "UPDATE events SET name=?, description=?, startdate=?, starthour=?  
            WHERE id = ?";

    $sql = $connection->prepare($query);

    $sql->bindParam(1, $name);
    $sql->bindParam(2, $description);
    $sql->bindParam(3, $startdate);
    $sql->bindParam(4, $starthour);
    $sql->bindParam(5, $id_event);

    $sql->execute();
}

function deleteEvent(INT $id) : void
{
    require $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';

    $query = "DELETE FROM events WHERE id = ?";
    $sql = $connection->prepare($query);
    $sql->bindParam(1, $id);
    $sql->execute();
}

function deleteEventbyIdagenda(INT $id_agenda) : void
{
    require $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';

    $query = "DELETE FROM events WHERE id_agenda = ?";
    $sql = $connection->prepare($query);
    $sql->bindParam(1, $id_agenda);
    $sql->execute();
}

function checkCreator(INT $delete_Id, INT $id_user, string $type) : bool {
    require $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';
    if ($type == 'event') {
        $query = "SELECT id_user FROM events WHERE id = ?";
    }elseif ($type == 'agenda') {
        $query = "SELECT id_user FROM agendas WHERE id = ?";
    }
    $sql = $connection->prepare($query);
    $sql->bindParam(1, $delete_Id);
    $sql->execute();
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($sql[0]) && ($sql[0]['id_user'] == $id_user)) {
        return true;
    }else{
        return false;
    }
}