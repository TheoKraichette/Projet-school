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
        .container {
            display: flex;
        }

        form {
            margin-top: 15%;
            border: 2px solid black;
            border-radius: 5px;
            padding: 20px;
            margin-left: 55%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Espace Professeur Ecole Augustin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Se déconnecter<span class="sr-only">(current)</span></a>
                </li>
        </div>
    </nav>
    <main>
        <div class="container">
            <h5><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' </br> Classe : ' . $_SESSION['classe'] . ' </br> Email : ' . $_SESSION['email'] . ' </br> Ancienneté : ' . $_SESSION['anciennete'] . ' mois </br> Salaire : ' . $_SESSION['salaire']; ?> </br></p>

                <?php
                if (isset($_GET['message'])) {
                    echo '<span>' . $_GET['message'] . '</span>';
                }
                ?>
                <p>Voici votre classe : </p>

                <div class="row">

                    <?php

                    include '../model/bdd_mdl.php';
                    $classe = $_SESSION['classe'];
                    $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE classe ='" . $classe . "' AND statut = 'Eleve' ");

                    while ($id = $sql->fetch_array()) {
                        $id[] = $id;

                        echo '  <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded">
                        <h4><i class="fa fa-user"></i></span>
                        <h6>' . $id[2] . '</span>
                        <h6>' . $id[3] . '</span>
                        <h6> Sexe : ' . $id[4] . '</span>
                        <h6>' . $id[8] . '</span>
                        <h6>ID :' . $id[9] . '</span>
                        <h6>' . $id[10] . '</span>
                        <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Note</button>
                        <div class="col-4 dropdown-menu" aria-labelledby="triggerId">
                            <form class="mx-auto col-12" action="../ctrl/insert_note.php" method="post">
                            <div class="col-12">
                            <div class="form-group">
                            <label for="matiere">Matiere</label>
                            <select class="form-control" name="matiere" id="matiere" required>
                            <option>Francais</option>
                                <option>Mathematique</option>
                                <option>Histoire-Geographie</option>
                                <option>Sport</option>
                                <option>Sciences</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="note">Entrer une note</label>
                            <input type="number" step="any" class="form-control" name="note" id="note" required/> 
                            </div>
                            <label for="dates">Entrer une date</label>
                            <input type="date" class="form-control" name="dates" id="dates" required>
                            <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                            </div>
                            <div class="form-group">
                            <label for="idEleve"></label>
                            <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $id[9] . '">
                            </div>
                            </form>
                        </div>
                    </div>
                    </div>';
                    }        ?>
                </div>
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