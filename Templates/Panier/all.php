<!DOCTYPE html>
<html lang="en">
<?php include './Templates/headHtml.html'; ?>


<body>
    <?php include('./Templates/nav.php');?>



    <div style="display:flex; justify-content: space-between;">
        <div class="leftSideBar">
            <?php include('./Templates/sidebar.php');?>
        </div>


        <div class="row cardMoment" style="width:80%; flex-wrap: wrap; justify-content:space-around;">
            
            <?php foreach($orders as $order) : ?>
                <div  style="width:300px;">
                    <div class="card" style="max-width: 100%; margin: 0 auto; margin-bottom:2rem;">
                        <img src="./Images/assortiment.jpg" class="card-img-top imageCard" alt="assortiment">
                        <div class="card-body">
                            <h5 class="text-center card-title"><?= $order['id_user'] ?></h5>
                            <p class="card-text"><?= $order['statut_panier'] ?></p>
                            
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <?php include "./Templates/footerHtml.html"?>
</body>
</html>