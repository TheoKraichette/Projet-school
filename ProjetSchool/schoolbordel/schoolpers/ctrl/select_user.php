<?php 
session_start();

$identifiant=htmlspecialchars($_POST['identifiant']);
$mdp=htmlspecialchars($_POST['mdp']);

//connexion à la base
try {
    $mysqli = mysqli_connect("localhost", "theok", "Oblivion08", "ecole");
} catch (Exception $e) {
    echo"La connexion à la base a échoué";
}
//Selection des données
    $sql = mysqli_query($mysqli,"SELECT * FROM user WHERE identifiant = '".$identifiant."' AND mdp = '".$mdp."'");
    $statut = $sql->fetch_all();

    foreach($statut as $statu){
        if ($statu[1] == 'Directeur') {
            session_start();
            header ('location:../views/directeur_vw1.php');        
        }
        else if ($statu[1] == 'Eleve') {
            session_start();
            header ('location:../views/eleve_vw1.php');        
        }
        else if ($statu[1] == 'Instituteur') {
            session_start();
            $_SESSION['nom'] = $statu[2];
            $_SESSION['prenom'] = $statu[3];
            $_SESSION['classe'] = $statu[8];
            header ('location:../views/professeur_vw1.php');    
         }
    }


    
    
   