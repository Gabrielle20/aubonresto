<html>
<head>
    <title>Bon Mange Lakay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>



<?php
if (!empty($_SESSION['id_user']))
{?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="?page=index" class="navbar-brand">Au bon Resto</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="../BackOffice/reservation.php" class="nav-item nav-link active">Réserver une Table</a>
                    <a href="../getarticles.php?articles=entrees" class="nav-item nav-link">Entrées</a>
                    <a href="../getarticles.php?articles=plats" class="nav-item nav-link">Plats</a>
                    <a href="../getarticles.php?articles=desserts" class="nav-item nav-link" tabindex="-1">Desserts</a>
                    <a href="../getarticles.php?articles=boissons" class="nav-item nav-link" tabindex="-1">Boissons</a>
                    <a href="../getarticles.php?articles=new" class="nav-item nav-link" tabindex="-1">Nouvel Article</a>
                </div>
                <div class="dropdown navbar-nav ms-auto">
                    <i class="fas fa-user-circle"
                       id="dropdownProfilButton"
                       data-bs-toggle="dropdown" aria-expanded="false">
                    </i>

                    <ul class="dropdown-menu" aria-labelledby="dropdownProfilButton">
                        <li><a class="dropdown-item" href="?page=pageProfile">Afficher mon profil</a></li>
                        <li><a class="dropdown-item" href="?page=pageProfile">Déconnexion</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
<?php }
else { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand">Au bon Resto</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link active">Réserver une Table</a>
                    <a href="../getarticles.php?articles=entrees" class="nav-item nav-link">Entrées</a>
                    <a href="../getarticles.php?articles=plats" class="nav-item nav-link">Plats</a>
                    <a href="../getarticles.php?articles=desserts" class="nav-item nav-link" tabindex="-1">Desserts</a>
                    <a href="../getarticles.php?articles=boissons" class="nav-item nav-link" tabindex="-1">Boissons</a>
                </div>
                <div class="dropdown navbar-nav ms-auto">
                    <i class="fas fa-user-circle"
                       id="dropdownProfilButton"
                       data-bs-toggle="dropdown" aria-expanded="false"
                    ></i>

                    </img>
                    <ul class="dropdown-menu" aria-labelledby="dropdownProfilButton">
                        <li><a class="dropdown-item" href="../connexion.php">Connexion</a></li>
                        <li><a class="dropdown-item" href="../inscription.php">Inscription</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<?php }
?>






<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="?page=index" class="navbar-brand">Au bon Resto</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="?page=reservation" class="nav-item nav-link active">Réserver une Table</a>
                <a href="?page=getArticles&articles=entrees" class="nav-item nav-link">Entrées</a>
                <a href="?page=getArticles&articles=plats" class="nav-item nav-link">Plats</a>
                <a href="?page=getArticles&articles=desserts" class="nav-item nav-link" tabindex="-1">Desserts</a>
                <a href="?page=getArticles&articles=boissons" class="nav-item nav-link" tabindex="-1">Boissons</a>
                <a href="?page=getArticles&articles=new" class="nav-item nav-link" tabindex="-1">Nouvel Article</a>
            </div>
            <div class="dropdown navbar-nav ms-auto">
                <i class="fas fa-user-circle"
                   id="dropdownProfilButton"
                   data-bs-toggle="dropdown" aria-expanded="false"
                ></i>

                </img>
                <ul class="dropdown-menu" aria-labelledby="dropdownProfilButton">
                    <li><a class="dropdown-item" href="../connexion.php">Connexion</a></li>
                    <li><a class="dropdown-item" href="../inscription.php">Inscription</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>-->








<footer class="bg-dark text-center text-lg-start fixed-bottom">
    <!-- Copyright -->
    <div class="text-white text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Au Bon Resto | Bon Manjé Lakay
    </div>
    <!-- Copyright -->
</footer>

</body>





</html>
<?php