<?php 

$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$sexe=htmlspecialchars($_POST['sexe']);
$age=htmlspecialchars($_POST['age']);
$identifiant=htmlspecialchars($_POST['identifiant']);
$mdp=htmlspecialchars($_POST['mdp']);
$classe=htmlspecialchars($_POST['classe']);
$eleve_id=htmlspecialchars($_POST['eleve_id']);
$mail=htmlspecialchars($_POST['emailParent']);


//connexion à la base
try {
    $connexionalabase = mysqli_connect("localhost", "theok", "Oblivion08", "ecole");
} catch (Exception $e) {
    echo"La connexion à la base a échoué";
}
//Insertion des données
try {
    $insertion = "INSERT INTO user (statut, nom, prenom, sexe, age, identifiant, mdp, classe, eleve_id, emailParent, email, anciennete, salaire, expulsion) VALUES ('Eleve','$nom', '$prenom', '$sexe', '$age', '$identifiant', '$mdp', '$classe','$eleve_id', '$mail', null , null, null, null)";
    $connexionalabase->query($insertion);
   // header('Location: ../views/return_vw.php?message=Bonjour votre jeu '.$nomJeu.' à bien été ajouté');
    
} catch (Exception $e) {

    echo"impossible de vous enregistrer, veuillez nous excuser.";
}
