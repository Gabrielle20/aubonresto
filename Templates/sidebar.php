<?php session_start()?>
<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white" style="width: 250px; background-color: #D88105;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="30" height="32"> </svg>
        <span class="fs-5"><?php echo $_SESSION['name_user']." ".$_SESSION['firstname_user']?></span> </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li> <a href="#" class="nav-link text-white sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Liste des commandes</span> </a> </li>
        <li> <a href="#" class="nav-link text-white sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Liste des Produits</span> </a> </li>
        <li> <a href="#" class="nav-link text-white sidebar"> <i class="fa fa-dashboard"></i><span class="ms-2">Ajouter un produit</span> </a> </li>
    </ul>
</div>
