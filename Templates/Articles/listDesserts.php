<!DOCTYPE html>
<html lang="en">

<?php include './Templates/headHtml.html'; ?>

<body>
    <?php include('./Templates/nav.php');?>


    <div class="container">
        <div class="selecMoment text-center card-title">
            <h2>Nos Desserts : </h2>
        </div>

        <div class="row cardMoment">

            <?php foreach($desserts as $dessert) : ?>
                <div class="col sm-4">
                    <div class="card" style="max-width: 50%; margin: 0 auto;">
                        <img src="./Images/assortiment.jpg" class="card-img-top imageCard" alt="assortiment">
                        <div class="card-body">
                            <h5 class="text-center card-title"><?= $dessert['name_article'] ?></h5>
                            <p class="card-text"><?= $dessert['description_article'] ?></p>
                            <div class="text-center">
                            <a href="../getarticles.php?articles=desserts&id=<?= $dessert['id_article'] ?>" class="btn btn-success text-center" style="width: 80%">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <?php include "./Templates/footerHtml.html"?>
</body>
</html>