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
                                    <a href="#" class="nav-item nav-link active">Réserver une Table</a>
                                    <a href="../getarticles.php?articles=entrees" class="nav-item nav-link">Entrées</a>
                                    <a href="../getarticles.php?articles=plats" class="nav-item nav-link">Plats</a>
                                    <a href="../getarticles.php?articles=desserts" class="nav-item nav-link" tabindex="-1">Desserts</a>
                                </div>
                                <div class="navbar-nav ms-auto">
                                    <a href="../pageprofile.php" class="nav-item nav-link">Afficher mon profil</a>
                                    <a href="../logOut.php" class="nav-item nav-link">Déconnexion</a>
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
                                </div>
                                <div class="navbar-nav ms-auto">
                                    <a href="../connexion.php" class="nav-item nav-link">Connexion</a>
                                    <a href="../inscription.php" class="nav-item nav-link">Inscription</a>
                                </div>
                            </div>
                        </div>
                   </nav>
    <?php }
?>

