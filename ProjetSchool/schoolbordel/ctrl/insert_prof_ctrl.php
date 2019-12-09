<?php 

$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$mail=htmlspecialchars($_POST['mail']);
$age=htmlspecialchars($_POST['age']);
$anciennete_en_mois=htmlspecialchars($_POST['anciennete_en_mois']);
$salaire=htmlspecialchars($_POST['salaire']);
$classe=htmlspecialchars($_POST['classe']);
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
    $insertion = "INSERT INTO professeurs (nom, prenom, mail, age, anciennete_en_mois, salaire, classe, identifiant, mdp) VALUES ('$nom', '$prenom', '$mail', '$age', '$anciennete_en_mois', '$salaire', '$classe', '$identifiant', '$mdp')";
    $connexionalabase->query($insertion);
   // header('Location: ../views/return_vw.php?message=Bonjour votre jeu '.$nomJeu.' à bien été ajouté');
    
} catch (Exception $e) {

    echo"impossible de vous enregistrer, veuillez nous excuser.";
}