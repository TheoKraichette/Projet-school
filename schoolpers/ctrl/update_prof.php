<?php
session_start();

//CAPTATION ET SECURISATION DES DONNEES
$newNom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
$newPrenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
$newAge = htmlspecialchars($_POST['age'], ENT_QUOTES);
$newIdentifiant = htmlspecialchars($_POST['identifiant'], ENT_QUOTES);
$newMdp = htmlspecialchars($_POST['mdp'], ENT_QUOTES);
$newClasse = htmlspecialchars($_POST['classe'], ENT_QUOTES);
$newMail = htmlspecialchars($_POST['email'], ENT_QUOTES);
$newAnciennete = htmlspecialchars($_POST['anciennete'], ENT_QUOTES);
$newSalaire = htmlspecialchars($_POST['salaire'], ENT_QUOTES);
$id = htmlspecialchars($_POST['id'], ENT_QUOTES);

//appel a la base (mdl)
try {
    require '../model/bdd_mdl.php';
} catch (Exception $e) {
    //on vérifie que la connexion s'effectue correctement:
    echo "Erreur de connexion à la base de données.";
}
$RequeteUpdate = mysqli_query($mysqli, "UPDATE user SET nom = '" . $newNom . "', prenom = '" . $newPrenom . "', sexe = '" . $newSexe . "', age = '" . $newAge . "', identifiant = '" . $newIdentifiant . "', mdp = '" . $newMdp . "' , classe = '" . $newClasse . "', email = '" . $newMail . "', anciennete = '" . $newAnciennete . "', salaire = '" . $newSalaire . "' 
        WHERE id = '" . $id . "' ");
header('Location: ../views/directeur_vw2.php?message=Modification réussie !');
