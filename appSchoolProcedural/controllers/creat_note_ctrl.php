<?php
$student_id = $_POST['student_id'];
$grade = $_POST['grade_score'];
$matiere = $_POST['matiere'];

// Requete de connexion à la base de donnée

include '../models/connexion_mdl.php';

$requeteInsersion = "INSERT INTO grade (grades_score, grade_subject , student_id) VALUE ('$grade', '$matiere', '$student_id')";
$connexion->query($requeteInsersion);
