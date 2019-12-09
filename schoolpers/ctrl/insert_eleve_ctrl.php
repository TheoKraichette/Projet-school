<?php

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$sexe = htmlspecialchars($_POST['sexe']);
$identifiant = htmlspecialchars($_POST['identifiant']);
$mdp = htmlspecialchars($_POST['mdp']);
$classe = htmlspecialchars($_POST['classe']);
$mail = htmlspecialchars($_POST['emailParent']);


//connexion à la base
include '../model/bdd_mdl.php';

//Insertion des données
try {
    $insertion = "INSERT INTO user (statut, nom, prenom, sexe, age, identifiant, mdp, classe, idEleve, emailParent, email, anciennete, salaire, expulsion) VALUES ('Eleve','$nom', '$prenom', '$sexe', null, '$identifiant', '$mdp', '$classe','$idEleve', null, null , null, null, null)";
    $connexionalabase->query($insertion);
    // header('Location: ../views/return_vw.php?message=Bonjour votre jeu '.$nomJeu.' à bien été ajouté');

} catch (Exception $e) {

    echo "impossible de vous enregistrer, veuillez nous excuser.";
}
