<?php

//captation et securisation des données

$user_login = $_POST['user_login'];
$user_password = $_POST['user_password'];

// Requete de connexion à la base de donnée

include '../models/connexion_mdl.php';



$sql = "SELECT user_login, user_password, users_id FROM user WHERE user_login='" . $user_login . "' AND user_password='" . $user_password . "' AND user_status='Eleve' ";
$results = $connexion->query($sql);
$outcomes = $results->fetchAll();

foreach ($outcomes as $outcome) {
}

if (($outcome['user_login'] == $user_login) && ($outcome['user_password'] == $user_password)) {
    session_start();
    $_SESSION['user_login'] = $user_login;
    $_SESSION['user_password'] = $user_password;
    $_SESSION['users_id'] = $outcome['users_id'];
    header('Location: ../views/accueil_eleve_vw.php?message="Bonjour ' . $user_login . ', vous êtes connecté"');
} else {
    header('Location: ../index.php?message="Erreur connexion"');
}
