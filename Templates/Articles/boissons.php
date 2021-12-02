

<div class="container">
    <div class="selecMoment text-center card-title">
        <h2>Nos Boissons : </h2>
    </div>

    <div class="row cardMoment">

        <?php foreach($boissons as $boisson) : ?>
            <div class="col sm-4">
                <div class="card" style="max-width: 50%; margin: 0 auto;">
                    <img src="./Images/assortiment.jpg" class="card-img-top imageCard" alt="assortiment">
                    <div class="card-body">
                        <h5 class="text-center card-title"><?= $boisson['name_article'] ?></h5>
                        <p class="card-text"><?= $boisson['description_article'] ?></p>
                        <div class="text-center">
                        <a href="?page=singleArticles&articles=boissons&id=<?= $boisson['id_article'] ?>" class="btn btn-success text-center" style="width: 80%">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

