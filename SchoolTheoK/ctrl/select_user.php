<?php
session_start();

$identifiant = htmlspecialchars($_POST['identifiant']);
$mdp = htmlspecialchars($_POST['mdp']);

//connexion à la base
include '../model/bdd_mdl.php';

//Selection des données
$sql = mysqli_query($mysqli, "SELECT * FROM user WHERE identifiant = '" . $identifiant . "' AND mdp = '" . $mdp . "'");
$statut = $sql->fetch_all();

foreach ($statut as $statu) {
    if ($statu[1] == 'Directeur') {
        session_start();
        $_SESSION['statut'] = $statu[1];
        header('location:../views/directeur_link_vw.php');
    } else if ($statu[1] == 'Eleve') {
        session_start();
        $_SESSION['statut'] = $statu[1];
        $_SESSION['nom'] = $statu[2];
        $_SESSION['prenom'] = $statu[3];
        $_SESSION['sexe'] = $statu[4];
        $_SESSION['classe'] = $statu[8];
        $_SESSION['idEleve'] = $statu[9];
        $_SESSION['email'] = $statu[10];
        header('location:../views/eleve_vw1.php');
    } else if ($statu[1] == 'Instituteur') {
        session_start();
        $_SESSION['nom'] = $statu[2];
        $_SESSION['prenom'] = $statu[3];
        $_SESSION['classe'] = $statu[8];
        $_SESSION['email'] = $statu[11];
        $_SESSION['anciennete'] = $statu[12];
        $_SESSION['salaire'] = $statu[13];
        header('location:../views/professeur_vw1.php');
    }
}
