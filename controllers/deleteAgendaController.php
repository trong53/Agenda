<?php
require controllers('authentification');
require models('Event');
require models('Agenda');
require_once './models/agendaModel.php';

$delete_IdAgenda = $_GET['id'];
$type = 'agenda';

if (checkCreator($delete_IdAgenda, $_SESSION['id'], $type)) {
    deleteAgenda($delete_IdAgenda);
    deleteEventbyIdagenda($delete_IdAgenda);
}

require controllers('home');