<?php session_start() ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .container{
        display : flex;
    }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Accueil Ecole Augustin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Se connecter<span class="sr-only">(current)</span></a>
            </li>
        </div>
    </nav>
    <main>
     <div class="container">
     <div class="row">
     bonjour </br>
     <?php echo $_SESSION['prenom'].' '. $_SESSION['nom']. ' professeur de '. $_SESSION['classe'];?> </br>
     Voici votre classe : </br> <?php require '../model/prof_mdl.php'; ?>
      
        <form action="../ctrl/insert_note.php" id="notes" method="post">
            <h4>Ajouté une note</h4>
            <div class="form-group">
                <select name="matiere" form="notes">
                    <option value="Français">Français</option>
                    <option value="Mathématiques">Mathématiques</option>
                    <option value="Histoire-Géo">Histoire-géo</option>
                    <option value="Sciences">Sciences</option>
                    <option value="Sport">Sport</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="pass" placeholder="Notes" name="note" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="pass" placeholder="date" name="dates" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="pass" placeholder="id de l'élève" name="idEleve" required>
            </div>
            <input type="submit" class="btn btn-primary" name="creation" value="Valider">
        </form>
        <?php
          if(isset($_GET['message'])){
            echo'<span>'.$_GET['message'].'</span>';
            } 
        ?>
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