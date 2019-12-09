<?php
session_start();

//CAPTATION ET SECURISATION DES DONNEES
$newNom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
$newPrenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
$newSexe = htmlspecialchars($_POST['sexe'], ENT_QUOTES);
$newIdentifiant = htmlspecialchars($_POST['identifiant'], ENT_QUOTES);
$newMdp = htmlspecialchars($_POST['mdp'], ENT_QUOTES);
$newClasse = htmlspecialchars($_POST['classe'], ENT_QUOTES);
$expulsion = htmlspecialchars($_POST['expulsion'], ENT_QUOTES);
$idEleve = htmlspecialchars($_POST['idEleve'], ENT_QUOTES);
//appel a la base (mdl)
try {
    require '../model/bdd_mdl.php';
} catch (Exception $e) {
    //on vérifie que la connexion s'effectue correctement:
    echo "Erreur de connexion à la base de données.";
}
$RequeteUpdate = mysqli_query($mysqli, "UPDATE user SET nom = '" . $newNom . "', prenom = '" . $newPrenom . "', sexe = '" . $newSexe . "', age = null, identifiant = '" . $newIdentifiant . "', mdp = '" . $newMdp . "' , classe = '" . $newClasse . "', email = null, anciennete = null, salaire = null, expulsion = '" . $expulsion . "' 
        WHERE idEleve = '" . $idEleve . "' ");
if ($expulsion = 'Temporairement') {
    // The message
    $message = "Bonsoir votre fdp denfant cest fait exclure 3 jours\r\nAu revoir.\r\nLine 3";

    // In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70, "\r\n");

    // Send
    mail('testemailphpalaji@gmail.com', 'COucou', $message);
} else if ($expulsion == 'Definitivement') {
    // The message
    $message = "Bonsoir votre fdp denfant cest fait exclure\r\nAu revoir.\r\nLine 3";

    // In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70, "\r\n");

    // Send
    mail('testemailphpalaji@gmail.com', 'COucou', $message);
}
header('Location: ../views/directeur_vw1.php?message=Modification réussie !');
