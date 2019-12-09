<?php 

$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$sexe=htmlspecialchars($_POST['sexe']);
$classe=htmlspecialchars($_POST['classe']);
$mail=htmlspecialchars($_POST['mail']);
$professeur=htmlspecialchars($_POST['professeur']);
$identifiant=htmlspecialchars($_POST['identifiant']);
$mdp=htmlspecialchars($_POST['mdp']);


//connexion à la base
try {
    $connexionalabase = mysqli_connect("localhost", "theok", "Oblivion08", "ecole");
} catch (Exception $e) {
    echo"La connexion à la base a échoué";
}
//Insertion des données
try {
    $insertion = "INSERT INTO eleves (nom, prenom, sexe, classe, mail, professeur, identifiant, mdp) VALUES ('$nom', '$prenom', '$sexe', '$classe', '$mail', '$professeur', '$identifiant', '$mdp')";
    $connexionalabase->query($insertion);
   // header('Location: ../views/return_vw.php?message=Bonjour votre jeu '.$nomJeu.' à bien été ajouté');
    
} catch (Exception $e) {

    echo"impossible de vous enregistrer, veuillez nous excuser.";
}