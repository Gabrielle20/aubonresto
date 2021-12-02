<?php
    include_once "./nbrpanier.php";


    if (!empty($_SESSION['id_user']))
    {
    
?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="../index.php" class="navbar-brand">Au bon Resto</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="./reservation.php" class="nav-item nav-link active">Réserver une Table</a>
                        <a href="../getarticles.php?articles=entrees" class="nav-item nav-link">Entrées</a>
                        <a href="../getarticles.php?articles=plats" class="nav-item nav-link">Plats</a>
                        <a href="../getarticles.php?articles=desserts" class="nav-item nav-link" tabindex="-1">Desserts</a>
                        <a href="../getarticles.php?articles=boissons" class="nav-item nav-link" tabindex="-1">Boissons</a>
                        
                    </div>
                    <div class="dropdown navbar-nav ms-auto">
                        <div tyle="position:relative;">
                            <a href="../getpanier.php?getpanier"><i class="fas fa-shopping-cart"></i></a>
                            <?php if($count !== null) {?>
                                <i class="fas fa-circle" style="font-size:22px; color:red; position:absolute; left:25px; top:-5px;"></i>
                                <p style="color:white; font-size:12px; margin:0; position:absolute; top:-3px; left:32px;"><?= $count ?></p>
                            <?php }?>
                        </div>

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
                                    <a href="./reservation.php" class="nav-item nav-link active">Réserver une Table</a>
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

