<!DOCTYPE html>
<html lang="en">
<?php include './Templates/headHtml.html'; ?>


<body>
    <?php include('./Templates/nav.php');?>

    <div class="container">

        <div style="width: 60%; margin: 0 auto;">
            <div class="selecMoment card-title">
                <h2><?= $article["name_article"] ?></h2>
            </div>
    
            <div class="row cardMoment">
    
                <div class="col sm-4">
                    <div class="card" style="max-width: 100%; margin: 0 auto;">
                        <img src="./Images/assortiment.jpg" class="card-img-top imageCard" alt="assortiment">
                        <div class="card-body">
                            <p class="card-text"><?= $article['description_article'] ?></p>
                            <div class="text-center">
                            <?php
                                if (!empty($_SESSION['id_user'])) {?>
                                    <a href="../getpanier.php?addcart=<?= $article['id_article'] ?>" class="btn btn-success text-center" style="width: 80%">Ajouter au panier</a>
                                    <br>
                                    <br>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <?php include "./Templates/footerHtml.html"?>
</body>
</html>