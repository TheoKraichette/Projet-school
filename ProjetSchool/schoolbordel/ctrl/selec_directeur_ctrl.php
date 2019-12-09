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
    $sql = mysqli_query($mysqli,"SELECT * FROM Directeur WHERE identifiant = '".$identifiant."' AND mdp = '".$mdp."' ");

    //conditions à 2 cas: réponse = 0 ou 1 
        //si reponse = 0 redirection affiche le ocmpte n'a pas été trouvé
    if(mysqli_num_rows($sql) == 0) {
        echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé. Vous allez être redirigé dans 5s";
        header ('Refresh:4;URL=../views/login_vw.php');
    } else {
        header ('location:../views/directeur_vw1.php');
    }

