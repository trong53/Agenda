<?php
session_start();
require_once './helpers.php';

switch (getUri()) {
    case '/':
        require_once controllers('logIn');
        break;
    case '/home':
        require_once controllers('home');
        break;
    case '/signUp':
        require_once controllers('signUp');
        break;
    case '/createAgenda':
        require_once controllers('createAgenda');
        break;
    case '/deleteAgenda':
        require_once controllers('deleteAgenda');
        break;
    case '/createEvent':
        require_once controllers('createEvent');
        break;
    case '/createTask':
        require_once controllers('createTask');
        break;
    case '/modifyEvent':
        require_once controllers('modifyEvent');
        break;
    case '/modifyTask':
        require_once controllers('modifyTask');
        break;
    case '/logout':
        require controllers('logout');
        break;
    case '/deleteEvent':
        require_once controllers('deleteEvent');
        break;
    default:
        require_once controllers('error');
}
