<?php
require controllers('authentification');
require models('Event');

$current_page = $_GET['page']??'1';
$filter = (string)($_GET['filter']??'dateRecent');
$filter_exist = (isset($_GET['filterExist'])) ? "on" : "off";
$filter_event = $_GET['filterEvent']??"dateRecent";

$error_name = '';
$error_startdate = '';
$error_starthour = '';
$message_create_task = '';
$error_agenda = '';

if (!empty($_POST['submitTask'])) {
        
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

        $type = 'task';

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

        if (empty($_POST['starthour'])){
            $validate *= false;
            $error_starthour = 'Heure de début pas vide !';
        }else{
            $starthour = $_POST['starthour'];
        }

        $description = $_POST['description']; 

        if ($validate){
            
            insertTask(
                $id_user, 
                $id_agenda, 
                $name, 
                $description, 
                $type, 
                $startdate, 
                $starthour);
          
            $message_create_task = "Tâche enregistrée avec succès";
        }
}
require views('CreateTask');
