<?php
if ($_SESSION['type_user']=='user') :?>
    <div class="sidebarclass">
        <div class="titleSideBar">
            <strong><a href="pageprofile.php" class="titleSideBarS mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5"><?php echo $_SESSION['name_user']." ".$_SESSION['firstname_user']?></span></a>
            </strong>
        </div>
        <div class="sidebarBody text-dark vh-100">
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li> <a href="infosUser.php" class="nav-link sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Profil</span> </a> </li>
                <li> <a href="../mes_reservations.php" class="nav-link sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Mes réservations</span> </a> </li>
                <li> <a href="#" class="nav-link sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Mes commandes</span> </a> </li>
            </ul>
        </div>
    </div>

<?php endif;
if ($_SESSION['type_user']=='admin') :?>
    <div class="sidebarclass">
        <div class="titleSideBar">
            <strong><a href="pageprofile.php" class="mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5"><?php echo $_SESSION['name_user']." ".$_SESSION['firstname_user']?></span></a>
            </strong>
        </div>
        <div class="sidebarBody text-dark vh-100">
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li> <a href="infosUser.php" class="nav-link sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Profil</span> </a> </li>
                <li> <a href="../getpanier.php?orders" class="nav-link sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Liste des commandes</span> </a> </li>
                <li> <a href="../getarticles.php?articles=all" class="nav-link sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Liste des Produits</span> </a> </li>
                <li> <a href="../getarticles.php?articles=new" class="nav-link sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Ajouter un produit</span> </a> </li>
            </ul>
        </div>
    </div>
<?php endif; ?>