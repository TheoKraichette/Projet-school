<?php 

$matiere=htmlspecialchars($_POST['matiere']);
$note=htmlspecialchars($_POST['note']);
$dates=htmlspecialchars($_POST['dates']);
$idEleve=htmlspecialchars($_POST['idEleve']);


//connexion à la base
try {
    $connexionalabase = mysqli_connect("localhost", "theok", "Oblivion08", "ecole");
} catch (Exception $e) {
    echo"La connexion à la base a échoué";
}
//Insertion des données
try {
    $insertion = "INSERT INTO note (matiere, note, dates, idEleve) VALUES ('$matiere', '$note', '$dates', '$idEleve')";
    $connexionalabase->query($insertion);
    header('Location: ../views/professeur_vw1.php?message=La note de '.$note.' à bien été ajouté');
    
} catch (Exception $e) {

    echo"impossible de vous enregistrer, veuillez nous excuser.";
}