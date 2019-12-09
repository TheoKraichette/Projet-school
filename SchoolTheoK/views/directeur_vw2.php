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
        .prof {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Accueil Ecole Augustin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="directeur_link_vw.php">Backoffice Directeur<span class="sr-only">(current)</span></a>
                </li>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Se déconnecter<span class="sr-only">(current)</span></a>
                </li>
        </div>
    </nav>
    <div class="container">
        <?php if (isset($_GET['message'])) {
            echo '<span>' . $_GET['message'] . '</span>';
        }
        ?>

        <h3>Enseignants</h3>
        <div class="prof" id="prof">

            <?php
            include '../model/bdd_mdl.php';
            $nombreProf = 0;
            $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE statut ='Instituteur' ");

            //  $datas = $qsl->fetch_array();

            while ($classes = $sql->fetch_array()) {
                $classes[] = $classes;
                $nombreProf++;

                echo '  <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded">
                        <h4><i class="fa fa-user"></i></span>
                        <h6>' . $classes[2] . '</span>
                        <h6>' . $classes[3] . '</span>
                        <h6>' . $classes[5] . ' ans</span>
                        <h6>' . $classes[8] . '</span>
                        <h6> Ancienneté :' . $classes[12] . ' mois</span>
                        <h6> Salaire : ' . $classes[13] . 'e</span>
                        <h6>' . $classes[11] . '</span>
                        
                        
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editer</button>
                                <div class="col-4 dropdown-menu" aria-labelledby="triggerId">
                                    <form class="mx-auto col-12" action="../ctrl/update_prof.php" method="post">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom" required>
                                        <label for="prenom">Prenom</label>
                                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom" required>
                                        <label for="sexe">age</label>
                                        <input type="number" class="form-control" name="age" placeholder="Age" required>
                                        <label for="classe">classe</label>
                                        <select class="form-control" name="classe">
                                            <option>CP</option>
                                            <option>CE1</option>
                                            <option>CE2</option>
                                            <option>CM1</option>
                                            <option>CM2</option>
                                        </select>
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Entrer un email" required>
                                        <label for="identifiant">Identifiant</label>
                                        <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant" required>
                                        <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom" ex: dupont_d</small>
                                        <label for="mdp">Mot de passe</label>
                                        <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe" required>
                                        <label for="anciennete">Ancienneté</label>
                                        <input type="text" class="form-control" name="anciennete" placeholder="Ancienneté" required>
                                        <label for="salaire">Salaire</label>
                                        <input type="number" class="form-control" name="salaire" placeholder="Salaire" required>
                                        <button type="submit" name="update" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                    </div>
                                    <div class="form-group">
                                    <input type="number" class="form-control d-none" name="id" id="id" value="' . $classes[0] . '">
                                    </div>
                                    </form>
                        </div> 
                    </div>
                   
                    ';
            }


            ?>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>