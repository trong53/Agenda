<?php
require controllers('authentification');
require models('Event');
require models('agenda');

$error_name = '';
$message_create_agenda = '';

$current_page = $_GET['page']??'1';
$filter = (string)($_GET['filter']??'dateRecent');
$filter_exist = (isset($_GET['filterExist'])) ? "on" : "off";
$filter_event = $_GET['filterEvent']??"dateRecent";

if (isset($_POST['submitAgenda'])){

    $validate = true;
    $id_user = $_SESSION['id'];

    if (empty($_POST['name'])){
        $validate *= false;
        $error_name = 'Nom pas vide !';
    }else{
        $name = $_POST['name'];
    }

    $is_public = (int)($_POST['is_public']?? 0);

    $guests = '';
        if (!empty($_POST['invite'])){
            $guests = getGuests($_POST['invite']);
        }
    if ($validate) {
        createAgenda($name, $is_public, $id_user, $guests);
        $message_create_agenda = "Agenda enregistré avec succès";
    }
}

require views('createAgenda');