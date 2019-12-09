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
body, .bg-white {
    background-color: #9e9e9e61!important;
}
.bg-dark {
    background-color: #acacac!important;
}
        </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Espace professeur</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <?php
            if (isset($_GET['message'])) {
                echo '<span class="bg-light rounded">' . $_GET['message'] . '</span>';
            }
            ?>
        </div>
    </nav>
    <div class="container shadow mx-auto p-3 rounded bg-white">
        <h1 class="col-12 mx-auto text-center">Groupe scolaire Augustin</h1>
        <div class="row">
            <div class="h-25 col-11 col-md-3 shadow mx-auto p-3 mt-4 bg-white rounded text-center">
                <h1><i class="fa fa-user col-6 mx-auto bg-primary display-1"></i></h1>
                            <?php
                            $staff_class = $_SESSION['user_class'];

                            // Requete de connexion à la base de donnée

                            include '../models/connexion_mdl.php';

                            $sql = "SELECT users_id, user_first_name, user_last_name, user_email, user_age, user_seniority, user_salary, user_class FROM user WHERE user_class='" . $staff_class . "' AND user_status='Professeur'";
                            $results = $connexion->query($sql);
                            $outcomes = $results->fetchAll();

                            foreach ($outcomes as $outcome) {
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
            <div class="col-12 col-md-9 mx-auto">
                <div class="row d-flex justify-content-around shadow mx-auto p-3 mt-4 bg-white rounded">
                    <?php
                    $staff_class = $_SESSION['user_class'];

                    // Requete de connexion à la base de donnée

                    include '../models/connexion_mdl.php';

                    $sql = "SELECT users_id, user_first_name, user_last_name FROM user WHERE user_class='" . $staff_class . "' AND user_status='Eleve' ";
                    $results = $connexion->query($sql);
                    $outcomes = $results->fetchAll();

                    foreach ($outcomes as $outcome) {
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
            </div></div>
                    ';
                    }
                    ?>
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