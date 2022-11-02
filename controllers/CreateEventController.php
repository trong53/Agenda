<?php
require controllers('authentification');
require models('Event');
require models('Home');

$current_page = $_GET['page']??'1';
$filter = (string)($_GET['filter']??'dateRecent');
$filter_exist = (isset($_GET['filterExist'])) ? "on" : "off";
$filter_event = $_GET['filterEvent']??"dateRecent";

$error_name = '';
$error_startdate = '';
$error_enddate = '';
$message_create_event = '';
$error_plage = '';
$error_agenda = '';

if (!empty($_POST['submitEvent'])) {
        
    $validate = true;
    $id_user = $_SESSION['id'];
    
    if (empty($_SESSION['checkedAgendas'])) {
        $error_agenda = "Vous devez choisir un agenda avant la création !";
        $validate *= false;
    }elseif (count($_SESSION['checkedAgendas']) != 1) {
        $error_agenda = "Vous devez choisir un SEUL agenda !";
        $validate *= false;
    }else{
        $id_agenda = $_SESSION['checkedAgendas'][0];
    }
    
    $type = 'event';

    if (empty($_POST['name'])){
        $validate *= false;
        $error_name = 'Nom pas vide !';
    }else{
        $name = $_POST['name'];
    }

    if (empty($_POST['startdate'])){
        $validate *= false;
        $error_startdate = 'Date de début pas vide !';
    }else{
        if (is_date($_POST['startdate'])) {
            $startdate = $_POST['startdate'];
        }else{
            $validate *= false;
            $error_startdate = 'Date de début pas correcte !';
        }
    }

    if (empty($_POST['enddate'])){
        $validate *= false;
        $error_enddate = 'Date de fin pas vide !';
    }else{
        if (is_date($_POST['enddate'])) {
            $enddate = $_POST['enddate'];
        }else{
                $validate *= false;
                $error_enddate = 'Date de fin pas correcte !';
        }
    }
    
    if (!empty(checkPlageDateEvent($id_user, $startdate, $enddate))) {
        $validate *= false;
        $error_plage = "Même plage de date !";
    }

    $guests = '';
    if (!empty($_POST['invite'])){
        $guests = getGuests($_POST['invite']);
    }

    $description = $_POST['description']; 
    $starthour = $_POST['starthour'];
    $endhour = $_POST['endhour'];

    if ($validate){
        
        insertEvent(
            $id_user,
            $id_agenda,
            $name,
            $description,
            $guests,
            $type,
            $startdate,
            $starthour,
            $enddate,
            $endhour);
        
        $message_create_event = "Evènement enregistré avec succès";
    }else{
        $message_create_event = '';
    }
}
require views('CreateEvent');