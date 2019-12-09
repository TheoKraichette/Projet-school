<?php

//Captation

$user_login = htmlspecialchars($_POST['user_login']);
$user_password = htmlspecialchars($_POST['user_password']);

// Requete de connexion à la base de donnée

include '../models/connexion_mdl.php';

// $sql J'ecris ma requete de selection.
// $results Je recupere les donnée de la base de données.
// $outcomes Tableau de données.

$sql = "SELECT user_login, user_password, users_id FROM user WHERE user_login='" . $user_login . "' AND user_password='" . $user_password . "' AND user_status='Directeur' ";
$results = $connexion->query($sql);
$outcomes = $results->fetchAll();

// Extraction des donnée

foreach ($outcomes as $outcome) {
}

if (($outcome['user_login'] == $user_login) && ($outcome['user_password'] == $user_password)) {
    session_start();
    $_SESSION['user_login'] = $user_login;
    $_SESSION['user_password'] = $user_password;
    $_SESSION['users_id'] = $outcome['users_id'];
    header('Location: ../views/accueil_directeur_vw.php?message="Bonjour ' . $user_login . ', vous êtes connecté"');
} else {
    header('Location: ../index.php?message="Erreur connexion"');
}
