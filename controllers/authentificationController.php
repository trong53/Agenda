<?php
if (empty($_SESSION)) {
    require views('Login');
    exit;
}