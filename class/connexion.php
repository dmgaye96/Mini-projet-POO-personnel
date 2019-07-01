<?php
ini_set("display_errors",1);

require 'database.php';
ini_set('display_errors', 'on');

try {
    $pdo = new PDO(
        'mysql:host=localhost; dbname=universite; charset=utf8',
        'root',
        'dmg',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die("Erreur:" . $e->getmessage());
}
