<?php
session_start()
?>
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
        a {
            color: black;
        }

        a:hover {
            color: purple;
        }

        .CP {
            display: flex;
            flex-wrap: wrap;
        }

        .CE1 {
            display: flex;
            flex-wrap: wrap;
        }

        .CE2 {
            display: flex;
            flex-wrap: wrap;
        }

        .CM1 {
            display: flex;
            flex-wrap: wrap;
        }

        .CM2 {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Espace Directeur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Se déconnecter<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="directeur_link_vw.php">Backoffice Directeur<span class="sr-only">(current)</span></a>
                </li>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#CP">CP<span class="sr-only">(current)</span></a>
                </li>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#CE1">CE1<span class="sr-only">(current)</span></a>
                    </li>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#CE2">CE2<span class="sr-only">(current)</span></a>
                        </li>

                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#CM1">CM1<span class="sr-only">(current)</span></a>
                            </li>
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#CM2">CM2<span class="sr-only">(current)</span></a>
                                </li>
        </div>
    </nav>
    <div class="container">

        <!-- CP -->

        <?php if (isset($_GET['message'])) {
            echo '<span>' . $_GET['message'] . '</span>';
        }
        ?>
        <div class="classe">

            <h3 id="CP"><a href="#CP">CP</a></h3>
            <h6><a href="#CE1">CE1</a></h6>
            <h6><a href="#CE2">CE2</a></h6>
            <h6><a href="#CM1">CM1</a></h6>
            <h6><a href="#CM2">CM2</a></h6>

            <div class="CP">
                <?php
                include '../model/bdd_mdl.php';
                $nombreEleveCp = 0;
                $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE classe ='CP' AND statut ='Eleve' ");

                while ($classes = $sql->fetch_array()) {
                    $classes[] = $classes;
                    $nombreEleveCp++;

                    //affichage des données
                    echo '  <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded">
                        <h4><i class="fa fa-user"></i></span>
                        <h6>' . $classes[2] . '</span>
                        <h6>' . $classes[3] . '</span>
                        <h6> Sexe : ' . $classes[4] . '</span>
                        <h6>' . $classes[8] . '</span>
                        <h6>Exclusion : ' . $classes[14] . '</span>
                        <h6>' . $classes[10] . '</span>
                                
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editer</button>
                                <div class="col-4 dropdown-menu" aria-labelledby="triggerId">
                                    <form class="mx-auto col-12" action="../ctrl/update_eleve.php" method="post">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom" required>
                                        <label for="prenom">Prenom</label>
                                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom" required>
                                        <label for="sexe">Sexe</label>
                                        <select class="form-control" name="sexe">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                        <label for="classe">classe</label>
                                        <select class="form-control" name="classe">
                                            <option>CP</option>
                                            <option>CE1</option>

                                        </select>

                                        <label for="identifiant">Identifiant</label>
                                        <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant" required>
                                        <label for="mdp">Mot de passe</label>
                                        <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe" required>
                                        <label for="expulsion">Expulsion</label>
                                        <select class="form-control" name="expulsion" id="expulsion">
                                            <option>ras</option>
                                            <option>Temporairement</option>
                                            <option>Definitivement</option>
                                        </select>
                                        <button type="submit" name="update" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                    </div>
                                    <div class="form-group">
                                    <label for="idEleve"></label>
                                    <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                    </div>
                                    </form>
                                    <form action="eleve_vw1.php" method="post">
                                        <div class="form-group">
                                            <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                            <input type="submit" class="form-control col-12 btn btn-dark mx-auto m-2" name="note" id="idEleve" value="Notes">
                                        </div>
                                    </form>
                        </div>
                    </div>';
                }
                if ($nombreEleveCp < 15) {
                    echo '<div class="col-12">
                <form action="../ctrl/insert_eleve_ctrl.php" method="post">
                    <label>Ajouté un eleve au CP</label>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="user_first_name">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom">
                    </div>
                        <div class="form-group col-12 col-md-6">
                        <label for="emailParent">Email</label>
                        <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant">
                    <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom" ex: dupont_d</small>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="mdp">Mot de passe</label>
                    <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="sexe">Sexe</label>
                    <select class="form-control" name="sexe">
                        <option>M</option>
                        <option>F</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="classe">classe</label>
                    <select class="form-control" name="classe">
                        <option>CP</option>
                    </select>
                </div>
                <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                </div>
                </form>
            </div>';
                }

                ?>
            </div>

            <h6><a href="#CP">CP</a></h6>
            <h3 id="CE1"><a href="#CE1">CE1</a></h3>
            <h6><a href="#CE2">CE2</a></h6>
            <h6><a href="#CM1">CM1</a></h6>
            <h6><a href="#CM2">CM2</a></h6>
            <div class="CE1">

                <?php
                include '../model/bdd_mdl.php';
                $nombreEleveCe1 = 0;
                $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE classe ='CE1' AND statut ='Eleve'");

                //  $datas = $qsl->fetch_array();

                while ($classes = $sql->fetch_array()) {
                    $classes[] = $classes;
                    $nombreEleveCe1++;
                    $_SESSION['idEleve'] = $classes[8];


                    echo '  <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded">
                            <h4><i class="fa fa-user"></i></span>
                            <h6>' . $classes[2] . '</span>
                            <h6>' . $classes[3] . '</span>
                            <h6> Sexe : ' . $classes[4] . '</span>
                            <h6>' . $classes[8] . '</span>
                            <h6>Exclusion :' . $classes[14] . '</span>
                            <h6>' . $classes[10] . '</span>
                            
                            
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editer</button>
                                    <div class="col-4 dropdown-menu" aria-labelledby="triggerId">
                                        <form class="mx-auto col-12" action="../ctrl/update_eleve.php" method="post">
                                            <label for="nom">Nom</label>
                                            <input type="text" class="form-control" name="nom" placeholder="Entrer le nom" required>
                                            <label for="prenom">Prenom</label>
                                            <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom" required>
                                            <label for="sexe">Sexe</label>
                                            <select class="form-control" name="sexe">
                                                <option>M</option>
                                                <option>F</option>
                                            </select>
                                            <label for="classe">classe</label>
                                            <select class="form-control" name="classe">
                                                <option>CE1</option>
                                            </select>
                                          
                                            <label for="identifiant">Identifiant</label>
                                            <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant" required>
                                            <label for="mdp">Mot de passe</label>
                                            <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe" required>
                                            <label for="expulsion"></label>
                                            <select class="form-control" name="expulsion" id="expulsion">
                                                <option>ras</option>
                                                <option>Temporairement</option>
                                                <option>Definitivement</option>
                                            </select>
                                            <button type="submit" name="update" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                        </div>
                                        <div class="form-group">
                                        <label for="idEleve"></label>
                                        <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                        </div>
                                        </form>
                                        <form action="eleve_vw1.php" method="post">
                                        <div class="form-group">
                                            <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                            <input type="submit" class="form-control col-12 btn btn-dark mx-auto m-2" name="note" id="idEleve" value="Notes">
                                        </div>
                                    </form>
                            </div>
                        </div>';
                }
                if ($nombreEleveCe1 < 15) {
                    echo '<div class="col-12">
        <form action="../ctrl/insert_eleve_ctrl.php" method="post">
            <label>Ajouté un eleve au CE1</label>
        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="user_first_name">Prenom</label>
                <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Entrer le nom">
            </div>
                <div class="form-group col-12 col-md-6">
                <label for="emailParent">Email</label>
                <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email">
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="user_login">Identifiant</label>
            <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant">
            <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom" ex: dupont_d</small>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="mdp">Mot de passe</label>
            <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe">
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="sexe">Sexe</label>
            <select class="form-control" name="sexe">
                <option>M</option>
                <option>F</option>
            </select>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="classe">classe</label>
            <select class="form-control" name="classe">
                <option>CE1</option>
            </select>
        </div>
        <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
        </div>
        </form>
    </div>';
                }
                ?>
            </div>

            <h6><a href="#CP">CP</a></h6>
            <h6><a href="#CE1">CE1</a></h6>
            <h3 id="CE2"><a href="#CE2">CE2</a></h3>
            <h6><a href="#CM1">CM1</a></h6>
            <h6><a href="#CM2">CM2</a></h6>

            <div class="CE2">

                <?php
                include '../model/bdd_mdl.php';
                $nombreEleveCe2 = 0;
                $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE classe ='CE2' AND statut ='Eleve' ");

                while ($classes = $sql->fetch_array()) {
                    $classes[] = $classes;
                    $nombreEleveCe2++;

                    $_SESSION['idEleve'] = $classes[8];

                    echo '  <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded">
                        <h4><i class="fa fa-user"></i></span>
                        <h6>' . $classes[2] . '</span>
                        <h6>' . $classes[3] . '</span>
                        <h6> Sexe : ' . $classes[4] . '</span>
                        <h6>' . $classes[8] . '</span>
                        <h6>Exclusion :' . $classes[14] . '</span>
                        <h6>' . $classes[10] . '</span>
                        
                        
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editer</button>
                                <div class="col-4 dropdown-menu" aria-labelledby="triggerId">
                                    <form class="mx-auto col-12" action="../ctrl/update_eleve.php" method="post">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom" required>
                                        <label for="prenom">Prenom</label>
                                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom" required>
                                        <label for="sexe">Sexe</label>
                                        <select class="form-control" name="sexe">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                        <label for="classe">classe</label>
                                        <select class="form-control" name="classe">
                                            <option>CE2</option>
                                        </select>
                                        <label for="emailParent">Email des Parents</label>
                                        <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email" required>
                                        <label for="identifiant">Identifiant</label>
                                        <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant" required>
                                        <label for="mdp">Mot de passe</label>
                                        <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe" required>
                                        <label for="expulsion"></label>
                                        <select class="form-control" name="expulsion" id="expulsion">
                                            <option>ras</option>
                                            <option>Temporairement</option>
                                            <option>Definitivement</option>
                                        </select>
                                        <button type="submit" name="update" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                    </div>
                                    <div class="form-group">
                                    <label for="idEleve"></label>
                                    <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                    </div>
                                    </form>
                                    <form action="eleve_vw1.php" method="post">
                                    <div class="form-group">
                                        <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                        <input type="submit" class="form-control col-12 btn btn-dark mx-auto m-2" name="note" id="idEleve" value="Notes">
                                    </div>
                                </form>
                        </div>
                    </div>';
                }
                if ($nombreEleveCe2 < 15) {
                    echo '<div class="col-12">
                <form action="../ctrl/insert_eleve_ctrl.php" method="post">
                    <label>Ajouté un eleve au CE2</label>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="user_first_name">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom">
                    </div>
                        <div class="form-group col-12 col-md-6">
                        <label for="emailParent">Email</label>
                        <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="user_login">Identifiant</label>
                    <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant">
                    <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom" ex: dupont_d</small>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="mdp">Mot de passe</label>
                    <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="sexe">Sexe</label>
                    <select class="form-control" name="sexe">
                        <option>M</option>
                        <option>F</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="classe">classe</label>
                    <select class="form-control" name="classe">
                        <option>CE2</option>
                    </select>
                </div>
                <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                </div>
                </form>
            </div>';
                }

                ?>
            </div>
            <h6><a href="#CP">CP</a></h6>
            <h6><a href="#CE1">CE1</a></h6>
            <h6><a href="#CE2">CE2</a></h6>
            <h3 id="CM1"><a href="#CM1">CM1</a></h3>
            <h6><a href="#CM2">CM2</a></h6>

            <div class="CM1">

                <?php
                include '../model/bdd_mdl.php';
                $nombreEleveCm1 = 0;
                $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE classe ='CM1' AND statut ='Eleve'");

                //  $datas = $qsl->fetch_array();

                while ($classes = $sql->fetch_array()) {
                    $classes[] = $classes;
                    $nombreEleveCm1++;
                    $_SESSION['idEleve'] = $classes[8];
                    echo '  <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded">
                        <h4><i class="fa fa-user"></i></span>
                        <h6>' . $classes[2] . '</span>
                        <h6>' . $classes[3] . '</span>
                        <h6> Sexe : ' . $classes[4] . '</span>
                        <h6>' . $classes[8] . '</span>
                        <h6>Exclusion :' . $classes[14] . '</span>
                        <h6>' . $classes[10] . '</span>
                        
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editer</button>
                                <div class="col-4 dropdown-menu" aria-labelledby="triggerId">
                                    <form class="mx-auto col-12" action="../ctrl/update_eleve.php" method="post">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom" required>
                                        <label for="prenom">Prenom</label>
                                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom" required>
                                        <label for="sexe">Sexe</label>
                                        <select class="form-control" name="sexe">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                        <label for="classe">classe</label>
                                        <select class="form-control" name="classe">
                                            <option>CM1</option>
                                        </select>
                                        <label for="emailParent">Email des Parents</label>
                                        <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email" required>
                                        <label for="identifiant">Identifiant</label>
                                        <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant" required>
                                        <label for="mdp">Mot de passe</label>
                                        <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe" required>
                                        <label for="expulsion"></label>
                                        <select class="form-control" name="expulsion" id="expulsion">
                                            <option>ras</option>
                                            <option>Temporairement</option>
                                            <option>Definitivement</option>
                                        </select>
                                        <button type="submit" name="update" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                    </div>
                                    <div class="form-group">
                                    <label for="idEleve"></label>
                                    <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                    </div>
                                    </form>
                                    <form action="eleve_vw1.php" method="post">
                                    <div class="form-group">
                                        <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                        <input type="submit" class="form-control col-12 btn btn-dark mx-auto m-2" name="note" id="idEleve" value="Notes">
                                    </div>
                                </form>
                        </div>
                    </div>';
                }
                if ($nombreEleveCm1 < 15) {
                    echo '<div class="col-12">
                <form action="../ctrl/insert_eleve_ctrl.php" method="post">
                    <label>Ajouté un eleve au CM1</label>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="user_first_name">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Entrer le nom">
                    </div>
                        <div class="form-group col-12 col-md-6">
                        <label for="emailParent">Email</label>
                        <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="user_login">Identifiant</label>
                    <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant">
                    <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom" ex: dupont_d</small>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="mdp">Mot de passe</label>
                    <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="sexe">Sexe</label>
                    <select class="form-control" name="sexe">
                        <option>M</option>
                        <option>F</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="classe">classe</label>
                    <select class="form-control" name="classe">
                        <option>CM1</option>
                    </select>
                </div>
                <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                </div>
                </form>
            </div>';
                }
                ?>
            </div>

            <h6><a href="#CP">CP</a></h6>
            <h6><a href="#CE1">CE1</a></h6>
            <h6><a href="#CE2">CE2</a></h6>
            <h6><a href="#CM1">CM1</a></h6>
            <h3 id="CM2"><a href="#CM2">CM2</a></h3>
            <div class="CM2">

                <?php
                include '../model/bdd_mdl.php';
                $nombreEleveCm2 = 0;
                $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE classe ='CM2' AND statut ='Eleve' ");

                //  $datas = $qsl->fetch_array();

                while ($classes = $sql->fetch_array()) {
                    $classes[] = $classes;
                    $nombreEleveCm2++;

                    $_SESSION['idEleve'] = $classes[8];
                    echo '  <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded">
                            <h4><i class="fa fa-user"></i></span>
                            <h6>' . $classes[2] . '</span>
                            <h6>' . $classes[3] . '</span>
                            <h6> Sexe : ' . $classes[4] . '</span>
                            <h6>' . $classes[8] . '</span>
                            <h6>Exclusion :' . $classes[14] . '</span>
                            <h6>' . $classes[10] . '</span>
                            
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editer</button>
                                    <div class="col-4 dropdown-menu" aria-labelledby="triggerId">
                                        <form class="mx-auto col-12" action="../ctrl/update_eleve.php" method="post">
                                            <label for="nom">Nom</label>
                                            <input type="text" class="form-control" name="nom" placeholder="Entrer le nom" required>
                                            <label for="prenom">Prenom</label>
                                            <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom" required>
                                            <label for="sexe">Sexe</label>
                                            <select class="form-control" name="sexe">
                                                <option>M</option>
                                                <option>F</option>
                                            </select>
                                            <label for="classe">classe</label>
                                            <select class="form-control" name="classe">
                                                <option>CM2</option>
                                            </select>
                                            <label for="emailParent">Email des Parents</label>
                                            <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email" required>
                                            <label for="identifiant">Identifiant</label>
                                            <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant" required>
                                            <label for="mdp">Mot de passe</label>
                                            <input type="text" class="form-control" name="mdp" placeholder="Entrer un mot de passe" required>
                                            <label for="expulsion"></label>
                                            <select class="form-control" name="expulsion" id="expulsion">
                                                <option>ras</option>
                                                <option>Temporairement</option>
                                                <option>Definitivement</option>
                                            </select>
                                            <button type="submit" name="update" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                        </div>
                                        <div class="form-group">
                                        <label for="idEleve"></label>
                                        <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                        </div>
                                        </form>
                                        <form action="eleve_vw1.php" method="post">
                                        <div class="form-group">
                                            <input type="number" class="form-control d-none" name="idEleve" id="idEleve" value="' . $classes[9] . '">
                                            <input type="submit" class="form-control col-12 btn btn-dark mx-auto m-2" name="note" id="idEleve" value="Notes">
                                        </div>
                                    </form>
                            </div>
                        </div>';
                }
                if ($nombreEleveCm2 < 15) {
                    echo '<div class="col-12">
        <form action="../ctrl/insert_eleve_ctrl.php" method="post">
            <label>Ajouté un eleve au CM2</label>
        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="user_first_name">Prenom</label>
                <input type="text" class="form-control" name="prenom" placeholder="Entrer le prenom">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Entrer le nom">
            </div>
                <div class="form-group col-12 col-md-6">
                <label for="emailParent">Email</label>
                <input type="email" class="form-control" name="emailParent" placeholder="Entrer un email">
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="user_login">Identifiant</label>
            <input type="text" class="form-control" name="identifiant" placeholder="Entrer identifiant">
            <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom" ex: dupont_d</small>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" name="mdp" placeholder="Entrer un mot de passe">
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="sexe">Sexe</label>
            <select class="form-control" name="sexe">
                <option>M</option>
                <option>F</option>
            </select>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="classe">classe</label>
            <select class="form-control" name="classe">
                <option>CM2</option>
            </select>
        </div>
        <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
        </div>
        </form>
    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>