<?php
//on déclare nos constantes
define('DB_HOST', 'database');
define('DB_USER', 'admin');
define('DB_PASS', 'admin');
define('DB_NAME', 'videogames');

//on crée la connexion à la base de données
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//si on a une erreur de connexion on affiche l'erreur
if (!$connection) {
    die("Erreur: " . mysqli_connect_error());
}

//forcer l'encodage en utf8
mysqli_set_charset($connection, "utf8");
