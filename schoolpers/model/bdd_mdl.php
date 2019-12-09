<?php

try {
    $mysqli = mysqli_connect("localhost", "theok", "Oblivion08", "ecole");
} catch (Exception $e) {
    echo "La connexion à la base a échoué";
}
