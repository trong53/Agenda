<?php
require controllers('authentification');
require models('Event');
require models('Home');

$current_page = $_GET['page']??'1';
$filter = (string)($_GET['filter']??'dateRecent');
$filter_exist = (isset($_GET['filterExist'])) ? "on" : "off";
$filter_event = $_GET['filterEvent']??"dateRecent";

if (!empty($_GET['id'])) {
    $_SESSION['modifyTask'] = $_GET['id'];
}

$error_name = '';
$error_startdate = '';
$error_starthour = '';
$message_create_task = '';
$error_agenda = '';

if (!empty($_POST['modifyTask'])) {
        
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

    if (empty($_POST['starthour'])){
        $validate *= false;
        $error_starthour = 'Heure de début pas vide !';
    }else{
        $starthour = $_POST['starthour'];
    }

    $description = $_POST['description']; 

    if ($validate) {
        modifyTask($_SESSION['modifyTask'], 
                    $name, 
                    $description,  
                    $startdate, 
                    $starthour);

        $message_create_task = "Tâche modifiée avec succès";
    }
}
$actual_event = getEventbyIDevent($_SESSION['modifyTask']);
require views('modifyTask');
