<!DOCTYPE html>
<html lang="en">
<?php include './Templates/headHtml.html'; ?>


<body>
    <?php include('./Templates/nav.php');?>

    <div class="container">
        <div class="selecMoment text-center card-title">
            <h2>Nos entrées : </h2>
        </div>

        <div class="cardMoment" style="display:flex; justify-content: space-around; align-items:center;">

            <?php foreach($articles as $article) : ?>
                <div style="max-with:30%;">
                    <div class="card" style="max-width: 100%; margin: 0 auto;">
                        <img src="./Images/assortiment.jpg" class="card-img-top imageCard" alt="assortiment">
                        <div class="card-body">
                            <h5 class="text-center card-title"><?= $article['name_article'] ?></h5>
                            <p class="card-text"><?= $article['description_article'] ?></p>
                            <div class="text-center"  style="margin-bottom:1rem;">
                                <?php
                                    if (!empty($_SESSION['id_user'])) {?>
                                        <a href="../getarticles.php?articles=entrees&addcart=<?= $article['id_article'] ?>" class="btn btn-success text-center" style="width: 80%">Ajouter au panier</a>
                                        <br>
                                        <br>
                                <?php }?>
                            </div>
                            <a href="../getarticles.php?articles=entrees&id=<?= $article['id_article'] ?>" class="btn btn-secondary more" style="width: 80%">En savoir plus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include "./Templates/footerHtml.html"?>
</body>
</html>