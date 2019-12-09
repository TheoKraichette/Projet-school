<?php

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$mail = htmlspecialchars($_POST['email']);
$anciennete = htmlspecialchars($_POST['anciennete']);
$salaire = htmlspecialchars($_POST['salaire']);
$classe = htmlspecialchars($_POST['classe']);
$identifiant = htmlspecialchars($_POST['identifiant']);
$mdp = htmlspecialchars($_POST['mdp']);


//connexion à la base
include '../model/bdd_mdl.php';

//Insertion des données
try {
    $insertion = "INSERT INTO user (statut, nom, prenom, identifiant, mdp, classe, email, anciennete, salaire ) VALUES ('Instituteur','$nom', '$prenom', '$identifiant', '$mdp', '$classe', '$mail', '$anciennete', '$salaire' )";
    $connexionalabase->query($insertion);
    header('Location: ../views/return_vw.php?message=Nouvel instituteur ajouté');
} catch (Exception $e) {

    echo "impossible de vous enregistrer, veuillez nous excuser.";
}
