<!doctype html>
<html lang="fr">
  <head>
    <title>Accueil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .container{
        display: flex;
        justify-content: space-around;
    }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Accueil</a>
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
    <div class="container">
        <div class="row"><h3>Ajouter un élève</h3>
            <form action="../ctrl/insert_eleve_ctrl.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nom de famille de l'élève" name="nom" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Prenom de l'élève" name="prenom" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="sexe de l'élève" name="sexe" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Classe de l'élève" name="classe" required>
                </div>
                <div class="form-group">
                    <input type="mail" class="form-control" placeholder="mail de l'enseignant" name="mail" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Professeur de l'élève" name="professeur" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ajouter un identifiant" name="identifiant" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ajouter un mot de passe" name="mdp" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Ajouter">
            </form>
        </div>
        <div class="row"><h3>Ajouter un professeur</h3>
            <form action="../ctrl/insert_prof_ctrl.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" placeholder="Nom de l'enseignant" name="nom" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" placeholder="Prenom de l'enseignant" name="prenom" required>
                </div>
                <div class="form-group">
                    <input type="mail" class="form-control" id="pseudo" placeholder="mail de l'enseignant" name="mail" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" placeholder="Age de l'enseignant" name="age" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" placeholder="Ancienneté de l'enseignant" name="anciennete_en_mois" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pass" placeholder="Salaire de l'enseignant" name="salaire" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" placeholder="Classe de l'enseignant" name="classe" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" placeholder="Identifiant de l'enseignant" name="identifiant" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pseudo" placeholder="Mot de passe de l'enseignant" name="mdp" required>
                </div>
                <input type="submit" class="btn btn-primary" name="creation" value="ajouter">
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>