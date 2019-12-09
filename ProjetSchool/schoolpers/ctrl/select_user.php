<?php 

$identifiant=htmlspecialchars($_POST['identifiant']);
$mdp=htmlspecialchars($_POST['mdp']);

//connexion à la base
try {
    $mysqli = mysqli_connect("localhost", "theok", "Oblivion08", "ecole");
} catch (Exception $e) {
    echo"La connexion à la base a échoué";
}
//Selection des données
 /*   $sql = mysqli_query($mysqli,"SELECT * FROM user WHERE identifiant = '".$identifiant."' AND mdp = '".$mdp."' AND statut ='Directeur'");
    //conditions à 2 cas: réponse = 0 ou 1 
        //si reponse = 0 redirection affiche le ocmpte n'a pas été trouvé
    if(mysqli_num_rows($sql) == 0) {
        echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé. Vous allez être redirigé dans 5s";
        header ('Refresh:4;URL=../index.php');
    } else {
        session_start();
        header ('location:../views/directeur_vw1.php');
    }
    
    $sql = mysqli_query($mysqli,"SELECT * FROM user WHERE identifiant = '".$identifiant."' AND mdp = '".$mdp."' AND statut ='Instituteur'");
    //conditions à 2 cas: réponse = 0 ou 1 
        //si reponse = 0 redirection affiche le ocmpte n'a pas été trouvé
    if(mysqli_num_rows($sql) == 0) {
        header ('Refresh:4;URL=../index.php');
    } else {
        session_start();
        header ('location:../views/professeur_vw1.php');
    }

    $sql = mysqli_query($mysqli,"SELECT * FROM user WHERE identifiant = '".$identifiant."' AND mdp = '".$mdp."' AND statut ='Eleve'");
    //conditions à 2 cas: réponse = 0 ou 1 
        //si reponse = 0 redirection affiche le ocmpte n'a pas été trouvé
    if(mysqli_num_rows($sql) == 0) {
        header ('Refresh:4;URL=../index.php');
    } else {
        session_start();
        header ('location:../views/eleve_vw1.php');
    }    
   */

    $sql = mysqli_query($mysqli,"SELECT * FROM user WHERE identifiant = '".$identifiant."' AND mdp = '".$mdp."'");
    $statut = $sql->fetch_all();

    foreach($statut as $statu){
        if ($statu[1] == 'Directeur') {
            var_dump($statu);      
        }
        else if ($statu[1] == 'Eleve') {
            var_dump($statu);      
        }
        else if ($statu[1] == 'Instituteur') {
            var_dump($statu);      
        }
    }

    
    
    
  /*  //conditions à 2 cas: réponse = 0 ou 1 
        //si reponse = 0 redirection affiche le ocmpte n'a pas été trouvé
    if(mysqli_num_rows($sql) == 0) {
        header ('Refresh:4;URL=../index.php');
    } else if ($statut = 'Directeur') {
        session_start();
        header ('location:../views/directeur_vw1.php');
    } else if ($statut = 'Instituteur') {
        session_start();
        header ('location:../views/professeur_vw1.php');
    } else if ($statut = 'Eleve') {
        session_start();
        header ('location:../views/eleve_vw1.php');
    } 