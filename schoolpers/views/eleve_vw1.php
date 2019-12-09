<?php session_start();
include  '../model/bdd_mdl.php';
$statut = $_SESSION['statut'];
if ($statut == 'Directeur') {
  $idEleve = $_POST['idEleve'];
} else {
  $idEleve = $_SESSION['idEleve'];
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>
    h5 {
      text-align: center;
    }

    .container {
      display: flex;
      margin-top: 3%;
    }
  </style>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Espace eleve Ecole Augustin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../index.php">Se Déconnecter<span class="sr-only">(current)</span></a>
        </li>
    </div>
  </nav>
  <main>
    <h5>
      <h5>
        <?php
        $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE idEleve = '" . $idEleve . "'");
        $eleve = $sql->fetch_all();
        foreach ($eleve as $eleves) {
          echo '
            <h5>' . $eleves[2] . '</span>
            <h5>' . $eleves[3] . '</span>
            <h5> Sexe : ' . $eleves[4] . '</span>
            <h5>' . $eleves[8] . '</span>
            <h5>Exclusion : ' . $eleves[14] . '</span>
            <h5>' . $eleves[10] . '</span>';
        } ?>


        <div class="container">
          <div>
            <?php
            // Requete de connexion à la base de donnée
            $sql = mysqli_query($mysqli, "SELECT AVG(note) AS moyenne_subject FROM note WHERE idEleve='" . $idEleve . "'");
            $tableaux = $sql->fetch_array();
            // Affichage des notes de l'élève sous forme de liste
            echo '<strong> Moyenne Général: ' . number_format($tableaux['moyenne_subject'], 2)   . ' /20.</strong>';
            ?>
          </div>
          <div>
            <h5>Français</h5>
            <div>
              <?php
              // Requete de connexion à la base de donnée
              $sql = mysqli_query($mysqli, "SELECT AVG(note) AS moyenne_subject FROM note WHERE idEleve='" . $idEleve . "' AND matiere='Francais'");
              $tableaux = $sql->fetch_array();
              // Affichage des notes de l'élève sous forme de liste
              echo '<strong> Moyenne : ' . number_format($tableaux['moyenne_subject'], 2)   . ' /20.</strong>';
              ?>
            </div>
            <?php
            $idd = $_SESSION['idEleve'];

            $sql = mysqli_query($mysqli, "SELECT * FROM note WHERE idEleve ='" . $idd . "' AND matiere = 'Francais'");

            while ($note = $sql->fetch_array()) {
              $note[] = $note;
              echo " Date: $note[3] Note : $note[2]. </br> ";
            } ?>
          </div>
          <div>
            <h5>Mathématiques</h5>
            <div>
              <?php
              // Requete de connexion à la base de donnée
              $sql = mysqli_query($mysqli, "SELECT AVG(note) AS moyenne_subject FROM note WHERE idEleve='" . $idEleve . "' AND matiere='Mathematiques'");
              $tableaux = $sql->fetch_array();
              // Affichage des notes de l'élève sous forme de liste
              echo '<strong> Moyenne : ' . number_format($tableaux['moyenne_subject'], 2)   . ' /20.</strong>';
              ?>
            </div>
            <?php
            $idd = $_SESSION['idEleve'];

            $sql = mysqli_query($mysqli, "SELECT * FROM note WHERE idEleve ='" . $idd . "' AND matiere = 'Mathematiques'");

            while ($note = $sql->fetch_array()) {
              $note[] = $note;
              echo " Date: $note[3] Note : $note[2]. </br> ";
            } ?>
          </div>
          <div>
            <h5>Histoire-Géographie</h5>
            <div>
              <?php
              // Requete de connexion à la base de donnée
              $sql = mysqli_query($mysqli, "SELECT AVG(note) AS moyenne_subject FROM note WHERE idEleve='" . $idEleve . "' AND matiere='Histoire-Geographie'");
              $tableaux = $sql->fetch_array();
              // Affichage des notes de l'élève sous forme de liste
              echo '<strong> Moyenne : ' . number_format($tableaux['moyenne_subject'], 2)   . ' /20.</strong>';
              ?>
            </div>
            <?php
            $idd = $_SESSION['idEleve'];

            $sql = mysqli_query($mysqli, "SELECT * FROM note WHERE idEleve ='" . $idd . "' AND matiere = 'Histoire-Geographie'");

            while ($note = $sql->fetch_array()) {
              $note[] = $note;
              echo " Date: $note[3] Note : $note[2]. </br> ";
            } ?>
          </div>
          <div>
            <h5>Sport</h5>
            <div>
              <?php
              // Requete de connexion à la base de donnée
              $sql = mysqli_query($mysqli, "SELECT AVG(note) AS moyenne_subject FROM note WHERE idEleve='" . $idEleve . "' AND matiere='Sport'");
              $tableaux = $sql->fetch_array();
              // Affichage des notes de l'élève sous forme de liste
              echo '<strong> Moyenne : ' . number_format($tableaux['moyenne_subject'], 2)   . ' /20.</strong>';
              ?>
            </div>
            <?php
            $idd = $_SESSION['idEleve'];

            $sql = mysqli_query($mysqli, "SELECT * FROM note WHERE idEleve ='" . $idd . "' AND matiere = 'Sport'");

            while ($note = $sql->fetch_array()) {
              $note[] = $note;
              echo " Date: $note[3] Note : $note[2]. </br> ";
            } ?>
          </div>
          <div>
            <h5>Sciences</h5>
            <div>
              <?php
              // Requete de connexion à la base de donnée
              $sql = mysqli_query($mysqli, "SELECT AVG(note) AS moyenne_subject FROM note WHERE idEleve='" . $idEleve . "' AND matiere='Sciences'");
              $tableaux = $sql->fetch_array();
              // Affichage des notes de l'élève sous forme de liste
              echo '<strong> Moyenne : ' . number_format($tableaux['moyenne_subject'], 2)   . ' /20.</strong>';
              ?>
            </div>
            <?php
            $idd = $_SESSION['idEleve'];

            $sql = mysqli_query($mysqli, "SELECT * FROM note WHERE idEleve ='" . $idd . "' AND matiere = 'Sciences'");

            while ($note = $sql->fetch_array()) {
              $note[] = $note;
              echo " Date: $note[3] Note : $note[2]. </br> ";
            } ?>
          </div>
        </div>
  </main>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>