<?php

//captation et securisation des données

$student_id = $_POST['student_id'];
$test = intval(substr($student_id, 0, 2));

// Requete de connexion à la base de donnée

include '../models/connexion_mdl.php';

$sql = "SELECT users_id FROM user WHERE users_id='" . $test . "'";
$results = $connexion->query($sql);
// $outcomes = $results->fetchAll();

// foreach ($outcomes as $outcome) {
// }

if ($results == $test) {
    $_SESSION['users_id'] = $results;
    header('Location: ../views/accueil_eleve_vw.php?message="Bonjour ' . $user_login . ', vous êtes connecté"');
} else {
    header('Location: ../index.php?message="Erreur connexion"');
}
