<!doctype html>
<html lang="en">

<head>
    <title>Bienvenue</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenue</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li>
                    <a name="btnDirecteur" id="btnDirecteur" class="btn btn-dark" href="views/directeur_login_vw.php" role="button">Acces directeur</a>
                </li>
                <li>
                    <a name="btnProfesseur" id="btnProfesseur" class="btn btn-dark" href="views/professeur_login_vw.php" role="button">Acces professeur</a>
                </li>
                <li>
                    <a name="btnEleve" id="btnEleve" class="btn btn-dark" href="views/eleve_login_vw.php" role="button">Acces eleves</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container">
        <div class="row mt-4">
        <div class="col-10 col-md-4 mx-auto text-center shadow mx-auto m-4 p-3 bg-white rounded">
            <h2>Directeur</h2>
            <h3><i class="fa fa-user col-6 mx-auto display-1"></i></h3>
            <a name="btn_access" id="btn_access" class="btn btn-dark" href="views/directeur_login_vw.php" role="button">Espace direction</a>
        </div>
        <div class="col-10 col-md-4 mx-auto text-center shadow mx-auto m-4 p-3 bg-white rounded">
            <h2>Professeur</h2>
            <h3><i class="fa fa-user col-6 mx-auto display-1"></i></h3>
            <a name="btn_access" id="btn_access" class="btn btn-dark" href="views/professeur_login_vw.php" role="button">Espace professeur</a>
        </div>
        <div class="col-10 col-md-4 mx-auto text-center shadow mx-auto m-4 p-3 bg-white rounded">
            <h2>Eleve</h2>
            <h3><i class="fa fa-user col-6 mx-auto display-1"></i></h3>
            <a name="btn_access" id="btn_access" class="btn btn-dark" href="views/eleve_login_vw.php" role="button">Espace élèves</a>
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