<?php
require controllers('authentification');
require models('Event');
require models('Home');

$current_page = $_GET['page']??'1';
$filter = (string)($_GET['filter']??'dateRecent');
$filter_exist = (isset($_GET['filterExist'])) ? "on" : "off";
$filter_event = $_GET['filterEvent']??"dateRecent";

if (!empty($_GET['id'])) {
    $_SESSION['modifyEvent'] = $_GET['id'];
}

$error_name = '';
$error_startdate = '';
$error_enddate = '';
$message_modify_event = '';
$error_plage = '';
$error_agenda = '';

if (!empty($_POST['modifyEvent'])) {
        
    $validate = true;
    $id_user = $_SESSION['id'];

    if (empty($_POST['name'])){
        $validate *= false;
        $error_name = 'Name not empty !';
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
    
    if ($validate) {
        if(!empty(checkPlageDateEvent($id_user, $startdate, $enddate))) {
            $validate *= false;
            $error_plage = "Même plage de date !";
        }
    }

    $guests = '';
    if (!empty($_POST['invite'])){
        $guests = getGuests($_POST['invite']);
    }

    $description = $_POST['description']; 
    $starthour = $_POST['starthour'];
    $endhour = $_POST['endhour'];

    if ($validate) {
        modifyEvent($_SESSION['modifyEvent'], 
                    $name, 
                    $description, 
                    $guests, 
                    $startdate, 
                    $starthour, 
                    $enddate,
                    $endhour);

        $message_modify_event = "Evènement modifié avec succès";
    }
}
$actual_event = getEventbyIDevent($_SESSION['modifyEvent']);
require views('modifyEvent');