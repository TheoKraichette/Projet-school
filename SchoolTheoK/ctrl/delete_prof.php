<?php

session_start();
include '../model/bdd_mdl.php';


$id = htmlspecialchars($_POST['id'], ENT_QUOTES);

try {
    $sql = mysqli_query($connexionalabase, "DELETE FROM user WHERE id = '" . $id . "' ");
} catch (Exception $e) {

    echo "impossible d'exécuter votre demande.";
}
