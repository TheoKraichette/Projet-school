<?php
$post = app\App::getDb()->query('SELECT * FROM user ','App\Utilisateur\Eleve');
 ?>
 <h1>
 <?php
 $post->nom;
 ?>
 </h1>