<?php 

try {
    $mysqli = mysqli_connect("localhost", "theok", "Oblivion08", "ecole");
} catch (Exception $e) {
    echo"La connexion à la base a échoué";
}
$classe = $_SESSION['classe'];

$sql = mysqli_query($mysqli,"SELECT * FROM user WHERE classe ='" . $classe . "' AND statut = 'Eleve' ");

while ($eleve = $sql->fetch_array()){
    $eleve[] = $eleve;
    echo " $eleve[2] $eleve[3] / Id = $eleve[9] </br> "; 

} 
?>