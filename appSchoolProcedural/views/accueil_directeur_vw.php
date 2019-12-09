<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Espace professeur</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body,
        .bg-white {
            background-color: #9e9e9e61 !important;
        }

        .bg-dark {
            background-color: #acacac !important;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #acacac !important;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Espace directeur</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <?php
            if (isset($_GET['message'])) {
                echo '<span class="bg-light rounded">' . $_GET['message'] . '</span>';
            }
            ?>
        </div>
    </nav>
    <div class="container shadow mx-auto p-3 bg-white rounded d-flex justify-content-around">
        <div class="row">
            <div class="col-11 col-md-3 shadow mx-auto p-3 mt-4 bg-white rounded text-center">
                <h1><i class="fa fa-user col-6 mx-auto bg-dark display-1"></i></h1>
                <?php

                // Requete de connexion à la base de donnée

                include '../models/connexion_mdl.php';

                $sql = "SELECT users_id, user_first_name, user_last_name, user_email, user_age, user_seniority, user_salary, user_class FROM user WHERE user_status='Directeur' ";
                $results = $connexion->query($sql);
                $outcomes = $results->fetchAll();

                foreach ($outcomes as $outcome) {
                    $nbeleves = 0;
                    echo '
                                <h2>' . $outcome['user_first_name'] . '</h2>
                                <h3>' . $outcome['user_last_name'] . '</h3>
                                <h4>' . $outcome['user_class'] . '</h4>
                                <h6>Ancienneté ' . $outcome['user_seniority'] . " ans" . '</h4>
                                <h6>Age ' . $outcome['user_age'] . " ans" . '</h4>
                                <h6>Salaire ' . $outcome['user_salary'] . " €" . '</h4>';
                }
                ?>
            </div>
            <div class="col-12 col-md-8">
                <ul class="nav nav-pills mb-3 col-12" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-dark active" id="pills-cp-tab" data-toggle="pill" href="#pills-cp" role="tab" aria-controls="pills-cp" aria-selected="true">CP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="pills-ce1-tab" data-toggle="pill" href="#pills-ce1" role="tab" aria-controls="pills-ce1" aria-selected="false">CE1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="pills-ce2-tab" data-toggle="pill" href="#pills-ce2" role="tab" aria-controls="pills-ce2" aria-selected="false">CE2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="pills-cm1-tab" data-toggle="pill" href="#pills-cm1" role="tab" aria-controls="pills-cm1" aria-selected="false">CM1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="pills-cm2-tab" data-toggle="pill" href="#pills-cm2" role="tab" aria-controls="pills-cm2" aria-selected="false">CM2</a>
                    </li>
                </ul>
                <div class="tab-content col-12" id="pills-tabContent">
                    <div class="tab-pane fade show active col-12" id="pills-cp" role="tabpanel" aria-labelledby="pills-cp-tab">
                        <div class="col-12">

                            <div class="row d-flex justify-content-around">

                                <?php
                                $cp = "CP";
                                $nombreEleveCp = 0;

                                // Requete de connexion à la base de donnée

                                include '../models/connexion_mdl.php';

                                $sql = "SELECT users_id, user_first_name, user_last_name FROM user WHERE user_class='" . $cp . "' AND user_status='Eleve' ";
                                $results = $connexion->query($sql);
                                $outcomes = $results->fetchAll();

                                foreach ($outcomes as $outcome) {
                                    $nombreEleveCp++;
                                    echo '
                                        <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded"">
                                        <h4><i class="fa fa-user"></i></span>
                                        <h6>' . $outcome['user_last_name'] . '</span>
                                        <h6>' . $outcome['user_first_name'] . '</span>
                                        <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Note</button>
                                    <div class="col-4 dropdown-menu bg-dark" aria-labelledby="triggerId">
                                        <form class="mx-auto col-12" action="../controllers/creat_note_ctrl.php" method="post">
                                        <div class="col-12">
                                        <div class="form-group">
                                        <label for="matiere">Matiere</label>
                                        <select class="form-control" name="matiere" id="matiere">
                                        <option>Francais</option>
                                            <option>Mathématique</option>
                                            <option>Histoire-Géographie</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="grade_score">Entrer une note</label>
                                        <select class="form-control" name="grade_score" id="grade_score">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                        </select>
                                        </div>
                                        <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                        </div>
                                        <div class="form-group">
                                        <label for="student_id"></label>
                                        <input type="number" class="form-control d-none" name="student_id" id="student_id" value="' . $outcome['users_id'] . '" aria-describedby="helpId" placeholder="">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                        ';
                                }
                                if ($nombreEleveCp < 15) {
                                    echo '<div class="col-12">
                                    <form action="../controllers/creat_eleve_ctrl.php" method="post">
                                <label>Nouvelle élèves</label>
                                    <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_first_name">Prenom</label>
                                        <input type="text" class="form-control" name="user_first_name" id="user_first_name" aria-describedby="helpId" placeholder="Entrer le prenom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_last_name">Nom</label>
                                        <input type="text" class="form-control" name="user_last_name" id="user_last_name" aria-describedby="" placeholder="Entrer le nom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_email">Email</label>
                                        <input type="email" class="form-control" name="user_email" id="user_email" aria-describedby="emailHelpId" placeholder="Entrer un email">
                                        <small id="emailHelpId" class="form-text text-muted">Help text</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <input type="text" class="form-control" name="user_login" id="user_login" aria-describedby="helpId" placeholder="Entrer identifiant">
                                        <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom"</small>
                                        <label for="user_login">Identifiant</label>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_password">Mot de passe</label>
                                        <input type="text" class="form-control" name="user_password" id="user_password" aria-describedby="helpId" placeholder="Entrer un mot de passe">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_gender">Sexe</label>
                                    <select class="form-control" name="user_gender" id="user_gender">
                                        <option>M</option>
                                        <option>F</option>
                                    </select>
                                    </div>
                                    </div>
                                </form>
                                    </div>';
                                    echo $nombreEleveCp;
                                    $_SESSION['nbEleveCp'] = $nombreEleveCp;
                                } else {
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade col-12" id="pills-ce1" role="tabpanel" aria-labelledby="pills-ce1-tab">
                        <div class="col-12">

                            <div class="row d-flex justify-content-around">

                                <?php
                                $ce1 = "ce1";
                                $nombreEleveCe1 = 0;

                                // Requete de connexion à la base de donnée

                                include '../models/connexion_mdl.php';

                                $sql = "SELECT users_id, user_first_name, user_last_name FROM user WHERE user_class='" . $ce1 . "' AND user_status='Eleve' ";
                                $results = $connexion->query($sql);
                                $outcomes = $results->fetchAll();

                                foreach ($outcomes as $outcome) {
                                    $nombreEleveCe1++;
                                    echo '
                                    <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded"">
                                    <h4><i class="fa fa-user"></i></span>
                                    <h6>' . $outcome['user_last_name'] . '</span>
                                    <h6>' . $outcome['user_first_name'] . '</span>
                                    <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Note</button>
                                <div class="col-4 dropdown-menu bg-dark" aria-labelledby="triggerId">
                                    <form class="mx-auto col-12" action="../controllers/creat_note_ctrl.php" method="post">
                                    <div class="col-12">
                                    <div class="form-group">
                                    <label for="matiere">Matiere</label>
                                    <select class="form-control" name="matiere" id="matiere">
                                    <option>Francais</option>
                                        <option>Mathématique</option>
                                        <option>Histoire-Géographie</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="grade_score">Entrer une note</label>
                                    <select class="form-control" name="grade_score" id="grade_score">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                    </select>
                                    </div>
                                    <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                    </div>
                                    <div class="form-group">
                                    <label for="student_id"></label>
                                    <input type="number" class="form-control d-none" name="student_id" id="student_id" value="' . $outcome['users_id'] . '" aria-describedby="helpId" placeholder="">
                                    </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                                    ';
                                }
                                if ($nombreEleveCe1 < 15) {
                                    echo '<div class="col-12">
                                    <form action="../controllers/creat_eleve_ctrl.php" method="post">
                                <label>Nouvelle élèves</label>
                                    <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_first_name">Prenom</label>
                                      <input type="text" class="form-control" name="user_first_name" id="user_first_name" aria-describedby="helpId" placeholder="Entrer le prenom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_last_name">Nom</label>
                                      <input type="text" class="form-control" name="user_last_name" id="user_last_name" aria-describedby="" placeholder="Entrer le nom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_email">Email</label>
                                      <input type="email" class="form-control" name="user_email" id="user_email" aria-describedby="emailHelpId" placeholder="Entrer un email">
                                      <small id="emailHelpId" class="form-text text-muted">Help text</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_login">Identifiant</label>
                                      <input type="text" class="form-control" name="user_login" id="user_login" aria-describedby="helpId" placeholder="Entrer identifiant">
                                      <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom"</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_password">Mot de passe</label>
                                      <input type="text" class="form-control" name="user_password" id="user_password" aria-describedby="helpId" placeholder="Entrer un mot de passe">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_gender">Sexe</label>
                                      <select class="form-control" name="user_gender" id="user_gender">
                                        <option>M</option>
                                        <option>F</option>
                                      </select>
                                    </div>
                                    </div>
                                </form>
                                    </div>';
                                } else {
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade col-12" id="pills-ce2" role="tabpanel" aria-labelledby="pills-ce2-tab">
                        <div class="col-12">

                            <div class="row d-flex justify-content-around">

                                <?php
                                $ce2 = "ce2";
                                $nombreEleveCe2 = 0;

                                // Requete de connexion à la base de donnée

                                include '../models/connexion_mdl.php';

                                $sql = "SELECT users_id, user_first_name, user_last_name FROM user WHERE user_class='" . $ce2 . "' AND user_status='Eleve' ";
                                $results = $connexion->query($sql);
                                $outcomes = $results->fetchAll();

                                foreach ($outcomes as $outcome) {
                                    $nombreEleveCe2++;
                                    echo '
                                        <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded"">
                                        <h4><i class="fa fa-user"></i></span>
                                        <h6>' . $outcome['user_last_name'] . '</span>
                                        <h6>' . $outcome['user_first_name'] . '</span>
                                        <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Note</button>
                                    <div class="col-4 dropdown-menu bg-dark" aria-labelledby="triggerId">
                                        <form class="mx-auto col-12" action="../controllers/creat_note_ctrl.php" method="post">
                                        <div class="col-12">
                                        <div class="form-group">
                                        <label for="matiere">Matiere</label>
                                        <select class="form-control" name="matiere" id="matiere">
                                        <option>Francais</option>
                                            <option>Mathématique</option>
                                            <option>Histoire-Géographie</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="grade_score">Entrer une note</label>
                                        <select class="form-control" name="grade_score" id="grade_score">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                        </select>
                                        </div>
                                        <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                        </div>
                                        <div class="form-group">
                                        <label for="student_id"></label>
                                        <input type="number" class="form-control d-none" name="student_id" id="student_id" value="' . $outcome['users_id'] . '" aria-describedby="helpId" placeholder="">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                        ';
                                }
                                if ($nombreEleveCe2 < 15) {
                                    echo '<div class="col-12">
                                    <form action="../controllers/creat_eleve_ctrl.php" method="post">
                                <label>Nouvelle élèves</label>
                                    <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_first_name">Prenom</label>
                                      <input type="text" class="form-control" name="user_first_name" id="user_first_name" aria-describedby="helpId" placeholder="Entrer le prenom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_last_name">Nom</label>
                                      <input type="text" class="form-control" name="user_last_name" id="user_last_name" aria-describedby="" placeholder="Entrer le nom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_email">Email</label>
                                      <input type="email" class="form-control" name="user_email" id="user_email" aria-describedby="emailHelpId" placeholder="Entrer un email">
                                      <small id="emailHelpId" class="form-text text-muted">Help text</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_login">Identifiant</label>
                                      <input type="text" class="form-control" name="user_login" id="user_login" aria-describedby="helpId" placeholder="Entrer identifiant">
                                      <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom"</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_password">Mot de passe</label>
                                      <input type="text" class="form-control" name="user_password" id="user_password" aria-describedby="helpId" placeholder="Entrer un mot de passe">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                      <label for="user_gender">Sexe</label>
                                      <select class="form-control" name="user_gender" id="user_gender">
                                        <option>M</option>
                                        <option>F</option>
                                      </select>
                                    </div>
                                    </div>
                                </form>
                                    </div>';
                                } else {
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade col-12" id="pills-cm1" role="tabpanel" aria-labelledby="pills-cm1-tab">
                        <div class="col-12">

                            <div class="row d-flex justify-content-around">

                                <?php
                                $cm1 = "CM1";
                                $nombreEleveCm1 = 0;

                                // Requete de connexion à la base de donnée

                                include '../models/connexion_mdl.php';

                                $sql = "SELECT users_id, user_first_name, user_last_name FROM user WHERE user_class='" . $cm1 . "' AND user_status='Eleve' ";
                                $results = $connexion->query($sql);
                                $outcomes = $results->fetchAll();

                                foreach ($outcomes as $outcome) {
                                    $nombreEleveCm1++;
                                    echo '
                                    <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded"">
                                    <h4><i class="fa fa-user"></i></span>
                                    <h6>' . $outcome['user_last_name'] . '</span>
                                    <h6>' . $outcome['user_first_name'] . '</span>
                                    <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Note</button>
                                <div class="col-4 dropdown-menu bg-dark" aria-labelledby="triggerId">
                                    <form class="mx-auto col-12" action="../controllers/creat_note_ctrl.php" method="post">
                                    <div class="col-12">
                                    <div class="form-group">
                                    <label for="matiere">Matiere</label>
                                    <select class="form-control" name="matiere" id="matiere">
                                    <option>Francais</option>
                                        <option>Mathématique</option>
                                        <option>Histoire-Géographie</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="grade_score">Entrer une note</label>
                                    <select class="form-control" name="grade_score" id="grade_score">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                    </select>
                                    </div>
                                    <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                    </div>
                                    <div class="form-group">
                                    <label for="student_id"></label>
                                    <input type="number" class="form-control d-none" name="student_id" id="student_id" value="' . $outcome['users_id'] . '" aria-describedby="helpId" placeholder="">
                                    </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                                    ';
                                }
                                if ($nombreEleveCm1 < 15) {
                                    echo '<div class="col-12">
                                    <form action="../controllers/creat_eleve_ctrl.php" method="post">
                                <label>Nouvelle élèves</label>
                                    <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_first_name">Prenom</label>
                                        <input type="text" class="form-control" name="user_first_name" id="user_first_name" aria-describedby="helpId" placeholder="Entrer le prenom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_last_name">Nom</label>
                                        <input type="text" class="form-control" name="user_last_name" id="user_last_name" aria-describedby="" placeholder="Entrer le nom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_email">Email</label>
                                        <input type="email" class="form-control" name="user_email" id="user_email" aria-describedby="emailHelpId" placeholder="Entrer un email">
                                        <small id="emailHelpId" class="form-text text-muted">Help text</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_login">Identifiant</label>
                                        <input type="text" class="form-control" name="user_login" id="user_login" aria-describedby="helpId" placeholder="Entrer identifiant">
                                        <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom"</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_password">Mot de passe</label>
                                        <input type="text" class="form-control" name="user_password" id="user_password" aria-describedby="helpId" placeholder="Entrer un mot de passe">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_gender">Sexe</label>
                                        <select class="form-control" name="user_gender" id="user_gender">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </div>
                                    </div>
                                </form>
                                    </div>';
                                } else {
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade col-12" id="pills-cm2" role="tabpanel" aria-labelledby="pills-cm2-tab">
                        <div class="col-12">

                            <div class="row d-flex justify-content-around">

                                <?php
                                $cm2 = "CM2";
                                $nombreEleveCm2 = 0;

                                // Requete de connexion à la base de donnée

                                include '../models/connexion_mdl.php';

                                $sql = "SELECT users_id, user_first_name, user_last_name FROM user WHERE user_class='" . $cm2 . "' AND user_status='Eleve' ";
                                $results = $connexion->query($sql);
                                $outcomes = $results->fetchAll();

                                foreach ($outcomes as $outcome) {
                                    $nombreEleveCm2++;
                                    echo '
                                    <div class="col-12 col-md-2 text-center shadow p-3 m-1 mt-4 bg-white rounded"">
                                    <h4><i class="fa fa-user"></i></span>
                                    <h6>' . $outcome['user_last_name'] . '</span>
                                    <h6>' . $outcome['user_first_name'] . '</span>
                                    <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle m-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Note</button>
                                <div class="col-4 dropdown-menu bg-dark" aria-labelledby="triggerId">
                                    <form class="mx-auto col-12" action="../controllers/creat_note_ctrl.php" method="post">
                                    <div class="col-12">
                                    <div class="form-group">
                                    <label for="matiere">Matiere</label>
                                    <select class="form-control" name="matiere" id="matiere">
                                    <option>Francais</option>
                                        <option>Mathématique</option>
                                        <option>Histoire-Géographie</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="grade_score">Entrer une note</label>
                                    <select class="form-control" name="grade_score" id="grade_score">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                    </select>
                                    </div>
                                    <button type="submit" class="col-12 btn btn-dark mx-auto m-2">Valider</button>
                                    </div>
                                    <div class="form-group">
                                    <label for="student_id"></label>
                                    <input type="number" class="form-control d-none" name="student_id" id="student_id" value="' . $outcome['users_id'] . '" aria-describedby="helpId" placeholder="">
                                    </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                                    ';
                                }
                                if ($nombreEleveCm2 < 15) {
                                    echo '<div class="col-12">
                                    <form action="../controllers/creat_eleve_ctrl.php" method="post">
                                <label>Nouvelle élèves</label>
                                    <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_first_name">Prenom</label>
                                        <input type="text" class="form-control" name="user_first_name" id="user_first_name" aria-describedby="helpId" placeholder="Entrer le prenom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_last_name">Nom</label>
                                        <input type="text" class="form-control" name="user_last_name" id="user_last_name" aria-describedby="" placeholder="Entrer le nom">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_email">Email</label>
                                        <input type="email" class="form-control" name="user_email" id="user_email" aria-describedby="emailHelpId" placeholder="Entrer un email">
                                        <small id="emailHelpId" class="form-text text-muted">Help text</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_login">Identifiant</label>
                                        <input type="text" class="form-control" name="user_login" id="user_login" aria-describedby="helpId" placeholder="Entrer identifiant">
                                        <small id="helpId" class="form-text text-muted">"Nom"_"Première lettre du prenom"</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_password">Mot de passe</label>
                                        <input type="text" class="form-control" name="user_password" id="user_password" aria-describedby="helpId" placeholder="Entrer un mot de passe">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="user_gender">Sexe</label>
                                        <select class="form-control" name="user_gender" id="user_gender">
                                            <option>M</option>
                                            <option>F</option>
                                        </select>
                                    </div>
                                    </div>
                                </form>
                                    </div>';
                                } else {
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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
<!-- <div class="col-2">
                                        <h2 class="text-center col-12">Fiche</h2>
                                        <form class="mx-auto" action="../controllers/fiche_eleve_ctrl.php" method="post">
                                            <div class="form-group">
                                                <label for="student_id">Vos élèves</label>
                                                <select class="form-control" name="student_id" id="student_id">
                                                 <?php
                                                    $staff_class = $_SESSION['user_class'];

                                                    // Requete de connexion à la base de donnée

                                                    include '../models/connexion_mdl.php';

                                                    $sql = "SELECT users_id, user_first_name, user_last_name FROM user WHERE user_class='" . $staff_class . "'";
                                                    $results = $connexion->query($sql);
                                                    $outcomes = $results->fetchAll();

                                                    foreach ($outcomes as $outcome) {
                                                        echo "<option>" . $outcome['users_id'] . " " . $outcome['user_first_name'] . " " . $outcome['user_last_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="col-12 btn btn-primary mx-auto">Entrer la note</button>
                        
                                        </form>
                                    </div> -->