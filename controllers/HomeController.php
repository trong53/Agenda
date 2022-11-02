<?php
require controllers('authentification');
require models('Home');

$current_page = $_GET['page']??'1';

$filter = (string)($_GET['filter']??'dateRecent');
$filter_exist = (isset($_GET['filterExist'])) ? "on" : "off";

$filter_event = $_GET['filterEvent']??"dateRecent";



$filter_array = [
    'owned_agendas'         =>  ['public'       => "SELECT * FROM agendas WHERE id_user = ? AND is_public = 1",
                                'private'       => "SELECT * FROM agendas WHERE id_user = ? AND is_public = 0",
                                'dateRecent'    => "SELECT * FROM agendas WHERE id_user = ? ORDER BY created_at ASC",
                                'dateFar'       => "SELECT * FROM agendas WHERE id_user = ? ORDER BY created_at DESC"],
    'collaboratif_agendas'  =>  ['public'       => "SELECT * FROM agendas WHERE guests LIKE ? AND is_public = 1",
                                'private'       => "SELECT * FROM agendas WHERE guests LIKE ? AND is_public = 0",
                                'dateRecent'    => "SELECT * FROM agendas WHERE guests LIKE ? ORDER BY created_at ASC",
                                'dateFar'       => "SELECT * FROM agendas WHERE guests LIKE ? ORDER BY created_at DESC"]
];

$id_user = $_SESSION['id'];
$email = $_SESSION['email'];

$owned_agendas = getAgendabyID($id_user, $filter_array['owned_agendas'][$filter]);
$collaboratif_agendas = getAgendaCollaboratif($email, $filter_array['collaboratif_agendas'][$filter]);

if ($filter_exist == 'off') {
    $_SESSION['checkedAgendas'] = getAgendasID($id_user, $email);
}

if (!empty($_POST['submitAgenda']) || !empty($_SESSION['checkedAgendas'])) {
    
    if (!empty($_POST['submitAgenda'])) {
        
        $checked_agendas = array_keys($_POST);
        array_pop($checked_agendas);
        $_SESSION['checkedAgendas'] = $checked_agendas;
    }

    if ($filter == "public" || $filter == "private") {
        if ($filter == "public") {
            $is_public = 1;
        }elseif($filter == "private") {
            $is_public = 0;
        }
        $agendas_byfilter = getAgendasIDbyFilter($id_user, $email, $is_public);
        $_SESSION['checkedAgendas'] = array_intersect($_SESSION['checkedAgendas'], $agendas_byfilter);
    }

    if (!empty($_SESSION['checkedAgendas'])) {
        $id_agenda ='id_agenda = ';

        foreach ($_SESSION['checkedAgendas'] as $agenda){
            $id_agenda .= $agenda.' OR id_agenda = ';
        }

        $id_agenda = rtrim($id_agenda, 'OR id_agenda =');
    }

    if (!empty($id_agenda)) {
        $nbPost = nbPost($id_agenda);
        $per_page = 9;
        $pages = ceil($nbPost / $per_page);
        $first = ($current_page * $per_page) - $per_page;
        $events = getEvents($id_agenda, $filter_event, $first, $per_page);
    }else{
        $events='';
    }
}
require views('Home');

/*

them ? page, filter va filterEvent vao trong link cua modifierevent and task - homeview

delete Agenda : lay Id agenda, kiem tra creator cua Agenda va xoa cac event ben trong
*/
