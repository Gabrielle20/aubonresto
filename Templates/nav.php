<?php
    if (!empty($_SESSION['id_user']))
    {?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <a href="../index.php" class="navbar-brand">Au bon Resto</a>
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
                                        <li><a class="dropdown-item" href="../pageprofile.php">Afficher mon profil</a></li>
                                        <li><a class="dropdown-item" href="../logOut.php">Déconnexion</a></li>
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

