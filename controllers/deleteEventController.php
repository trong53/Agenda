<?php
require controllers('authentification');
require models('Event');

$delete_IdEvent = $_GET['id'];
$type = 'event';

if (checkCreator($delete_IdEvent, $_SESSION['id'], $type)) {
    deleteEvent($delete_IdEvent);
}

require controllers('home');