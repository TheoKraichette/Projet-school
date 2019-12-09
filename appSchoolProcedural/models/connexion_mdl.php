<?php

try {
    $connexion = new PDO('mysql:host=localhost; dbname=AppSchool; charset=utf8', 'bruno', 'Pixies@57');
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
