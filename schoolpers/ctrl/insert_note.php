<?php

$matiere = htmlspecialchars($_POST['matiere']);
$note = htmlspecialchars($_POST['note']);
$dates = htmlspecialchars($_POST['dates']);
$idEleve = htmlspecialchars($_POST['idEleve']);


//connexion à la base
include '../model/bdd_mdl.php';
 
//Insertion des données
try {
    $insertion = "INSERT INTO note (matiere, note, dates, idEleve) VALUES ('$matiere', '$note', '$dates', '$idEleve')";
    $mysqli->query($insertion);
    header('Location: ../views/professeur_vw1.php?message=La note de ' . $note . ' à bien été ajouté');
} catch (Exception $e) {

    echo "impossible de vous enregistrer, veuillez nous excuser.";
}
